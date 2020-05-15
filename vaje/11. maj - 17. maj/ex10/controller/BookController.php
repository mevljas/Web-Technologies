<?php

require_once("model/BookDB.php");
require_once("ViewHelper.php");

class BookController {

    public static function index() {
        if (isset($_GET["id"])) {
            ViewHelper::render("view/book-detail.php", ["book" => BookDB::get($_GET["id"])]);
        } else {
            ViewHelper::render("view/book-list.php", ["books" => BookDB::getAll()]);
        }
    }

    public static function search() {
        if (isset($_GET["query"])) {
            $query = $_GET["query"];
            $hits = BookDB::search($query);
        } else {
            $query = "";
            $hits = [];
        }

        ViewHelper::render("view/book-search.php", ["hits" => $hits, "query" => $query]);
    }

    public static function showAddForm($values = ["author" => "", "title" => "", 
        "price" => "", "year" => ""]) {
        ViewHelper::render("view/book-add.php", $values);
    }

    public static function add() {
        $validData = isset($_POST["author"]) && !empty($_POST["author"]) && 
                isset($_POST["title"]) && !empty($_POST["title"]) &&
                isset($_POST["year"]) && !empty($_POST["year"]) &&
                isset($_POST["price"]) && !empty($_POST["price"]);

        if ($validData) {
            BookDB::insert($_POST["author"], $_POST["title"], $_POST["price"], $_POST["year"]);
            ViewHelper::redirect(BASE_URL . "book");
        } else {
            self::showAddForm($_POST);
        }
    }

    public static function showEditForm($book = []) {
        if (empty($book)) {
            $book = BookDB::get($_GET["id"]);
        }
        
        ViewHelper::render("view/book-edit.php", ["book" => $book]);
    }    

    public static function edit() {
        $validData = isset($_POST["author"]) && !empty($_POST["author"]) && 
            isset($_POST["title"]) && !empty($_POST["title"]) &&
            isset($_POST["price"]) && !empty($_POST["price"]) &&
            isset($_POST["year"]) && !empty($_POST["year"]) &&
            isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validData) {
            BookDB::update($_POST["id"], $_POST["author"], $_POST["title"], $_POST["price"], $_POST["year"]);
            ViewHelper::redirect(BASE_URL . "book?id=" . $_POST["id"]);
        } else {
            self::showEditForm($_POST);
        }
    }

    public static function delete() {
        $validDelete = isset($_POST["delete_confirmation"]) && isset($_POST["id"]) && !empty($_POST["id"]);

        if ($validDelete) {
            BookDB::delete($_POST["id"]);
            $url = BASE_URL . "book";
        } else {
            if (isset($_POST["id"])) {
                $url =  BASE_URL . "book/edit?id=" . $_POST["id"];
            } else {
                $url =  BASE_URL . "book";
            }
        }

        ViewHelper::redirect($url);
    }

    public static function searchAjax() {
        ViewHelper::render("view/book-search-ajax.php");
    }

    public static function searchVue() {
        ViewHelper::render("view/book-search-vue.php");
    }

    public static function searchApi() {
        if (isset($_GET["query"]) && !empty($_GET["query"])) {
            $hits = BookDB::search($_GET["query"]);
        } else {
            $hits = [];
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($hits);
    }
}