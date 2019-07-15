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
        $this->load->model('DocumentModel');
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
            case '9':
                return redirect(base_url() . 'form/requesttuitionfeerefund');
                break;
            default:
                break;
        }
        $this->load->view('StdReqTable');
        $this->load->view('dashboard/footer');
    }

    public function Edit($DocumentID)
    {
        $this->setData();
        $DocumentTypeID = $this->DocumentModel->getDocumentTypeID($DocumentID);
        $this->load->view('dashboard/header', $this->data);

        switch ($DocumentTypeID) {
            case '1':
                return redirect(base_url() . 'form/requesttemporarystudentcard/edit/' . $DocumentID);
                break;
            case '2':
                return redirect(base_url() . 'form/requestnamechanging/edit/' . $DocumentID);
                break;
            case '3':
                return redirect(base_url() . 'form/requestgraduate/edit/' . $DocumentID);
                break;
            case '4':
                return redirect(base_url() . 'form/requestmastergraduate/edit/' . $DocumentID);
                break;
            case '5':
                return redirect(base_url() . 'form/requestdebtinvestigate/edit/' . $DocumentID);
                break;
            case '6':
                return redirect(base_url() . 'form/requestcertificate/edit/' . $DocumentID);
                break;
            case '7':
                return redirect(base_url() . 'form/requestmorecredits/edit/' . $DocumentID);
                break;
            case '8':
                return redirect(base_url() . 'form/requestcoursetransfer/edit/' . $DocumentID);
                break;
            case '9':
                return redirect(base_url() . 'form/requesttuitionfeerefund/edit/' . $DocumentID);
                break;
            default:
                break;
        }
    }

    public function Delete($DocumentID)
    {
        $this->setData();
        $DocumentTypeID = $this->DocumentModel->getDocumentTypeID($DocumentID);
        $this->load->view('dashboard/header', $this->data);

        switch ($DocumentTypeID) {
            case '1':
                return redirect(base_url() . 'form/requesttemporarystudentcard/delete/' . $DocumentID);
                break;
            case '2':
                return redirect(base_url() . 'form/requestnamechanging/delete/' . $DocumentID);
                break;
            case '3':
                return redirect(base_url() . 'form/requestgraduate/delete/' . $DocumentID);
                break;
            case '4':
                return redirect(base_url() . 'form/requestmastergraduate/delete/' . $DocumentID);
                break;
            case '5':
                return redirect(base_url() . 'form/requestdebtinvestigate/delete/' . $DocumentID);
                break;
            case '6':
                return redirect(base_url() . 'form/requestcertificate/delete/' . $DocumentID);
                break;
            case '7':
                return redirect(base_url() . 'form/requestmorecredits/delete/' . $DocumentID);
                break;
            case '8':
                return redirect(base_url() . 'form/requestcoursetransfer/delete/' . $DocumentID);
                break;
            case '9':
                return redirect(base_url() . 'form/requesttuitionfeerefund/delete/' . $DocumentID);
                break;
            default:
                break;
        }
    }

    public function Get($DocumentID)
    {
        $this->setData();
        $DocumentTypeID = $this->DocumentModel->getDocumentTypeID($DocumentID);
        $this->load->view('dashboard/headerAdmin', $this->data);
        switch ($DocumentTypeID) {
            case '1':
                return redirect(base_url() . 'form/admin/requesttemporarystudentcard/view/' . $DocumentID);
                break;
            case '2':
                return redirect(base_url() . 'form/admin/requestnamechanging/view/' . $DocumentID);
                break;
            case '3':
                return redirect(base_url() . 'form/admin/requestgraduate/view/' . $DocumentID);
                break;
            case '4':
                return redirect(base_url() . 'form/admin/requestmastergraduate/view/' . $DocumentID);
                break;
            case '5':
                return redirect(base_url() . 'form/admin/requestdebtinvestigate/view/' . $DocumentID);
                break;
            case '6':
                return redirect(base_url() . 'form/admin/requestcertificate/view/' . $DocumentID);
                break;
            case '7':
                return redirect(base_url() . 'form/admin/requestmorecredits/view/' . $DocumentID);
                break;
            case '8':
                return redirect(base_url() . 'form/admin/requestcoursetransfer/view/' . $DocumentID);
                break;
            case '9':
                return redirect(base_url() . 'form/admin/requesttuitionfeerefund/view/' . $DocumentID);
                break;
            default:
                break;
        }
    }

    private function setData()
    {
        $this->data['selectDocumentType'] = isset($_SESSION['selectDocumentType']) ? $_SESSION['selectDocumentType'] : "";
        $this->data['UserInfo'] = $this->UserModel;
        $this->data['DocumentType'] = $this->DocumentTypeModel->getDocumentType($this->UserModel->Type);
        $this->data['DocList'] = $this->DocModel->selectDocWithStateOrder(array('StudentID' => $this->UserModel->ID), 'document.CreatedDate', 'DESC');
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
