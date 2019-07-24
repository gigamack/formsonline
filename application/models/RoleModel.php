<?php
class RoleModel extends CI_Model
{
    public $Roles;
    public $RolesID;
    private $UserRolesInfo;
    public function __construct()
    {
        $this->UserRolesInfo = $_SESSION['UserRolesInfo'];
        $this->setRoles();
    }

    private function setRoles()
    {
        $this->Roles = $this->UserRolesInfo;

        foreach ($this->UserRolesInfo as $Role) {
            if ($this->RolesID == '') {
                $this->RolesID .= $Role['role_id'];
            } else {
                $this->RolesID .= ',' . $Role['role_id'];
            }
        }
    }
}
