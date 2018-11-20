<?php

class User_model extends CI_Model
{
    private $credential;
    private $UserInfo;
    private $Username;
    private $UserType;
    private $StudentInfo;
    private $AuthenticationResult;

    private function setUserInfo()
    {
        $this->load->library('psupassport', $this->credential);
        $PSUPassport = new PSUPassport($this->credential);
        
        $this->load->library('roleprovider');
        $this->load->library('studentinfo');

        
        $PSUPassportResult = $PSUPassport->GetUserDetails();
        $this->AuthenticationResult = (isset($PSUPassportResult['GetUserDetailsResult']) ? 1 : 0); // 1 = true 0 = false
        
        $this->Username = (($this->AuthenticationResult == 1) ? $PSUPassportResult['GetUserDetailsResult']['string'][0] : '');
        $UserRoles = $this->roleprovider->GetRoles($this->Username);
        $this->UserType = (($this->AuthenticationResult == 1) ? $this->getUserType($PSUPassportResult['GetUserDetailsResult']['string'][14]) : '');
        $this->StudentInfo = $this->studentinfo->getStudentInfo($this->credential['username']);
        $this->UserInfo = array(
            "AuthenticationResult" => $this->AuthenticationResult,
            "UserType" => $this->UserType,
            "PSUPassport" => $PSUPassportResult,
            "UserRoles" => $UserRoles,
            "StudentInfo" => $this->StudentInfo,
        );
    }

    public function getUserInfo($credential)
    {
        $this->credential = $credential;
        $this->setUserInfo();
        return $this->UserInfo;
    }

    private function getUserType($data)
    {
        $DataExplodeResult = explode(',', $data);
        $this->UserType = explode('=', $DataExplodeResult[4])[1];
        return $this->UserType;
    }

}
