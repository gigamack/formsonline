<?php
class RequestTemporaryStudentCard extends CI_Controller
{
    private $data;
    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->config('email');
        $this->load->library('email');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestTemporaryStudentCard');
        $this->load->view('StdReqTable');
    }
    public function Insert()
    {
        $filename = '';
        $encodename = uniqid();
        if ($_FILES['stdPicFile']['name'] != '') {
            $filename = $encodename . '_' . $_FILES['stdPicFile']['name'];
            $tempFile = $_FILES['stdPicFile']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdPicFile']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        $data = array(
            'StudentID' => $_POST['stdid'], 'ReasonID' => $_POST['reason'], 'ReasonOther' => $_POST['other'], 'PoliceNoticePath' => $filename, 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        echo $targetPath;
        //$this->sendMail();
        redirect(base_url() . 'dashboard');
    }
    public function Get()
    { }
    public function Update()
    { }
    public function Delete()
    { }

    /////// Private Function /////////
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
