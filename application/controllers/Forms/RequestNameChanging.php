<?php
class RequestNameChanging extends CI_Controller
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
        $this->load->view('student/RequestNameChanging');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }
    public function Insert()
    {
        $this->DocumentID = $this->uuid->v4();

        $filename = '';
        if ($_FILES['stdFile1']['name'] != '') {
            $fileExtension = pathinfo($_FILES['stdFile1']['name'], PATHINFO_EXTENSION);
            $filename1 = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile1']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $filename1;
            move_uploaded_file($tempFile, $targetFile);
        }
        if ($_FILES['stdFile2']['name'] != '') {
            $fileExtension = pathinfo($_FILES['stdFile2']['name'], PATHINFO_EXTENSION);
            $filename2 = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile2']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $filename2;
            move_uploaded_file($tempFile, $targetFile);
        }
        if ($_FILES['stdFile3']['name'] != '') {
            $fileExtension = pathinfo($_FILES['stdFile3']['name'], PATHINFO_EXTENSION);
            $filename3 = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile3']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $filename3;
            move_uploaded_file($tempFile, $targetFile);
        }
        $data = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01',
            'StudentID' => $_POST['stdid'],
            'tel' => $_POST['tel'],
            'stdFile1' => $filename1,
            'stdFile2' => $filename2,
            'stdFile3' => $filename3,
            'reason' => $_POST['reason'],
            'newthname' => $_POST['newthName'],
            'newthsname' => $_POST['newthSname'],
            'newengname' => $_POST['newengName'],
            'newengsname' => $_POST['newengSname'],
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
        $this->load->view('student/edit/RequestNameChanging');
        $this->load->view('dashboard/footer');
    }
    public function Get()
    { }
    public function Update($DocumentID)
    {
        if (!empty($_FILES['stdFile1']['name'])) {
            $targetPath = getcwd() . '/uploads/';
            $fileExtension = pathinfo($_FILES['stdFile1']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile1']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['oldfilename1']);
            $data = array(
                "stdFile1" => $filename
            );
            $this->DocumentModel->update($DocumentID, $data);
        }
        if (!empty($_FILES['stdFile2']['name'])) {
            $targetPath = getcwd() . '/uploads/';
            $fileExtension = pathinfo($_FILES['stdFile2']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile2']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['oldfilename1']);
            $data = array(
                "stdFile2" => $filename
            );
            $this->DocumentModel->update($DocumentID, $data);
        }
        if (!empty($_FILES['stdFile3']['name'])) {
            $targetPath = getcwd() . '/uploads/';
            $fileExtension = pathinfo($_FILES['stdFile3']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdFile3']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['oldfilename3']);
            $data = array(
                "stdFile3" => $filename
            );
            $this->DocumentModel->update($DocumentID, $data);
        }
        $data = array(
            "tel" => $_POST['tel'],
            "newthname" => $_POST['newthName'],
            "newthsname" => $_POST['newthSname'],
            "newengname" => $_POST['newengName'],
            "newengsname" => $_POST['newengSname'],
            "reason" => $_POST['reason']
        );
        $this->DocumentModel->update($DocumentID, $data);

        redirect(base_url() . 'dashboard');
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
