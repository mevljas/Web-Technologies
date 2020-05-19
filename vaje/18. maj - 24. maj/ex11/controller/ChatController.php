<?php

require_once("model/ChatDB.php");
require_once("ViewHelper.php");

class ChatController {

    public static function index() {
        $type = filter_input(INPUT_GET, 'type', FILTER_VALIDATE_REGEXP, [
            "options" => [
                "default" => "poll",
                "regexp" => "/^(sse)|(poll)|(ws)$/"
                // Dopustne vrednosti so ss event, poll, webscoket
            ]
        ]);

        if ($type == "sse") {
            ViewHelper::render("view/chat-sse.php");
        } elseif ($type == "ws") {
            ViewHelper::render("view/chat-ws.php");
        } else {
            ViewHelper::render("view/chat-poll.php");
        }
    }

    // Iz urlja preberemo id sporočila. To je tisti id  - anjvišja vrednsot sporočila, akterega smo že vidl.
    //  Vsako nov sporčilo ima nov id in se nenhno povečuje.  Veno ko pošljemo poivedbo na strežnik rečemo, ali je kašno novo spročilo, ki ima višji id?
    // Dobimo iz baze vsa psorčila in pošljemo nazaj odjemalcu kot JSON array.
    public static function getMessagesPolling() {
        header("Content-Type: application/json");
        header("Cache-Control: no-cache");

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
            "options" => [
                "default" => 0,
                "min_range" => 1
            ]
        ]);

        $messages = ChatDB::getAllSinceId($id);
        echo json_encode($messages);
    }

    // Kontroler, ki odjemalcu vrne neskončni tok tekstovnih sporočil.
    public static function getMessagesSSE() {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $last_id = filter_input(INPUT_SERVER, 'HTTP_LAST_EVENT_ID', FILTER_VALIDATE_INT, [
            "options" => [
                "default" => 0,
                "min_range" => 1
            ]
        ]);

        // From now on, we are "finished" with the request,
        // and have to save potential changes to session and
        // release it
        // Trenutno sejo azpremo, da ne pride do dead-locka
        session_write_close();
        
        // disable automatic detection of client disconnect
        ignore_user_abort(true);

        $start = microtime(true);

        while (true) {
            // if the client disconnects, end the loop
            if (connection_aborted()) {
                exit();
            }
            
            // Get new messages
            // Dobimo vsa sporočila iz podaktovne baze, ki so strogo večja od tega id.
            $messages = ChatDB::getAllSinceId($last_id);
            foreach ($messages as $message) {
                // write them to the socket in the SSE format
                self::writeMessage($message["id"], json_encode($message));
                $last_id = $message["id"];
            } 

            # Hack to properly detect disconnected clients
            # PHP will not detect that the client has aborted the connection
            # until an attempt is made to send information to the client. 
            # Let's send a space every 10s
            // Ugotavljamo, če je bila pvoeazva prekinjena
            if (microtime(true) - $start > 10) {
                echo PHP_EOL;
                $start = microtime(true);
            }

            // If we do not manually flush, all echo statements are buffered
            ob_flush();
            flush();

            // Sleep for 1 second - da while True zanka ne podvija
            // Če to odstranimo ali zmanjšamo, porabi program dosti več resourcev, ker stalno sprašuje.
            sleep(1);
        }
    }

    private static function writeMessage($id, $message, $event = "message", $retry = 3) {
        echo 'id: ' . $id . PHP_EOL;
        echo 'event: ' . $event . PHP_EOL;
        echo 'retry: ' . $retry . PHP_EOL;
        echo 'data: ' . $message . PHP_EOL;
        echo PHP_EOL;  //skok v novo vrstico
    }

    public static function add() {
        $rules = [
            "user" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^\w+[ ]*\w+$/"]
            ],
            "message" => FILTER_SANITIZE_SPECIAL_CHARS,
        ];
        $data = filter_input_array(INPUT_POST, $rules);

        if ($data["user"] !== false && !empty($data["message"])) {
            ChatDB::insert($data["user"], $data["message"]);
            # Return nothing
        } else {
            throw new Exception("Missing / incorrect data");
        }
    }

    public static function delete() {
        ChatDB::deleteAll();
        ViewHelper::redirect(BASE_URL . "chat");
    }
}