<?php
class RequestCourseTransfer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("DocumentModel");
        $this->load->model("DocumentStateModel");
        $this->load->model("UserModel");
    }

    public function index()
    { }
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

        redirect(base_url()."admin/dashboard");
    }
}
