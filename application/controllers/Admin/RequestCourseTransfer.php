<?php
class RequestCourseTransfer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DocumentModel");
        $this->load->model("DocumentStateModel");
        $this->load->model('Student_model');
        $this->load->model('TransferSubjectRequestModel');
        $this->load->model('TransferSubjectModel');
        $this->load->model("UserModel");
    }

    public function index()
    { }
    public function Get($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $Document = $this->DocumentModel->getWithDocumentType($DocumentID);
        $LastState = $this->DocumentStateModel->getLastState($DocumentID);
        $TransferSubject = $this->TransferSubjectModel->Get($DocumentID);
        $TransferSubjectRequest = $this->TransferSubjectRequestModel->Get($DocumentID);
        $this->StudentModel->setStudent($this->Student_model->getStudentInfo($Document[0]->StudentID));
        $this->data['Document'] = (object) array_merge((array) $Document[0], (array) $this->StudentModel,  (array) $LastState[0]);
        $this->data['TransferSubject'] = $TransferSubject[0];
        $this->data['TransferSubjectRequest'] = $TransferSubjectRequest;
        $this->load->view('dashboard/headerAdmin', $this->data);
        $this->load->view('student/view/header');
        $this->load->view('student/view/RequestCourseTransfer');
    }
    public function approve($DocumentID)
    {
        $StatusID = $_POST['btnApprove'];
        $Comment = $_POST['commentText'];
        $CommenterID = $this->UserModel->ID;
        $CommenterName = $this->UserModel->Fullname;
        $data = array(
            "DocumentID" => $DocumentID,
            "StatusID" => $StatusID,
            "OfficerCommentText" => $Comment,
            "OfficerID" => $CommenterID,
            "OfficerName" => $CommenterName
        );
        $this->DocumentStateModel->Insert($data);
        $this->DocumentModel->Update($DocumentID, array("StatusID" => $StatusID));

        redirect(base_url() . "admin/dashboard");
    }
}
