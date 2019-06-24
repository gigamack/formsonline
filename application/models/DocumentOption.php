<?php
class DocumentOption extends CI_Model
{
    public $ID;

    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert("DocumentOption", $data);
    }
}
