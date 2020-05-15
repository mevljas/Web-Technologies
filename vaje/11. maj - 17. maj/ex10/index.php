<?php

session_start();

require_once("controller/BookController.php");
require_once("controller/StoreController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [
    # Book CRUD
    "book" => function () {
       BookController::index();
    },
    "book/search" => function () {
        BookController::search();
    },
    "book/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            BookController::add();
        } else {
            BookController::showAddForm();
        }
    },
    "book/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            BookController::edit();
        } else {
            BookController::showEditForm();
        }
    },
    "book/delete" => function () {
        BookController::delete();
    },
    # Ajax book search
    "book/search-ajax" => function () {
        BookController::searchAjax();
    },
    "book/search-vue" => function () {
        BookController::searchVue();
    },
    # API for book search
    "api/book/search" => function () {
        BookController::searchApi();
    },
    # Classic store
    "store" => function () {
        StoreController::index();
    },
    "store/add-to-cart" => function () {
        StoreController::addToCart();
    },
    "store/update-cart" => function () {
        StoreController::updateCart();
    },
    "store/purge-cart" => function () {
        StoreController::purgeCart();
    },
    # AJAX store
    "ajax/store" => function () {
        StoreController::ajaxIndex();
    },
    "ajax/cart" => function () {
        StoreController::ajaxCartContents();
    },
    "ajax/add-to-cart" => function () {
        StoreController::ajaxAddToCart();
    },
    "ajax/purge-cart" => function () {
        StoreController::ajaxPurgeCart();
    },
    "ajax/update-cart" => function () {
        StoreController::ajaxUpdateCart();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "store");
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
