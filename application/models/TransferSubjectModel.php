<?php
class TransferSubjectModel extends CI_Model
{
    public $ID;
    public $DocumentID;

    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert("TransferSubject", $data);
    }
    public function Get($DocumentID)
    {
        $this->db->select("*");
        $this->db->where("DocumentID", $DocumentID);
        $this->db->from("TransferSubject");
        $query = $this->db->get();

        return $query->result();
    }

    public function Update($DocumentID, $data)
    {
        $this->db->where("DocumentID", $DocumentID);
        $this->db->update("TransferSubject", $data);
    }
}
