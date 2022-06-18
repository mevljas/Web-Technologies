<?php

require_once("model/UserDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class UserController {

    public static function loginFormInsecure() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login-insecure"]);
    }

    public static function loginInsecure() {
        $user = UserDB::getUserInsecure($_POST["username"], $_POST["password"]);
      
        if ($user) {
            User::login($user);

            $vars = [
                "username" => htmlspecialchars($_POST["username"]),
                "password" => htmlspecialchars($_POST["password"])
            ];

            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", [
                "errorMessage" => "Invalid username or password.",
                "formAction" => "login-insecure"
            ]);
        }
    }

    public static function loginForm() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login"]);
    }

    public static function login() {
        $rules = [
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        $user = UserDB::getUser($data["username"], $data["password"]);

        $errorMessage =  empty($data["username"]) || empty($data["password"]) || $user == null ? "Invalid username or password." : "";

        if (empty($errorMessage)) {
            User::login($user);

            $vars = [
                "username" => $data["username"],
                "password" => $data["password"]
            ];

            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", [
                "errorMessage" => $errorMessage,
                "formAction" => "login"
            ]);
        }
    }

    public static function logout() {
        User::logout();

        ViewHelper::redirect(BASE_URL . "joke");
    }
}