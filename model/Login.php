<?php

class Login extends Model
{
    public function logUserIn($usermail, $userpass)
    {
        $stmt = $this->db->prepare("SELECT u.id FROM users u JOIN contacts c on u.contacts_id = c.id WHERE c.email = :usermail AND u.pass = :userpass AND u.accepted = TRUE");

        $stmt->bindparam(':usermail', $usermail, PDO::PARAM_STR);
        $stmt->bindparam(':userpass', $userpass, PDO::PARAM_STR);

        $stmt->execute();

        $result = $stmt->fetch();
        return $result;

    }
}
