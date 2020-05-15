<?php

require_once("model/BookDB.php");

class Cart {

    public static function getAll() {
        if (!isset($_SESSION["cart"]) || empty($_SESSION["cart"])) {
            return [];
        }

        $ids = array_keys($_SESSION["cart"]);
        $cart = BookDB::getForIds($ids);

        // Adds a quantity field to each book in the list
        foreach ($cart as &$book) {
            $book["quantity"] = $_SESSION["cart"][$book["id"]];
        }

        return $cart;
    }

    public static function add($id) {
        $book = BookDB::get($id);

        if ($book != null) {
            if (isset($_SESSION["cart"][$id])) {
                $_SESSION["cart"][$id] += 1;
            } else {
                $_SESSION["cart"][$id] = 1;
            }            
        }
    }

    public static function update($id, $quantity) {
        $book = BookDB::get($id);
        $quantity = intval($quantity);

        if ($book != null) {
            if ($quantity <= 0) {
                unset($_SESSION["cart"][$id]);
            } else {
                $_SESSION["cart"][$id] = $quantity;
            }
        }
    }

    public static function purge() {
        unset($_SESSION["cart"]);
    }

    public static function total() {
        return array_reduce(self::getAll(), function ($total, $book) {
            return $total + $book["price"] * $book["quantity"];
        }, 0);
    }
}
