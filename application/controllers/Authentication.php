<?php

class Authentication extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Student_model');
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
        if ($UserInfo['AuthenticationResult'] == 1) {
            if ($_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string']['9'] == 'C03') {
                 if (empty($UserInfo['UserRoles']['result'])==false) {
                    redirect(base_url('admin/dashboard'));
                } else {
                    $_SESSION["ddlchosen"] = '0';
                    redirect(base_url("student/dashboard"));
                }
            } else {
                $this->logout();

            }
        } elseif ($_POST['password'] = 'test') //addded for test std
        { //addded for test std
            $dataTest = $this->Student_model->getStudentInfo($_POST['username']); //addded for test std

            print_r($dataTest); //addded for test std
            if($dataTest!=null){
                $_SESSION['userSession']['UserType'] = 'Students'; //addded for test std
                $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] = $dataTest['STUDENT_ID']; //addded for test std
                $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][0] = $dataTest['STUDENT_ID']; //addded for test std
                $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][1] = $dataTest['STUD_NAME_THAI']; //addded for test std
                $_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][2] = $dataTest['STUD_SNAME_THAI']; //addded for test std
                $_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'] = $dataTest['FAC_NAME_THAI']; //addded for test std
                $_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'] = $dataTest['MAJOR_NAME_THAI']; //addded for test std
                $_SESSION["ddlchosen"] = '0';
                
                redirect(base_url("student/dashboard"));
            }else{
                $_SESSION['errors'] = 'Fail';
                redirect(base_url());
            }
            
        } //addded for test std
        else {
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
