<?php
class RequestCourseTransfer extends CI_Controller
{
    private $data;
    private $DocumentID;
    private $ReasonFor1;
    private $ReasonFor2;
    private $ReasonFor3;
    public function __construct()
    {
        parent::__construct();
        $this->checkAuthentication();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
        $this->load->model('Student_model');
        $this->load->model('TransferSubjectRequestModel');
        $this->load->model('TransferSubjectModel');
        $this->load->model('DocumentOption');
        $this->load->model('DocumentModel');
        $this->load->model('DocumentStateModel');
        $this->load->library('uuid');
        $this->load->config('email');
        $this->load->library('email');
    }
    public function Index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');
        $this->load->view('student/RequestCourseTransfer');
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }
    public function Insert()
    {
        $CoursesTransfer = json_decode($_POST['CoursesTransfer']);
        $this->DocumentID = $this->uuid->v4();


        $targetPath = getcwd() . '/uploads/';
        $filename = '';
        if (!empty($_FILES['fileAttachment']['name'])) {
            $fileExtension = pathinfo($_FILES['fileAttachment']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['fileAttachment']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
        }

        $Document = array(
            'DocumentID' => $this->DocumentID,
            'StudentID' => $_POST['StudentID'],
            'StatusID' => 'S01',
            'tel' => $_POST['MobileNumber'],
            'DocTypeID' => 8,
            'stdFile1' => $filename
        );
        $this->DocumentModel->Insert($Document);
        $this->setDataReasonFor();
        $TransferSubject = array(
            'ID' => $this->uuid->v4(),
            'DocumentID' => $this->DocumentID,
            'RequestForID' => $_POST['RequestForItem'],
            'RequestForOther' => $_POST['txtRequestForItemOT'],
            'ReasonForID' => $_POST['ReasonForRequest'],
            'ReasonFor1' => $this->ReasonFor1,
            'ReasonFor2' => $this->ReasonFor2,
            'ReasonFor3' => $this->ReasonFor3,
            'CreatedBy' => $this->UserModel->ID
        );

        $this->TransferSubjectModel->Insert($TransferSubject);

        for ($i = 0; $i < sizeof($CoursesTransfer); $i++) {
            $CoursesSubjectID = $this->uuid->v4();
            $SubjectRequest = array(
                'ID' => $CoursesSubjectID,
                'DocumentID' => $this->DocumentID,
                'SubjectIDFrom' => $CoursesTransfer[$i][0]->txtCourseStudiedCode,
                'SubjectNameFrom' => $CoursesTransfer[$i][1]->txtCourseStudiedName,
                'CreditsFrom' => $CoursesTransfer[$i][2]->txtCourseStudiedCredits,
                'SubjectIDTo' => $CoursesTransfer[$i][3]->txtCourseTransferCode,
                'SubjectNameTo' => $CoursesTransfer[$i][4]->txtCourseTransferName,
                'CreditsTo' => $CoursesTransfer[$i][5]->txtCourseTransferCredits,
                'RequestOrder' => ($i + 1),
                'CreatedBy' => $this->UserModel->ID,
                'ModifiedBy' => ''
            );
            $this->TransferSubjectRequestModel->Insert($SubjectRequest);
        }

        $DocumentState = array(
            'DocumentID' => $this->DocumentID,
            'StatusID' => 'S01'
        );
        $this->DocumentStateModel->insert($DocumentState);
        //print_r($_POST);

        //$this->sendMail();
        redirect(base_url() . 'dashboard');
    }

    public function Edit($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['Document'] = $this->DocumentModel->Get($DocumentID);
        $this->data['TransferSubject'] = $this->TransferSubjectModel->Get($DocumentID);
        $this->data['TransferSubjectRequest'] = $this->TransferSubjectRequestModel->Get($DocumentID);
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('student/edit/RequestCourseTransfer');
        $this->load->view('dashboard/footer');
    }
    public function Get()
    { }
    public function Update($DocumentID)
    {

        $targetPath = getcwd() . '/uploads/';
        if (!empty($_FILES['fileAttachment']['name'])) {
            $fileExtension = pathinfo($_FILES['fileAttachment']['name'], PATHINFO_EXTENSION);
            $filename = $this->uuid->v4() . "." . $fileExtension;
            $tempFile = $_FILES['fileAttachment']['tmp_name'];
            $targetFile = $targetPath . $filename;
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['oldfilename']);
            $data = array(
                "stdFile1" => $filename
            );
            $this->DocumentModel->update($DocumentID, $data);
        } else { }

        $Document = array(
            'tel' => $_POST['MobileNumber'],
        );
        $this->DocumentModel->Update($DocumentID, $Document);

        $CoursesTransfer = json_decode($_POST['CoursesTransfer']);
        $this->TransferSubjectRequestModel->DeleteAll($DocumentID);
        for ($i = 0; $i < sizeof($CoursesTransfer); $i++) {
            $CoursesSubjectID = $this->uuid->v4();
            $SubjectRequest = array(
                'ID' => $CoursesSubjectID,
                'DocumentID' => $DocumentID,
                'SubjectIDFrom' => $CoursesTransfer[$i][0]->txtCourseStudiedCode,
                'SubjectNameFrom' => $CoursesTransfer[$i][1]->txtCourseStudiedName,
                'CreditsFrom' => $CoursesTransfer[$i][2]->txtCourseStudiedCredits,
                'SubjectIDTo' => $CoursesTransfer[$i][3]->txtCourseTransferCode,
                'SubjectNameTo' => $CoursesTransfer[$i][4]->txtCourseTransferName,
                'CreditsTo' => $CoursesTransfer[$i][5]->txtCourseTransferCredits,
                'RequestOrder' => ($i + 1),
                'CreatedBy' => $this->UserModel->ID,
                'ModifiedBy' => ''
            );
            $this->TransferSubjectRequestModel->Insert($SubjectRequest);

            $this->setDataReasonFor();
            $TransferSubject = array(
                'RequestForID' => $_POST['RequestForItem'],
                'RequestForOther' => $_POST['txtRequestForItemOT'],
                'ReasonForID' => $_POST['ReasonForRequest'],
                'ReasonFor1' => $this->ReasonFor1,
                'ReasonFor2' => $this->ReasonFor2,
                'ReasonFor3' => $this->ReasonFor3
            );

            $this->TransferSubjectModel->Update($DocumentID, $TransferSubject);
            redirect(base_url() . 'dashboard');
        }
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

    private function setDataReasonFor()
    {
        switch ($_POST['ReasonForRequest']) {
            case "1":
                $this->ReasonFor1 = $_POST['txtAdmissionToUniversity'];
                $this->ReasonFor2 = '';
                $this->ReasonFor3 = '';
                break;
            case "2":
                $this->ReasonFor1 = $_POST['txtApproveMoveFromFieldStudyFrom'];
                $this->ReasonFor2 = $_POST['txtApproveMoveFromFieldStudyTo'];
                $this->ReasonFor3 = $_POST['txtApproveMoveFromFieldStudyYear'];
                break;
            case "3":
                $this->ReasonFor1 = $_POST['txtApproveMoveFromFacultyFrom'];
                $this->ReasonFor2 = $_POST['txtApproveMoveFromFacultyTo'];
                $this->ReasonFor3 = $_POST['txtApproveMoveFromFacultyYear'];
                break;
            case "4":
                $this->ReasonFor1 = $_POST['txtApproveMoveFromUniversityFrom'];
                $this->ReasonFor2 = $_POST['txtApproveMoveFromUniversityTo'];
                $this->ReasonFor3 = $_POST['txtApproveMoveFromUniversityYear'];
                break;
            case "5":
                $this->ReasonFor1 = $_POST['txtOther'];
                $this->ReasonFor2 = '';
                $this->ReasonFor3 = '';
                break;
            default:
                break;
        }
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
