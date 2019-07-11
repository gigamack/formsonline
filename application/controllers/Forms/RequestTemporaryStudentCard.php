<?php
class RequestTemporaryStudentCard extends CI_Controller
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
        $this->load->model('ReasonModel');
        $this->load->model('StudentModel');
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
        $this->load->view('student/RequestTemporaryStudentCard');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }
    public function Insert()
    {
        $this->DocumentID = $this->uuid->v4();
        $filename = '';
        if ($_FILES['stdPicFile']['name'] != '') {
            $fileExtension = pathinfo($_FILES['stdPicFile']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdPicFile']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
        }
        $data = array(
            'DocumentID' => $this->DocumentID,
            'StudentID' => $_POST['stdid'],
            'StatusID' => 'S01',
            'ReasonID' => $_POST['reason'],
            'ReasonOther' => $_POST['other'],
            'PoliceNoticePath' => $filename,
            'DocTypeID' => $_POST['DocTypeID']
        );

        $this->DocumentModel->Insert($data);

        $DocumentState = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01'
        );
        $this->DocumentStateModel->insert($DocumentState);

        //$this->sendMail();
        redirect(base_url() . 'dashboard');
    }
    public function Get($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $Document = $this->DocumentModel->GetWithReason($DocumentID);
        $LastState = $this->DocumentStateModel->getLastState($DocumentID);
        $this->StudentModel->setStudent($this->Student_model->getStudentInfo($Document[0]->StudentID));
        $this->data['Document'] = (object) array_merge((array) $Document[0], (array) $this->StudentModel,  (array) $LastState[0]);
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('student/view/RequestTemporaryStudentCard');
    }
    public function Update($DocumentID)
    {
        $data = array();
        $targetPath = getcwd() . '/uploads/';
        if (!empty($_FILES['stdPicFile']['name'])) {
            $fileExtension = pathinfo($_FILES['stdPicFile']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['stdPicFile']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['oldfilename']);
            $data = array(
                "ReasonID" => $_POST['reason'],
                "PoliceNoticePath" => $filename
            );
        } else {
            if ($_POST['reason'] == "1") {
                $data = array(
                    "ReasonID" => $_POST['reason'],
                );
            } else {
                $data = array(
                    "ReasonID" => $_POST['reason'],
                    "PoliceNoticePath" => ""
                );
                unlink($targetPath . $_POST['oldfilename']);
            }
        }
        $this->DocumentModel->update($DocumentID, $data);
        redirect(base_url() . 'dashboard');
    }
    public function Edit($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['Document'] = $this->DocumentModel->Get($DocumentID);
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('student/edit/RequestTemporaryStudentCard');
        $this->load->view('dashboard/footer');
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
