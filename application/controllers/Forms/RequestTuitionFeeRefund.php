<?php
class RequestTuitionFeeRefund extends CI_Controller
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
        $this->load->model('DocumentModel');
        $this->load->model('DocumentStateModel');
        $this->load->model('Student_model');
        $this->load->library('uuid');
        $this->load->config('email');
        $this->load->library('email');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestTuitionFeeRefund');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');

    }
    public function Insert()
    {

    }
    public function Get()
    {
    }
    public function Update($DocumentID)
    {

    }
    public function Edit($DocumentID)
    {

    }
    public function Delete($DocumentID)
    {

    }
    private function checkAuthentication()
    {
        ($_SESSION['Authentication'] === "true") ? "" : redirect(base_url("/"));
    }
    private function setData()
    {
        $this->data['selectDocumentType'] = isset($_SESSION['selectDocumentType']) ? $_SESSION['selectDocumentType'] : "";
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['DocumentType'] = $this->DocumentTypeModel->getDocumentType($this->UserModel->Type);
        $this->data['DocList'] = $this->DocModel->selectDocWithStateOrder(array('StudentID' => $this->UserModel->ID), 'CreatedDate', 'DESC');
    }
}