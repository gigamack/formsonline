<?php
class CertModel extends CI_Model
{
    public function InsertcertRecord($data)
    {        
        $this->db->insert('certRecord', $data);
    }    

    public function getCertDetailBydocID($docID)
    {
        $this->db->select('*');
        $this->db->from('totalCertCost');
        $this->db->where('DocID', $docID);
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>