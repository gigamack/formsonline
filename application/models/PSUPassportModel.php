<?php

class PSUPassportModel extends CI_Model
{
    public $UserName;
    public $FirstName;
    public $LastName;
    public $UserID;
    public $Gender;
    public $CardID;
    public $DepartmentID;
    public $FacultyID;
    public $FacultyName;
    public $CampusID;
    public $CampusName;
    public $TitleID;
    public $TitleName;
    public $Email;
    public $Fullname;
    public $UserType;

    public function setPSUPassport($PSUPassortInfo)
    {
        $this->Username = $PSUPassortInfo[0];
        $this->Firstname = $PSUPassortInfo[1];
        $this->Lastname = $PSUPassortInfo[2];
        $this->UserID = $PSUPassortInfo[3];
        $this->Gender = $PSUPassortInfo[4];
        $this->CardID = $PSUPassortInfo[5];
        $this->DepartmentID = $PSUPassortInfo[6];
        $this->FacultyID = $PSUPassortInfo[7];
        $this->FacultyName = $PSUPassortInfo[8];
        $this->CampusID = $PSUPassortInfo[9];
        $this->CampusName = $PSUPassortInfo[10];
        $this->TitleID = $PSUPassortInfo[11];
        $this->TitleName = $PSUPassortInfo[12];
        $this->Email = $PSUPassortInfo[13];
        $this->Fullname = $PSUPassortInfo[1] . " " . $PSUPassortInfo[2];
        $this->UserType = $this->getUserTypeFromPassport($PSUPassortInfo[14]);
    }

    private function getUserTypeFromPassport($PassportData)
    {
        return explode("=", explode(",", $PassportData)[4])[1];
    }
}
