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
        $_SESSION['userSession'] = $UserInfo;
        if($UserInfo['AuthenticationResult']==1)
        {
            if ($UserInfo['UserType'] == 'Staffs') {
                redirect(base_url("FormControl/formindexAdmin"));
                // redirect(base_url('formcontrol/stdCardFormAdmin'));
                // redirect(base_url("formcontrol/stdCardFormAdmin"));
                // echo $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string']['0'];
            } else 
            {
                redirect(base_url("FormControl/formindex"));
                //redirect(base_url("formcontrol/stdCardMain"));
                // print_r($_SESSION['userSession']['StudentInfo']);
                // echo $_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
            }
        //print_r($UserInfo['PSUPassport']['GetUserDetailsResult']['string']['0']);
        }
        else
        {
            $_SESSION['errors']='Fail';
            redirect(base_url());

        }

    }
    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
    
}
