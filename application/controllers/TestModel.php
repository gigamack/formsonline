<?php
class TestModel extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->helper(array('form', 'url'));
    }

    public function showstdinfo()
    {
       $stdid = '4935511076';
        $data['stdInfo']=$this->Student_model->getStudentInfo($stdid);
        $this->load->view('testviewModelData',$data);
    }

}

?>