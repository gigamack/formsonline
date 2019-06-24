<?php
class RequestGraduate extends CI_Controller
{
    private $DocumentID;
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('DocumentModel');
        $this->load->model('DocumentStateModel');
        $this->load->library('uuid');
        $this->load->model('Student_model');
        $this->load->config('email');
        $this->load->library('email');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestGraduate');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }
    public function Insert()
    {
        $this->DocumentID = $this->uuid->v4();

        $data = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01',
            'StudentID' => $_POST['stdid'],
            'tel' => $_POST['tel'],
            'termEnd' => $_POST['termEnd'],
            'yearEnd' => $_POST['yearEnd'],
            'soi' => $_POST['soi'],
            'houseNumber' => $_POST['homenumber'],
            'street' => $_POST['street'],
            'sub_district' => $_POST['subdistrict'],
            'district' => $_POST['district'],
            'province' => $_POST['province'],
            'zipcode' => $_POST['zipcode'],
            'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocumentModel->Insert($data);

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
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('student/edit/RequestGraduate');
        $this->load->view('dashboard/footer');
    }
    public function Get()
    { }
    public function Update($DocumentID)
    {
        $data = array(
            'tel' => $_POST['tel'],
            'termEnd' => $_POST['termEnd'],
            'yearEnd' => $_POST['yearEnd'],
            'soi' => $_POST['soi'],
            'houseNumber' => $_POST['homenumber'],
            'street' => $_POST['street'],
            'sub_district' => $_POST['subdistrict'],
            'district' => $_POST['district'],
            'province' => $_POST['province'],
            'zipcode' => $_POST['zipcode'],

        );
        $this->DocumentModel->update($DocumentID, $data);
        redirect(base_url() . "dashboard");
    }
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
