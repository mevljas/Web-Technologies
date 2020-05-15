<?php

require_once "DBInit.php";

class BookDB {

    public static function getForIds($ids) {
        $db = DBInit::getInstance();

        $id_placeholders = implode(",", array_fill(0, count($ids), "?"));

        $statement = $db->prepare("SELECT id, author, title, price, year FROM book 
            WHERE id IN (" . $id_placeholders . ")");
        $statement->execute($ids);

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, author, title, price, year FROM book");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, author, title, price, year FROM book 
            WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        $book = $statement->fetch();

        if ($book != null) {
            return $book;
        } else {
            throw new InvalidArgumentException("No record with id $id");
        }
    }

    public static function insert($author, $title, $price, $year) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO book (author, title, price, year)
            VALUES (:author, :title, :price, :year)");
        $statement->bindParam(":author", $author);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":year", $year);
        $statement->execute();
    }

    public static function update($id, $author, $title, $price, $year) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE book SET author = :author,
            title = :title, price = :price, year = :year WHERE id = :id");
        $statement->bindParam(":author", $author);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":year", $year);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }

    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM book WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }    

    public static function search($query) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, author, title, price, year FROM book 
            WHERE author LIKE :query OR title LIKE :query");
        $statement->bindValue(":query", '%' . $query . '%');
        $statement->execute();

        return $statement->fetchAll();
    }    
}
