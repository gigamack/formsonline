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
            inner join DocumentStatus ds on ds.ID=sh.StatusID
            where sh.DocumentID=" . "'" . $DocumentID . "'");

        return $query->result();
    }

    public function getLastStateWithUserID($UserID)
    {
        $query = $this->db->query("SELECT * from StateHistory sh 
        inner join (SELECT DocumentID, MAX(CreatedDate) as maxdate from StateHistory
            GROUP BY DocumentID) as ls on sh.DocumentID=ls.DocumentID and sh.CreatedDate = ls.maxdate
            inner join DocumentStatus ds on ds.ID=sh.StatusID 
            inner join document d on sh.DocumentID=d.DocumentID
            inner join documentType dt on d.DoctypeID=dt.DoctypeID
            where d.StudentID=$UserID
            order by sh.OfficerCommentedDate desc");

        return $query->result();
    }

    public function getDocumentLastState()
    {
        $query = $this->db->query("SELECT * from StateHistory sh 
        inner join (SELECT DocumentID, MAX(CreatedDate) as maxdate from StateHistory
            GROUP BY DocumentID) as ls on sh.DocumentID=ls.DocumentID and sh.CreatedDate = ls.maxdate
            inner join DocumentStatus ds on ds.ID=sh.StatusID 
            inner join document d on sh.DocumentID=d.DocumentID
            inner join documentType dt on d.DoctypeID=dt.DoctypeID
            order by sh.OfficerCommentedDate desc");

        return $query->result();
    }
    public function getDocumentLastStateWithRoles($RolesID)
    {
        $RolesID = $this->StringWithSingleQuote($RolesID);
        $query = $this->db->query("SELECT * from StateHistory sh 
        inner join (SELECT DocumentID, MAX(CreatedDate) as maxdate from StateHistory
            GROUP BY DocumentID) as ls on sh.DocumentID=ls.DocumentID and sh.CreatedDate = ls.maxdate
            inner join DocumentStatus ds on ds.ID=sh.StatusID 
            inner join document d on sh.DocumentID=d.DocumentID
            inner join documentType dt on d.DoctypeID=dt.DoctypeID
            where dt.DocumentOwner in ($RolesID) 
            order by sh.OfficerCommentedDate desc");

        return $query->result();
    }

    private function StringWithSingleQuote($values)
    {
        $values = explode(',', $values);
        $result = '';
        foreach ($values as $value) {
            if ($result == '') {
                $result .= "'" . $value . "'";
            } else {
                $result .= ',' . "'" . $value . "'";
            }
        }

        return $result;
    }
}
