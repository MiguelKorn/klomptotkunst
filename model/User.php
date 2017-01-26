<?php

class User extends Model
{
    public function checkUserRole($id)
    {
//        $stmt = $this->db->prepare('SELECT `roles_id` FROM `users` WHERE `id` = :id');
        $stmt = $this->db->prepare('SELECT r.role_name FROM users u JOIN roles r ON u.roles_id = r.id WHERE u.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch();
        return $result;
    }
}