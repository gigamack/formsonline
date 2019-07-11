<?php
class ReasonModel extends CI_Model
{
    public function __construct()
    { }

    public function Get($ReasonID)
    {
        $this->db->select('*');
        $this->db->where('ReasonID', $ReasonID);
        $this->db->from('Reason');
        $query = $this->db->get();

        return $query->result();
    }
}
