<?php

class RoleProvider
{
    public function __construct()
    {
        $this->appid = "5775d840-d0f6-11e8-a537-27d43fa8bb86";
        $this->username = "";
        $this->url = "http://api.phuket.psu.ac.th/roleprovider/service/";
    }

    private function connect_services($functionName)
    {

        $url = $this->url . $functionName . "/" . $this->appid . "/" . $this->username;

        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_POST, 0);
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($curl_handle, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($curl_handle);

        if (!$result) {die('Connection Failure');}

        curl_close($curl_handle);
        $response = json_decode($result, true);

        return $response;
    }

    public function GetRoles($username)
    {
        $this->username = $username;
        return $this->connect_services('getroles');
    }

}
