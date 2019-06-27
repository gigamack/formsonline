<?php
class DocumentTypeModel extends CI_Model
{
    public function getDocumentType($UserType)
    {
        $this->db->where('AllowedUserType', $UserType);
        $this->db->where('Status', 1);
        $query = $this->db->get('documentType');
        return $query->result();
    }
}
