<?php
class DocTypeModel extends CI_Model
{
    public function InsertDocType($data)
    {        
        $this->db->insert('documentType', $data);
    }
    
    public function updateDocType($data,$conditionVal)
    {
        $this->db->where('DoctypeID', $conditionVal);
        $this->db->update('documentType',$data);
        return true;
    }

    public function selectDocType($data)
    {
        //print_r($data);
        $query = $this->db->get_where('documentType', $data);
        return $query->result();
    }

    public function deleteDocType($data)
    {
        //$this->db->where('DocID', $data);
        $this->db->delete('documentType',$data);

    }

}

?>