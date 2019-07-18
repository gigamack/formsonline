<?php
class CertModel extends CI_Model
{
    public function InsertcertRecord($data)
    {
        $this->db->insert('certRecord', $data);
    }

    public function getCertDetailBydocID($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('totalCertCost');
        $this->db->where('DocumentID', $DocumentID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCertByDocumentID($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('totalCertCost');
        $this->db->where('DocumentID', $DocumentID);
        $query = $this->db->get();
        return $query->result();
    }

    public function Get($DocumentID)
    {
        $this->db->select('*');
        $this->db->from('certRecord');
        $this->db->where('DocumentID', $DocumentID);
        $query = $this->db->get();
        return $query->result();
    }
}
