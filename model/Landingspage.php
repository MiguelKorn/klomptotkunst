<?php

class Landingspage extends Model
{

    public function getHeaderInfo()
    {
        $stmt = $this->db->prepare('SELECT `header_title`, `header_text`, `header_img` FROM `landingspage`');

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
}



}
