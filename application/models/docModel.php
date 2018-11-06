<?php
class docModel extends CI_Model
{
    public function InsertDoc($data)
    {        
        $this->db->insert('document', $data);
    }

    public function getDocBydocID($docID)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->where('document.DocID', $docID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getMaxDocIDbyUserIDtoSetInitState($stdid)
    {
        $this->db->select_max('DocID');
        $query = $this->db->get_where('document', $stdid);
        return $query->result();
    }


    public function getDocByTypeID($typeid)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->where('document.DocTypeID', $typeid);
        $this->db->order_by('document.DocID');
        $query = $this->db->get();
        return $query->result();
    }
    public function updateDoc($data,$conditionVal)
    {
        $this->db->where('DocID', $conditionVal);
        $this->db->update('document',$data);
        return true;
    }

    public function getDocByuserID($stdid)
    {
        $this->db->select('*');
        $this->db->from('document');
        $this->db->where('document.StudentID', $stdid);
        $this->db->order_by('document.DocID');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function selectDoc($data)
    {
        //print_r($data);
        $query = $this->db->get_where('document', $data);
        return $query->result();
    }
    
    public function selectDocWithState($data)
    {
        //print_r($data);
        $this->db->select('*');
        $this->db->from('document');
        $this->db->join('latest_StateID ', 'document.DocID = latest_StateID.DocID');
        $this->db->where($data);
        $query = $this->db->get();
        //$query = $this->db->get();
        return $query->result();
    }

    public function selectDocSome($data,$feild)
    {
        //print_r($data);
        $this->db->select($feild);
        $query=$this->db->get_where('document', $data);
        return $query->result_array();
    }

    public function selectLastestState($data)
    {
        //print_r($data);
        $query = $this->db->get_where('latest_StateID', $data);
        return $query->result_array();
    }


    public function deleteDoc($data)
    {
        //$this->db->where('DocID', $data);
        $this->db->delete('document',$data);

    }

}

?>