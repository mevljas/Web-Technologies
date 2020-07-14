<?php

require_once("model/JokeDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class JokeController {

    public static function index() {
        ViewHelper::render("view/joke-list.php", [
            "jokes" => JokeDB::getAll(), 
            "loggedIn" => User::isLoggedIn()
        ]);
    }

    // Function can be called without providing arguments. In such case,
    // $data and $errors paramateres are initialized as empty arrays
    public static function addForm($data = [], $errors = []) {
        // If $data is an empty array, let's set some default values
        if (empty($data)) {
            $data = [
                "joke_text" => "",
                "joke_date" => date("Y-m-d")
            ];
        }

        // If $errors array is empty, let's make it contain the same keys as
        // $data array, but with empty values
        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }

        $vars = ["joke" => $data, "errors" => $errors];
        ViewHelper::render("view/joke-add.php", $vars);
    }

    public static function add() {
        $rules = [
            "joke_text" => FILTER_UNSAFE_RAW,
            "joke_date" => [
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) {
                    $date = explode("-", $value);

                    if (checkdate($date[1], $date[2], $date[0])) {
                        return $value;
                    } else {
                        return false;
                    }
                }
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["joke_date"] = $data["joke_date"] === false ? "Invalid date." : "";
        $errors["joke_text"] = empty($data["joke_text"]) ? "Don't joke, write a joke." : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            JokeDB::insert($data["joke_date"], $data["joke_text"]);
            ViewHelper::redirect(BASE_URL . "joke");
        } else {
            self::showAddForm($data, $errors);
        }
    }

    public static function editForm($data = [], $errors = []) {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        if (empty($data)) {
            $data = JokeDB::get($_GET["id"]);
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        
        ViewHelper::render("view/joke-edit.php", ["joke" => $data, "errors" => $errors]);
    }    

    public static function edit() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }

        $rules = [
            "joke_text" => FILTER_UNSAFE_RAW,
            "joke_date" => [
                "filter" => FILTER_CALLBACK,
                "options" => function ($value) {
                    $date = explode("-", $value);

                    if (checkdate($date[1], $date[2], $date[0])) {
                        return $value;
                    } else {
                        return false;
                    }
                }
            ],
            "id" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1]
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["joke_date"] = $data["joke_date"] === false ? "Invalid date." : "";
        $errors["joke_text"] = empty($data["joke_text"]) ? "Don't joke, write a joke." : "";
        $errors["id"] = empty($data["id"]) ? "ID is missing." : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            JokeDB::update($data["id"], $data["joke_date"], $data["joke_text"]);
            ViewHelper::redirect(BASE_URL . "joke");
        } else {
            self::showEditForm($data, $errors);
        }
    }

    public static function delete() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        else  if (strcmp($_SESSION["randomNumber"] , $_GET['randomNumber']) != 0) {
            throw new Exception("Error.");
        }

        $rules = [
            "id" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1]
            ],
            "delete_confirmation" => [
                "filter" => FILTER_VALIDATE_BOOLEAN
            ]
        ];
        $data = filter_input_array(INPUT_GET, $rules);

        $errors["id"] = $data["id"] === null ? "Cannot delete without a valid ID." : "";
        $errors["delete_confirmation"] = $data["delete_confirmation"] === null ? "Forgot to check the delete box?" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            JokeDB::delete($data["id"]);
            $url = BASE_URL . "joke";
        } else {
            if ($data["id"] !== null) {
                $url = BASE_URL . "joke/edit?id=" . $data["id"];
            } else {
                $url = BASE_URL . "joke";
            }
        }

        ViewHelper::redirect($url);
    }
}