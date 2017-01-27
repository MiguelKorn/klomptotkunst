<?php

class Login extends Model
{
    public function logUserIn($usermail, $userpass)
    {
        $stmt = $this->db->prepare("SELECT `id` FROM `users` WHERE `email` = :usermail AND `pass` = :userpass AND `accepted` = TRUE");

        $stmt->bindparam(':usermail', $usermail, PDO::PARAM_STR);
        $stmt->bindparam(':userpass', $userpass, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch();
        return $result;

    }

    public function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
