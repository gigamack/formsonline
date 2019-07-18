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
    { }
    public function Insert()
    { }
    public function Get($DocumentID)
    {
        $this->data['UserInfo'] = $this->UserModel;
        $Document = $this->DocumentModel->getWithDocumentType($DocumentID);
        $LastState = $this->DocumentStateModel->getLastState($DocumentID);
        $this->StudentModel->setStudent($this->Student_model->getStudentInfo($Document[0]->StudentID));
        $this->data['Document'] = (object) array_merge((array) $Document[0], (array) $this->StudentModel,  (array) $LastState[0]);
        $this->load->view('dashboard/headerAdmin', $this->data);
        $this->load->view('student/view/header');
        $this->load->view('student/view/RequestGraduate');
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
