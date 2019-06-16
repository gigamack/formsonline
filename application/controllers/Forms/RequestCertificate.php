<?php
class RequestCertificate extends CI_Controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
        $this->load->model('Student_model');
        $this->load->config('email');
        $this->load->library('email');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestCertificate');
        $this->load->view('StdReqTable');
    }
    public function Insert()
    {
        //start with insert amount of cert into certRecord table then insert to document table 

        //eng u form
        isset($_POST["en_amount_u1"]) ? $en_u1 = $_POST["en_amount_u1"] : $en_u1 = 0;
        isset($_POST["en_amount_u2"]) ? $en_u2 = $_POST["en_amount_u2"] : $en_u2 = 0;
        isset($_POST["en_amount_u3"]) ? $en_u3 = $_POST["en_amount_u3"] : $en_u3 = 0;
        isset($_POST["en_amount_u4"]) ? $en_u4 = $_POST["en_amount_u4"] : $en_u4 = 0;
        isset($_POST["en_amount_u5"]) ? $en_u5 = $_POST["en_amount_u5"] : $en_u5 = 0;
        isset($_POST["en_amount_u6"]) ? $en_u6 = $_POST["en_amount_u6"] : $en_u6 = 0;
        //TH u form
        isset($_POST["th_amount_u1"]) ? $th_u1 = $_POST["th_amount_u1"] : $th_u1 = 0;
        isset($_POST["th_amount_u2"]) ? $th_u2 = $_POST["th_amount_u2"] : $th_u2 = 0;
        isset($_POST["th_amount_u3"]) ? $th_u3 = $_POST["th_amount_u3"] : $th_u3 = 0;
        isset($_POST["th_amount_u4"]) ? $th_u4 = $_POST["th_amount_u4"] : $th_u4 = 0;
        isset($_POST["th_amount_u5"]) ? $th_u5 = $_POST["th_amount_u5"] : $th_u5 = 0;
        isset($_POST["th_amount_u6"]) ? $th_u6 = $_POST["th_amount_u6"] : $th_u6 = 0;
        //en g form
        isset($_POST["en_amount_g1"]) ? $en_g1 = $_POST["en_amount_g1"] : $en_g1 = 0;
        isset($_POST["en_amount_g2"]) ? $en_g2 = $_POST["en_amount_g2"] : $en_g2 = 0;
        //th g form
        isset($_POST["th_amount_g1"]) ? $th_g1 = $_POST["th_amount_g1"] : $th_g1 = 0;
        isset($_POST["th_amount_g2"]) ? $th_g2 = $_POST["th_amount_g2"] : $th_g2 = 0;
        //en o form
        isset($_POST["en_amount_o1"]) ? $en_o1 = $_POST["en_amount_o1"] : $en_o1 = 0;
        isset($_POST["en_amount_o2"]) ? $en_o2 = $_POST["en_amount_o2"] : $en_o2 = 0;
        isset($_POST["en_amount_o3"]) ? $en_o3 = $_POST["en_amount_o3"] : $en_o3 = 0;
        isset($_POST["en_amount_o4"]) ? $en_o4 = $_POST["en_amount_o4"] : $en_o4 = 0;
        isset($_POST["en_amount_o5"]) ? $en_o5 = $_POST["en_amount_o5"] : $en_o5 = 0;
        //th o form 
        isset($_POST["th_amount_o1"]) ? $th_o1 = $_POST["th_amount_o1"] : $th_o1 = 0;
        isset($_POST["th_amount_o2"]) ? $th_o2 = $_POST["th_amount_o2"] : $th_o2 = 0;
        isset($_POST["th_amount_o3"]) ? $th_o3 = $_POST["th_amount_o3"] : $th_o3 = 0;
        isset($_POST["th_amount_o4"]) ? $th_o4 = $_POST["th_amount_o4"] : $th_o4 = 0;
        isset($_POST["th_amount_o5"]) ? $th_o5 = $_POST["th_amount_o5"] : $th_o5 = 0;

        //Insert to certrecord
        $data = array(
            'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'addressCert' => $_POST['postaladdress'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);

        //this part is unfinished
        $data['maxdoc'] = $this->DocModel->getMaxDocIDByuserID($_POST['stdid']);
        $DocID = $data['maxdoc'][0]['maxDocID'];

        $dataCert = array(
            'docID' => $DocID, 'certID' => $_POST['tel'], 'engAmount' => $_POST['postaladdress'], 'thAmount' => $_POST['DocTypeID']
        );


        // $this->sendMail();
        // redirect(base_url() . 'dashboard');
    }
    public function Get()
    { }
    public function Update()
    { }
    public function Delete()
    { }
    private function setData()
    {
        $this->data['selectDocumentType'] = isset($_SESSION['selectDocumentType']) ? $_SESSION['selectDocumentType'] : "";
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['DocumentType'] = $this->DocumentTypeModel->getDocumentType($this->UserModel->Type);
        $this->data['DocList'] = $this->DocModel->selectDocWithStateOrder(array('StudentID' => $this->UserModel->ID), 'CreatedDate', 'DESC');
    }
    private function checkAuthentication()
    {
        ($_SESSION['Authentication'] === "true") ? "" : redirect(base_url("/"));
    }
    private function sendMail()
    {
        $from_email = $this->config->item('smtp_user');
        $to_email = "nitiwat.t@phuket.psu.ac.th";

        $this->email->from($from_email, 'Nitiwat Thongkao');
        $this->email->to($to_email);
        $this->email->subject('PSU Phuket Online Forms');
        $this->email->message('You have submitted The Requisition Form for temporary PSU Identification Card.');
        $this->email->set_newline("\r\n");
        $this->email->send();
        //echo $this->email->print_debugger();
    }
}
