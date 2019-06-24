<?php
class RequestCertificate extends CI_Controller
{
    private $data;
    private $DocumentID;

    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
        $this->load->model('CertModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->config('email');
        $this->load->library('email');
        $this->load->model('DocumentModel');
        $this->load->model('DocumentStateModel');
        $this->load->library('uuid');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestCertificate');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }
    public function Insert()
    {
        $this->DocumentID = $this->uuid->v4();
        //start with insert amount of cert into certRecord table then insert to document table 

        //eng u form
        isset($_POST["amount_en_u1"]) ? $en_u1 = $_POST["amount_en_u1"] : $en_u1 = 0;
        isset($_POST["amount_en_u2"]) ? $en_u2 = $_POST["amount_en_u2"] : $en_u2 = 0;
        isset($_POST["amount_en_u3"]) ? $en_u3 = $_POST["amount_en_u3"] : $en_u3 = 0;
        isset($_POST["amount_en_u4"]) ? $en_u4 = $_POST["amount_en_u4"] : $en_u4 = 0;
        isset($_POST["amount_en_u5"]) ? $en_u5 = $_POST["amount_en_u5"] : $en_u5 = 0;
        isset($_POST["amount_en_u6"]) ? $en_u6 = $_POST["amount_en_u6"] : $en_u6 = 0;
        //TH u form
        isset($_POST["amount_th_u1"]) ? $th_u1 = $_POST["amount_th_u1"] : $th_u1 = 0;
        isset($_POST["amount_th_u2"]) ? $th_u2 = $_POST["amount_th_u2"] : $th_u2 = 0;
        isset($_POST["amount_th_u3"]) ? $th_u3 = $_POST["amount_th_u3"] : $th_u3 = 0;
        isset($_POST["amount_th_u4"]) ? $th_u4 = $_POST["amount_th_u4"] : $th_u4 = 0;
        isset($_POST["amount_th_u5"]) ? $th_u5 = $_POST["amount_th_u5"] : $th_u5 = 0;
        isset($_POST["amount_th_u6"]) ? $th_u6 = $_POST["amount_th_u6"] : $th_u6 = 0;
        //en g form
        isset($_POST["amount_en_g1"]) ? $en_g1 = $_POST["amount_en_g1"] : $en_g1 = 0;
        isset($_POST["amount_en_g2"]) ? $en_g2 = $_POST["amount_en_g2"] : $en_g2 = 0;
        //th g form
        isset($_POST["amount_th_g1"]) ? $th_g1 = $_POST["amount_th_g1"] : $th_g1 = 0;
        isset($_POST["amount_th_g2"]) ? $th_g2 = $_POST["amount_th_g2"] : $th_g2 = 0;
        //en o form
        isset($_POST["amount_en_o1"]) ? $en_o1 = $_POST["amount_en_o1"] : $en_o1 = 0;
        isset($_POST["amount_en_o2"]) ? $en_o2 = $_POST["amount_en_o2"] : $en_o2 = 0;
        isset($_POST["amount_en_o3"]) ? $en_o3 = $_POST["amount_en_o3"] : $en_o3 = 0;
        isset($_POST["amount_en_o4"]) ? $en_o4 = $_POST["amount_en_o4"] : $en_o4 = 0;
        isset($_POST["amount_en_o5"]) ? $en_o5 = $_POST["amount_en_o5"] : $en_o5 = 0;
        //th o form 
        isset($_POST["amount_th_o1"]) ? $th_o1 = $_POST["amount_th_o1"] : $th_o1 = 0;
        isset($_POST["amount_th_o2"]) ? $th_o2 = $_POST["amount_th_o2"] : $th_o2 = 0;
        isset($_POST["amount_th_o3"]) ? $th_o3 = $_POST["amount_th_o3"] : $th_o3 = 0;
        isset($_POST["amount_th_o4"]) ? $th_o4 = $_POST["amount_th_o4"] : $th_o4 = 0;
        isset($_POST["amount_th_o5"]) ? $th_o5 = $_POST["amount_th_o5"] : $th_o5 = 0;
        echo $en_u1;
        //Insert to certrecord
        $data = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01',
            'StudentID' => $_POST['stdid'],
            'tel' => $_POST['tel'],
            'addressCert' => $_POST['postaladdress'],
            'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocumentModel->Insert($data);


        //insert u form in cert record    
        if ($en_u1 + $th_u1 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u1", 'engAmount' => $en_u1, 'thAmount' => $th_u1
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_u2 + $th_u2 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u2", 'engAmount' => $en_u2, 'thAmount' => $th_u2
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_u3 + $th_u3 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u3", 'engAmount' => $en_u3, 'thAmount' => $th_u3
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_u4 + $th_u4 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u4", 'engAmount' => $en_u4, 'thAmount' => $th_u4
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_u5 + $th_u5 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u5", 'engAmount' => $en_u5, 'thAmount' => $th_u5
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_u6 + $th_u6 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "u6", 'engAmount' => $en_u6, 'thAmount' => $th_u6
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }

        // insert g form in cert record  
        if ($en_g1 + $th_g1 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "g1", 'engAmount' => $en_g1, 'thAmount' => $th_g1
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_g2 + $th_g2 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "g2", 'engAmount' => $en_g2, 'thAmount' => $th_g2
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }

        // insert o form in cert record  
        if ($th_o1 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "o1", 'engAmount' => $en_o1, 'thAmount' => $th_o1
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_o2 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "o2", 'engAmount' => $en_o2, 'thAmount' => $th_o2
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($th_o3 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "o3", 'engAmount' => $en_o3, 'thAmount' => $th_o3
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($th_o4 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "o4", 'engAmount' => $en_o4, 'thAmount' => $th_o4
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }
        if ($en_o5 + $th_o5 > 0) {
            $dataCert = array(
                'DocumentID' => $this->DocumentID, 'certID' => "o5", 'engAmount' => $en_o5, 'thAmount' => $th_o5, 'othername' => $_POST['othercertname']
            );
            $this->CertModel->InsertcertRecord($dataCert);
        }

        $DocumentState = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01'
        );
        $this->DocumentStateModel->Insert($DocumentState);

        //$this->sendMail();
        redirect(base_url() . 'dashboard');
    }
    public function Edit($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['Document'] = $this->DocumentModel->Get($DocumentID);
        $this->data['certDetail'] = $this->CertModel->getCertDetailBydocID($DocumentID);
        $this->data['Certificate'] = $this->CertModel->Get($DocumentID);
        $this->data['docInfo'] = $this->DocModel->getDocBydocID($DocumentID);
        $this->data['certDetail'] = $this->CertModel->getCertDetailBydocID($DocumentID);
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('student/edit/RequestCertificate');
        $this->load->view('dashboard/footer');
    }
    public function Get()
    { }
    public function Update()
    { }
    public function Delete($DocumentID)
    {
        $data = array('DocumentID' => $DocumentID);
        $docinfo['docInfo'] = $this->DocModel->getDocBydocID($DocumentID);
        if ($docinfo['docInfo'][0]['PoliceNoticePath'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['PoliceNoticePath']);
        }
        if ($docinfo['docInfo'][0]['stdFile1'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile1']);
        }
        if ($docinfo['docInfo'][0]['stdFile2'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile2']);
        }
        if ($docinfo['docInfo'][0]['stdFile3'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile3']);
        }
        $this->DocModel->deleteDoc($data);
        redirect(base_url() . 'dashboard');
    }
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
