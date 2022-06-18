<?php

require_once("model/UserDB.php");
require_once("ViewHelper.php");

class UserController {

    public static function showLoginForm() {
       ViewHelper::render("view/user-login-form.php");
    }

    public static function login() {
       if (UserDB::validLoginAttempt($_POST["username"], $_POST["password"])) {
            $vars = [
                "username" => $_POST["username"],
                "password" => $_POST["password"]
            ];

            ViewHelper::render("view/user-secret-page.php", $vars);
       } else {
            ViewHelper::render("view/user-login-form.php", [
                "errorMessage" => "Invalid username or password."
            ]);
       }
    }
}