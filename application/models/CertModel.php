<?php
class CertModel extends CI_Model
{
    public function InsertcertRecord($data)
    {        
        $this->db->insert('certRecord', $data);
    }    
}

?>