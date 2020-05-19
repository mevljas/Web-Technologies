<?php

session_start();

require_once("controller/ChatController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    "chat" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            ChatController::index();
        } else {
            ChatController::add();
        }
    },
    "chat/message-sse" => function () {
        ChatController::getMessagesSSE();
    },
    "chat/message-poll" => function () {
        ChatController::getMessagesPolling();
    },
    "chat/delete" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ChatController::delete();
        }
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "chat");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    ViewHelper::error400($e->getMessage());
} 
