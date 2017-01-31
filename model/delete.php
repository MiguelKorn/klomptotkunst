<?php

/**
 * Created by PhpStorm.
 * User: strijderVDB
 * Date: 27-1-2017
 * Time: 21:24
 */2
class delete extends Model
{

    public function deleteItem() {

    $stmt = $pdo->prepare("DELETE # FROM # WHERE #");

    $stmt->bindParam('');
    $stmt->execute();

    }

}