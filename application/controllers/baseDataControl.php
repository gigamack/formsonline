<?php 
    class BaseDataControl extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DocTypeModel');
    }

    function docTypeMain()
    {
        $dataSelect=array();
        $data['docList']=$this->DocTypeModel->selectDocType($dataSelect);
        $this->load->view('css');
        $this->load->view('headerdoctype');
    //    $this->load->view('sidebar');
        $this->load->view('docTypeMain',$data);
        $this->load->view('footer');
    }
    public function editDocType()
    {   
        $docID = array('DoctypeID' => $_GET['doctypeID']);
        $data['doctypeInfo']=$this->DocTypeModel->selectDocType($docID);
        $back = base_url("/BaseDataControl/docTypeMain");
        $this->load->view('css');
        $this->load->view('headerdoctype');
        $this->load->view('docTypeAlter',$data);
        $this->load->view('footer');
    }

    public function delDocType()
    {
        $data= array('DoctypeID' => $_GET['doctypeID']);
        $this->DocTypeModel->deleteDocType($data);
        $back = base_url("/BaseDataControl/docTypeMain");
        header('Location:' . $back);
    }

    public function AddDocTypeForm()
    {
        $this->load->view('css');
           $this->load->view('headerdoctype');        
            $this->load->view('docTypeAdd');
            $this->load->view('footer');
    }

   public function insertDocType()
    {
            //$this->load->model('company_model');
            $data= array('DoctypeName' => $_POST['docTypeName']);
            $this->DocTypeModel->InsertDocType($data);
            $back = base_url("/BaseDataControl/docTypeMain");
            header('Location:' . $back);
    }
    
    public function updateDoctype()
    {
        $data= array('DoctypeName' => $_POST['docTypeName']);
        $this->DocTypeModel->updateDocType($data,$_POST['docTypeID']);
        $back = base_url("/BaseDataControl/docTypeMain");
        header('Location:' . $back);      
    }
    }
?>