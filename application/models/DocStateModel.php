<?php
class docStateModel extends CI_Model
{
    public function InsertDocState($data)
    {
        // $this->DocID = $data['DocID'];
        // $this->stateID = $data['stateID'];
        // $this->db->insert('StateHistory', $this);
        $this->db->insert('StateHistory', $data);
    }

    public function selectDocState($data)
    {
        //print_r($data);
        $query = $this->db->get_where('StateHistory', $data);
        return $query->result();
    }
    
    public function updateDocState($data,$conditionVal)
    {
        $this->db->where('ID', $conditionVal);
        $this->db->update('StateHistory',$data);
        return true;
    }
    public function deleteDocState($data)
    {
        $this->db->where('ID', $data);
        $this->db->delete('StateHistory');

    }
}


?>