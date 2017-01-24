<?php
class Login extends Model
{

    function logUserIn($username, $password) {

        $stmt = $db->prepare("SELECT `id`, `name`, `pass` FROM `users` WHERE `name` = :username AND pass = :password");

        $stmt->bindparam(':username', $username, PDO::PARAM_STR);
        $stmt->bindparam(':password', $password, PDO::PARAM_STR, 40);

        $stmt->execute();

        return $stmt->fetchColumn();

    }

}