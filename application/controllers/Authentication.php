<?php

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $credentail = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        );
        $UserInfo = $this->User_model->getUserInfo($credentail);
        // print_r($UserInfo);
        if($UserInfo['UserType'] = 'Staffs')
        {
           $_SESSION['userid'] = $UserInfo['']
                 redirect(base_url("/formcontrol/stdCardFormAdmin"));
            
        }
        print_r($UserInfo['PSUPassport']['GetUserDetailsResult']['string']['0']);
    

    }
}
