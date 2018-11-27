<?php

class UnitTest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->config->item('config');

        $this->load->model('User_model');
        $this->load->model('DocModel');

        
    }

    public function index()
    {
        $credentail = $this->config->item('test_credentail_success');
        $UserInfo = $this->User_model->getUserInfo($credentail);
        $AuthenticationResult = $UserInfo['AuthenticationResult'];
        $test = $AuthenticationResult;
        $expected_result = 1;
        $test_name = "Authentication Success";
        $this->unit->run($test, $expected_result, $test_name);

        // $credentail = $this->config->item('test_credentail_fail');
        // $UserInfo = $this->User_model->getUserInfo($credentail);
        // $AuthenticationResult = $UserInfo['AuthenticationResult'];
        // $test = $AuthenticationResult;
        // $expected_result = 0;
        // $test_name = "Authentication Fail";
        // $this->unit->run($test, $expected_result, $test_name);






        echo $this->unit->report();
    }
}
