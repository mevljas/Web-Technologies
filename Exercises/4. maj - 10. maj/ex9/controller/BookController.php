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

    // Function can be called without providing arguments. In such case,
    // $data and $errors paramateres are initialized as empty arrays
    public static function showAddForm($data = [], $errors = []) {
        // If $data is an empty array, let's set some default values
        if (empty($data)) {
            $data = [
                "author" => "",
                "title" => "",
                "description" => "",
                "price" => 0,
                "year" => date("Y"),
                "quantity" => 10
            ];
        }

        // If $errors array is empty, let's make it contain the same keys as
        // $data array, but with empty values
        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }

        $vars = ["book" => $data, "errors" => $errors];
        ViewHelper::render("view/book-add.php", $vars);
    }

    public static function add() {
        $rules = [
            "author" => [
                // Only letters, dots, spaces and dashes are allowed
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ a-zA-ZšđčćžŠĐČĆŽ\.\-]+$/"]
                // start with sign from the range."." and "-" need escaping. "+" signs must repeat once or more.
                // $ input must end with a  sign from the range
            ],
            // we convert HTML special characters
            "title" => FILTER_SANITIZE_SPECIAL_CHARS,
            "description" => FILTER_SANITIZE_SPECIAL_CHARS,
            "year" => [
                // The year can only be between 1500 and 2020
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1500, "max_range" => 2020]
            ],
            "price" => [
                // We provide a custom function that verifies the data. 
                // If the data is not OK, we return false, otherwise we return the data
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) { return (is_numeric($value) && $value >= 0) ? floatval($value) : false; }
                // Cast to float or else we return false.
            ],
            "quantity" => [
                // The minimum quantity should be at least 10
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 10]
            ]
        ];
        // Apply filter to all POST variables; from here onwards we never
        // access $_POST directly, but use the $data array
        // Filter input
        // Ouput filtered data. If one  specified data is not filtered, false is saved at it's key.
        $data = filter_input_array(INPUT_POST, $rules);

        $errors["author"] = $data["author"] === false ? "Provide the name of the author: only letters, dots, dashes and spaces are allowed." : "";
        $errors["title"] = empty($data["title"]) ? "Provide the book title." : "";
        $errors["year"] = $data["year"] === false ? "Year should be between 1500 and 2020." : "";
        $errors["price"] = $data["price"] === false ? "Price should be non-negative." : "";
        $errors["quantity"] = $data["quantity"] === false ? "Quantity should be at least 10." : "";

        // Is there an error?
        // If all errors are empty = there are no errors
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            // insert dat and redirect
            BookDB::insert($data["author"], $data["title"], $data["description"], 
                $data["price"], $data["year"], $data["quantity"]);
            ViewHelper::redirect(BASE_URL . "book");
        } else {
            // show errors. Valid data is retained. Invalid data is removed.
            self::showAddForm($data, $errors);
        }
    }

    public static function showEditForm($data = [], $errors = []) {
        if (empty($data)) {
            $data = BookDB::get($_GET["id"]);
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        
        ViewHelper::render("view/book-edit.php", ["book" => $data, "errors" => $errors]);
    }    

    public static function edit() {
        // TODO: Implement server-side validation, similar to the one for adding books
        $rules = [
            "id" => [
                // The minimum quantity should be at least 1
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" > 0]
            ],
            "author" => [
                // Only letters, dots, spaces and dashes are allowed
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ a-zA-ZšđčćžŠĐČĆŽ\.\-]+$/"]
                // start with sign from the range."." and "-" need escaping. "+" signs must repeat once or more.
                // $ input must end with a  sign from the range
            ],
            // we convert HTML special characters
            "title" => FILTER_SANITIZE_SPECIAL_CHARS,
            "description" => FILTER_SANITIZE_SPECIAL_CHARS,
            "year" => [
                // The year can only be between 1500 and 2020
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1500, "max_range" => 2020]
            ],
            "price" => [
                // We provide a custom function that verifies the data. 
                // If the data is not OK, we return false, otherwise we return the data
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) { return (is_numeric($value) && $value >= 0) ? floatval($value) : false; }
                // Cast to float or else we return false.
            ],
            "quantity" => [
                // The minimum quantity should be at least 0
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 0]
            ]
        ];
        // Apply filter to all POST variables; from here onwards we never
        // access $_POST directly, but use the $data array
        // Filter input
        // Ouput filtered data. If one  specified data is not filtered, false is saved at it's key.
        $data = filter_input_array(INPUT_POST, $rules);

        $errors["id"] = $data["id"] === false ? "Id should be at least 1." : "";
        $errors["author"] = $data["author"] === false ? "Provide the name of the author: only letters, dots, dashes and spaces are allowed." : "";
        $errors["title"] = empty($data["title"]) ? "Provide the book title." : "";
        $errors["year"] = $data["year"] === false ? "Year should be between 1500 and 2020." : "";
        $errors["price"] = $data["price"] === false ? "Price should be non-negative." : "";
        $errors["quantity"] = $data["quantity"] === false ? "Quantity should be at least 0." : "";

        // Is there an error?
        // If all errors are empty = there are no errors
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        
        if ($isDataValid) {
            BookDB::update($data["id"], $data["author"], $data["title"], $data["description"], 
                $data["price"], $data["year"], $data["quantity"]);
            ViewHelper::redirect(BASE_URL . "book?id=" . $data["id"]);
        } else {
            self::showEditForm($data, $errors);
        }
    }

    public static function delete() {
        $rules = [
            "id" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1]
            ],
            "delete_confirmation" => [
                "filter" => FILTER_VALIDATE_BOOLEAN
            ]
        ];
        $data = filter_input_array(INPUT_POST, $rules);

        $errors["id"] = $data["id"] === null ? "Cannot delete without a valid ID." : "";
        $errors["delete_confirmation"] = $data["delete_confirmation"] === null ? "Forgot to check the delete box?" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            BookDB::delete($data["id"]);
            $url = BASE_URL . "book";
        } else {
            if ($data["id"] !== null) {
                $url = BASE_URL . "book/edit?id=" . $data["id"];
            } else {
                $url = BASE_URL . "book";
            }
        }

        ViewHelper::redirect($url);
    }
}