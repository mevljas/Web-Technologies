<?php

require_once "DBInit.php";

class ChatDB {

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, date, user, message
                                     FROM chat
                                 ORDER BY date ASC");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAllSinceId($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, date, user, message FROM chat
                                    WHERE id > :id ORDER BY date ASC");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function insert($user, $message) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO chat (user, message) VALUES (:user, :message)");
        $statement->bindParam(":user", $user);
        $statement->bindParam(":message", $message);
        $statement->execute();
    }

    public static function deleteAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("TRUNCATE chat");
        $statement->execute();
    }   
}
