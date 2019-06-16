<?php
class DocumentTypeModel extends CI_Model
{
    public function getDocumentType($UserType)
    {
        $this->db->where('AllowedUserType', $UserType);
        $query = $this->db->get('documentType');
        return $query->result();
    }
}
