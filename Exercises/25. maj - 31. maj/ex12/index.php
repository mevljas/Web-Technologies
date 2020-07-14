<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/JokeController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "login-insecure" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::loginInsecure();
        } else {
            UserController::loginFormInsecure();
        }
    },
    "login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();
        } else {
            UserController::loginForm();
        }
    },
    "logout" => function () {
        UserController::logout();
    },
    "joke" => function () {
        JokeController::index();
    },
    "joke/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            JokeController::add();
        } else {
            JokeController::addForm();
        }
    },
    "joke/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            JokeController::edit();
        } else {
            JokeController::editForm();
        }
    },
    "joke/delete" => function () {
        JokeController::delete();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "joke");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
