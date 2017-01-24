<?php

class Login extends Model
{
    function logUserIn($usermail, $userpass)
    {
        $stmt = $this->db->prepare("SELECT `id`, `email`, `pass` FROM `users` WHERE `email` = :usermail AND `pass` = :userpass");

        $stmt->bindparam(':usermail', $usermail, PDO::PARAM_STR);
        $stmt->bindparam(':userpass', $userpass, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;

    }

    function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
