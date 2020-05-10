<?php

require_once "DBInit.php";

class UserDB {

    // Returns true if a valid combination of a username and a password are provided.
    public static function validLoginAttempt($username, $password) {
        $dbh = DBInit::getInstance();

        // // !!! NEVER CONSTRUCT SQL QUERIES THIS WAY !!!
        // // INSTEAD, ALWAYS USE PREPARED STATEMENTS AND BIND PARAMETERS!
        // $query = "SELECT COUNT(id) FROM user WHERE username = '$username' AND password = '$password'";
        // // output and exit
        // // var_dump($query);
        // // exit();
        // // Empty string represents false. False && something = false
        // // Student = True
        // // True OR False = True
        // // The part after "And" doesn't matter at all, because of the "OR"
        // // Use prepared statements and bind
        // $stmt = $dbh->prepare($query);
        // $stmt->execute();

        // prepare and bind
        $stmt = $dbh->prepare("SELECT COUNT(id) FROM user WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetchColumn(0) == 1;
    }
}
 