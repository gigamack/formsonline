<?php
class DocumentStateModel extends CI_Model
{
    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert("StateHistory", $data);
    }
}
