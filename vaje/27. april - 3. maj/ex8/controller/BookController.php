<?php

require_once("model/BookDB.php");
require_once("ViewHelper.php");

# Controller for handling books
class BookController
{

    public static function edit()
    {
        $edit = isset($_POST["author"]) && !empty($_POST["author"]) &&
            isset($_POST["title"]) && !empty($_POST["title"]) &&
            isset($_POST["price"]) && !empty($_POST["price"]) &&
            isset($_POST["id"]) && !empty($_POST["id"]) &&
            isset($_POST["year"]) && !empty($_POST["year"]);

        $delete = isset($_POST["delete_confirmation"]) &&
            isset($_POST["id"]) && !empty($_POST["id"]);

        // If we send a valid POST request (contains all required data)
        if ($edit) {
            try {
                BookDB::update($_POST["id"], $_POST["author"], $_POST["title"], $_POST["price"], $_POST["year"]);
                // Go to the detail page
                header(sprintf("Location: " . BASE_URL . "book?id" . "=%d", $_POST["id"]));
                $book = [
                    "id" => $_POST["id"],
                    "author" => $_POST["author"],
                    "title" => $_POST["title"],
                    "price" => $_POST["price"],
                    "year" => $_POST["year"]
                ];
                $vars = [
                    "book" => $book
                ];
            } catch (Exception $e) {
                $errorMessage = "A database error occured: $e";
            }
            // Do we delete the record?
        } else if ($delete) {
            try {
                BookDB::delete($_POST["id"]);
                header(sprintf("Location: " . BASE_URL, $_POST["id"]));
            } catch (Exception $e) {
                $errorMessage = "A database error occured: $e";
            }
            // Read the contents from the DB and populate the form with it
            $book = [
                "id" => $_POST["id"],

            ];
            $vars = [
                "book" => $book,
                "delete_confirmation" => $_POST["delete_confirmation"]
            ];
        } else {
            try {
                // GET id from either GET or POST request
                $book = BookDB::get($_REQUEST["id"]);
                $vars = [
                    "book" => $book
                ];
            } catch (Exception $e) {
                $errorMessage = "A database error occured: $e";
                $vars = [
                    "errorMessage" => $errorMessage
                ];
            }
        }
        ViewHelper::render("view/book-edit.php", $vars);
    }


    public static function search()
    {
        if (isset($_GET["query"])) {
            $query = $_GET["query"];
            $hits = BookDB::search($query);
        } else {
            $hits = [];
            $query = "";
        }
        $vars = [
            "hits" => $hits,
            "query" => $query
        ];

        ViewHelper::render("view/book-search.php", $vars);
    }



    public static function helloWorld()
    {
        $vars = [
            "naziv" => "gospa",
            "person" => "Marija"
        ];
        ViewHelper::render("view/hello-world.php", $vars);
    }

    public static function getAll()
    {
        # Reads books from the database
        $variables = [
            "books" => BookDB::getAll()
        ];

        # Renders the view and sets the $variables array into view's scope
        ViewHelper::render("view/book-list.php", $variables);
    }

    public static function get()
    {
        $variables = ["book" => BookDB::get($_GET["id"])];
        ViewHelper::render("view/book-detail.php", $variables);
    }

    public static function showAddForm($variables = array(
        "author" => "", "title" => "",
        "price" => "", "year" => ""
    ))
    {
        ViewHelper::render("view/book-add.php", $variables);
    }

    public static function add()
    {
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

    # TODO: Implement controlers for searching, editing and deleting books
}
