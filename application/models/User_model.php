<?php

class User_model extends CI_Model
{
    private $credential;
    private $UserInfo;
    private $Username;
    private $UserType;

    private function setUserInfo()
    {
        $this->load->library('psupassport', $this->credential);
        $this->load->library('roleprovider');
        $PSUPassportResult = $this->psupassport->GetUserDetails();
        $this->Username = (isset($PSUPassportResult['GetUserDetailsResult']) ? $PSUPassportResult['GetUserDetailsResult']['string'][0] : '');
        $UserRoles = $this->roleprovider->GetRoles($this->Username);
        $this->UserInfo = array(
            "UserType" => isset($PSUPassportResult['GetUserDetailsResult']) ? $this->getUserType($PSUPassportResult['GetUserDetailsResult']['string'][14]) : '',
            "PSUPassport" => $PSUPassportResult,
            "UserRoles" => $UserRoles,
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

// Array ( [0] => nitiwat.t
// [1] => นิติวัฒน์
// [2] => ทองขาว
// [3] => 0016508
// [4] => M
// [5] => 1929900008642
// [6] => D270
// [7] => F58
// [8] => สำนักงานอธิการบดีวิทยาเขตภูเก็ต สำนักงานอธิการบดี วิทยาเขตภูเก็ [9] => C03 [10] => วิทยาเขตภูเก็ต [11] => T01
// [12] => นาย
// [13] => nitiwat.t@phuket.psu.ac.th
// [14] => CN=0016508-nitiwat,OU=D270,OU=F58,OU=C03,OU=Staffs,DC=psu,DC=ac,DC=th )
