<?php

/**
 * Created by PhpStorm.
 * User: jesse
 * Date: 27-1-2017
 * Time: 12:31
 */
class Edit extends Model
{
    public function showInfo() {
            $stmt = $this->db->prepare();
            $stmt->execute();

            $result = $stmt->fetchAll();
            return $result;
    }

    public function editInfo() {



    $stmt = $pdo->prepare("UPDATE # SET # WHERE #");


    $stmt->bindParam('',$_GET[]);
    $stmt->execute();

    }
}