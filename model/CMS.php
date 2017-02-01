<?php

/**
 * Created by PhpStorm.
 * User: --jesseh-
 * Date: 26-1-2017
 * Time: 10:24
 */
class CMS extends Model
{
    public function showRequests() {
        $stmt = $this->db->prepare();
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
    }
}