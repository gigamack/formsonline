<?php
class TransferSubjectRequestModel extends CI_Model
{
    public $ID;
    public $DocumentID;
    public $SubjectIDFrom;
    public $SubjectNameFrom;
    public $CreditsFrom;
    public $SubjectIDTo;
    public $SubjectNameTo;
    public $CreditsTo;
    public $RequestOrder;
    public $CreatedDate;
    public $ModifiedDate;
    public $CreatedBy;
    public $ModifiedBy;
    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert('TransferSubjectRequest', $data);
    }
    public function Get($DocumentID)
    {
        $this->db->select("*");
        $this->db->where("DocumentID", $DocumentID);
        $this->db->from("TransferSubjectRequest");
        $query = $this->db->get();

        return $query->result();
    }

    public function DeleteAll($DocumentID)
    {
        $this->db->where("DocumentID", $DocumentID);
        $this->db->delete("TransferSubjectRequest");
    }
}
