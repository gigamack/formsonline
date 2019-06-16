<?php

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Student_model');
        $this->load->model('PSUPassportModel');
    }

    public function index()
    {
        $credentail = array(
            'username' => $_POST['username'],
            'password' => $_POST['password'],
        );
        $UserInfo = $this->User_model->getUserInfo($credentail);
        if ($UserInfo['AuthenticationResult'] == 1) {
            $PSUPassport = $UserInfo['PSUPassport']['GetUserDetailsResult']['string'];
            $UserRoles = $UserInfo['UserRoles']['result'];
            $StudentInfo = $UserInfo['StudentInfo'];
            $_SESSION['PSUPassportInfo'] = $PSUPassport;
            $_SESSION['UserRolesInfo'] = $UserRoles;
            $_SESSION['StudentInfo'] = $StudentInfo;
            $_SESSION['Authentication'] = "true";
            if (isset($UserRoles[0]['role_id'])) {
                redirect(base_url('admin/dashboard'));
            } else {
                redirect(base_url("dashboard"));
            }
        } else {
            $_SESSION['errors'] = 'Fail';
            redirect(base_url());
        }
    }
    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}
