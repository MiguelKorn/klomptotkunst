<?php

class Landingspage extends Model
{

    public function getHeaderTitle()
    {
        $stmt = $this->db->prepare('SELECT `header_title` FROM `landingspage`');

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
}

    public function getHeaderText()
    {
        $stmt = $this->db->prepare('SELECT `header_text` FROM `landingspage`');

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getHeaderImage()
    {
        $stmt = $this->db->prepare('SELECT `header_img` FROM `landingspage`');

        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }


}
