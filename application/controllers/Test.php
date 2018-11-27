<?php 
    class Test extends CI_Controller 
    {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->helper(array('form', 'url'));
    }
        public function index()
        {
            $this->load->view('login');

            // $this->load->view('welcome_message');
            // $dataSelect=array('StudentID' => "4935511076");
            // $data=$this->docModel->selectDocWithState($dataSelect);
            // print_r($data);
            // foreach($data as $docid){
            // echo $docid['DocID'];
            // echo "<br/>";
            // }
            //selectLastestState
        }
    }
?>