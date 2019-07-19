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
        $this->db->from("TransferSubject");
        $this->db->join("TransferSubjectRequestFor", "TransferSubject.RequestForID=TransferSubjectRequestFor.RequestID", "inner");
        $this->db->join("TransferSubjectReason", "TransferSubject.ReasonForID=TransferSubjectReason.ReasonID", "inner");
        $this->db->where("DocumentID", $DocumentID);
        $query = $this->db->get();

        return $query->result();
    }

    public function Update($DocumentID, $data)
    {
        $this->db->where("DocumentID", $DocumentID);
        $this->db->update("TransferSubject", $data);
    }
}
