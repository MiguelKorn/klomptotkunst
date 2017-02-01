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

    public function editContactinfo() {

        $stmt = $pdo->prepare("UPDATE contacts SET * WHERE #");
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':str_name',$str_name);
        $stmt->bindParam(':str_number',$str_number);
        $stmt->bindParam(':zipcode',$zipcode);
        $stmt->bindParam(':tel',$tel);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':website',$website);

        $stmt->execute();

    }



}