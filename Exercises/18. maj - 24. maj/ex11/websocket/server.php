<?php 
require_once("vendor/autoload.php"); 

// Uvozimo razrede
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

// Simple chat server logic taken from http://socketo.me/docs/hello-world
// must be run from command line with `php server.php`
class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    // Nov odejamlec se poveže na strežnik.
    public function onOpen(ConnectionInterface $conn) {
        // Povezavo dodamo na seznam vseh odjemalcev
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    // Dobimo novo sporočilo. Dekodiramo sporočil in s pomočjo for each zanke grmeo skozi seznam odjemalcev in vsakemu to pošljemo.
    public function onMessage(ConnectionInterface $from, $msg) {
        $decoded = json_decode($msg);
        echo "Message '$msg'\n";

        foreach ($this->clients as $client) {
            $client->send($msg);
        }
    }

    // Odjemlec pvoeazvo zapre oz. se povezava zaklkjuči
    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }
}

// simply start the server on port 9999
// Instanca našega strežnika.
// Chat nareidmo znotraj websockert in httpserver objekta.
$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    9999
);

$server->run();
