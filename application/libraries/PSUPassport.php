<?php
//defined('BASEPATH') or exit('No direct script access allowed');

class PSUPassport
{
    public function __construct($credential)
    {
        $this->username = $credential['username'];
        $this->password = $credential['password'];
        $this->url = "http://web3.phuket.psu.ac.th:8000/api/2/passport/";
        $this->headers = array(
            'username:' . $this->username,
            'password:' . $this->password,
            'application_name:formsonline',
            'Content-Type: application/json',
        );
    }

    private function connect_services($functionName)
    {

        $url = $this->url . $functionName;

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl_handle);

        if (!$result) {die('Connection Failure');}

        curl_close($curl_handle);
        $response = json_decode($result, true);

        return $response;
    }

    public function Authenticate()
    {
        return $this->connect_services('Authenticate');
    }

    public function GetStaffDetails()
    {
        return $this->connect_services('GetStaffDetails');
    }

    public function GetStaffID()
    {
        return $this->connect_services('GetStaffID');
    }

    public function GetStudentDetails()
    {
        return $this->connect_services('GetStudentDetails');
    }

    public function GetUserDetails()
    {

        return $this->connect_services('GetUserDetails');
    }
}
