<?php

class Landingspage extends Model {
    function echosmt() {
        echo 'landingspage';
        $stmt = $this->db->query('SELECT * FROM `users`');
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }
}