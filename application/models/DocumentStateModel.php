<?php
class DocumentStateModel extends CI_Model
{
    public function __construct()
    { }

    public function Insert($data)
    {
        $this->db->insert("StateHistory", $data);
    }

    public function getLastState($DocumentID)
    {
        $query = $this->db->query("SELECT * from StateHistory sh inner join (
            SELECT DocumentID, MAX(CreatedDate) as maxdate from StateHistory
            GROUP BY DocumentID) as ls on sh.DocumentID=ls.DocumentID and sh.CreatedDate = ls.maxdate
            where sh.DocumentID=" . "'" . $DocumentID . "'");

        return $query->result();
    }
}
