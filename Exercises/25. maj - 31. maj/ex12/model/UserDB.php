<?php

require_once "DBInit.php";

class UserDB {

    // Returns true if a valid combination of a username and a password are provided.
    public static function getUserInsecure($username, $password) {
        $dbh = DBInit::getInstance();

        // COMPLETELY INSECURE: NEVER CONSTRUCT SQL QUERIES THIS WAY
        $stmt = $dbh->prepare("SELECT id, username FROM user1 
            WHERE username = '$username' AND password = '$password'");
        $stmt->execute();
        
        return $stmt->fetch();
    }

    public static function getUser($username, $password) {
        /* This function is more secure because
            1) It uses prepared statements and it binds variables;
            2) It does not store passwords in plain-text in the database

            For creating passwords, use: http://php.net/manual/en/function.password-hash.php
            For checking passwords, use: http://php.net/manual/en/function.password-verify.php
            For more information, see: http://php.net/manual/en/ref.password.php
        */
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT id, username, password FROM user2 
            WHERE username = :username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch();

        if (password_verify($password, $user["password"])) {
            unset($user["password"]);
            return $user;
        } else {
            return false;
        }
    }
}
