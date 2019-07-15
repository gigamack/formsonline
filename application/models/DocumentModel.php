<?php
class DocumentModel extends CI_Model
{
    public $ID;
    public $DocumentTypeID;
    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert('document', $data);
    }
    public function Get($DocumentID)
    {
        $this->db->select('*');
        $this->db->where('DocumentID', $DocumentID);
        $this->db->from('document');
        $query = $this->db->get();

        return $query->result();
    }

    public function GetWithReason($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('Reason', 'document.ReasonID=Reason.ReasonID', 'inner');
        $this->db->where('DocumentID', $DocumentID);

        $query = $this->db->get();

        return $query->result();
    }

    public function getWithReasonDocumentType($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('Reason', 'document.ReasonID=Reason.ReasonID', 'inner');
        $this->db->join('documentType', 'document.DoctypeID=documentType.DoctypeID', 'inner');
        $this->db->where('DocumentID', $DocumentID);

        $query = $this->db->get();

        return $query->result();
    }
    public function getWithDocumentType($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('documentType', 'document.DoctypeID=documentType.DoctypeID', 'inner');
        $this->db->where('DocumentID', $DocumentID);

        $query = $this->db->get();

        return $query->result();
    }
    public function Update($DocumentID, $data)
    {
        $this->db->where("DocumentID", $DocumentID);
        $this->db->update("document", $data);
    }
    public function getDocumentTypeID($DocumentID)
    {
        $this->db->select('DocTypeID');
        $this->db->where('DocumentID', $DocumentID);
        $this->db->from('document');
        $query = $this->db->get();

        if (isset($query->result()[0])) {
            $this->DocumentTypeID = $query->result()[0]->DocTypeID;
        }

        return $this->DocumentTypeID;
    }
}
