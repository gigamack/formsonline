<?php
class Dashboard extends CI_Controller
{
    private $data;

    public function __construct()
    {
        parent::__construct();

        $this->checkAuthentication();
        $this->setSelectDocumentType();
        $this->load->model('UserModel');
        $this->load->model('DocumentTypeModel');
        $this->load->model('DocModel');
    }

    public function index()
    {
        $this->setData();
        $this->load->view('dashboard/header', $this->data);
        $this->load->view('dashboard/dashboard');

        switch ($this->data['selectDocumentType']) {
            case '1':
                return redirect(base_url() . 'form/requesttemporarystudentcard');
                break;
            case '2':
                return redirect(base_url() . 'form/requestnamechanging');
                break;
            case '3':
                return redirect(base_url() . 'form/requestgraduate');
                break;
            case '4':
                return redirect(base_url() . 'form/requestmastergraduate');
                break;
            case '5':
                return redirect(base_url() . 'form/requestdebtinvestigate');
                break;
            case '6':
                return redirect(base_url() . 'form/requestcertificate');
                break;
            case '7':
                return redirect(base_url() . 'form/requestmorecredits');
                break;
            case '8':
                return redirect(base_url() . 'form/requestcoursetransfer');
                break;
            default:
                break;
        }

        $this->load->view('StdReqTable');
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
    private function setSelectDocumentType()
    {
        $_SESSION['selectDocumentType'] = isset($_POST['selectDocumentType']) ? $_POST['selectDocumentType'] : "";
    }
}
