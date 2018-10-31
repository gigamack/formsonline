<?php 
    class formControl extends CI_Controller {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('docModel');
        $this->load->model('docStateModel');
    }
        public function index()
        {
            $this->load->view('welcome_message');
        }
    
        public function stdCardMain()
        {
            //$data['docList']=$this->docModel->getDocByuserID("4935511076");
            $dataSelect=array('StudentID' => "4935511076");
            $data['docList']=$this->docModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('header');
        //    $this->load->view('sidebar');
            $this->load->view('stdTempCardMain',$data);
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardForm()
        {
            $this->load->view('css');
           $this->load->view('header');
        //    $this->load->view('sidebar');
            $this->load->view('TempStdCardReq');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardFormAdmin()
        {
            $dataSelect=array();
            $data['docList']=$this->docModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('headerAdmin');
            $this->load->view('TempStdCardRev',$data);
            $this->load->view('footer');         
        }

        public function stdCardAllow()
        {
            $docID = $_GET['docID'];
            $data['docInfo'] = $this->docModel->getDocBydocID($docID);
            $data['docState'] = $this->docStateModel->selectDocState($docID);
            $this->load->view('css');
           $this->load->view('ChkTempReq',$data);
        //    $this->load->view('sidebar');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function insertReq()
        {
            //$this->load->model('company_model');
            $data= array('StudentID' => $_POST['stdid']
            , 'ReasonOther' => $_POST['other']
            , 'PoliceNoticePath' => $_POST['stdPicFile']
            , 'DocTypeID' => $_POST['DocTypeID']);
            $this->docModel->InsertDoc($data);
            $dataMaxDocID = array('StudentID' => $_POST['stdid']);
            $maxDocIDS=$this->docModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
            $maxDocID=$maxDocIDS[0];
            $data2 = array('DocID' => $maxDocID->DocID
            , 'stateID' => $_POST['stateID']);
            $this->docStateModel->InsertDocState($data2);
            $back = base_url("/formControl/stdCardMain");
            header('Location:' . $back);
        }

        public function editReq()
        {
            $docID = $_GET['docID'];
            $data['docInfo']=$this->docModel->getDocBydocID($docID);
            $back = base_url("/formControl/stdCardMain");
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('editTempStdCardReq',$data);
            $this->load->view('footer');
        }

        public function delReq()
        {
            $data= array('DocID' => $_GET['docID']);
            $this->docModel->deleteDoc($data);
        }

        public function updateReq()
        {
            $data= array('DocID' => $_POST['docID']
            , 'StudentID' => $_POST['stdid']
            , 'ReasonID' => $_POST['reason']
            , 'ReasonOther' => $_POST['other']
            , 'PoliceNoticePath' => $_POST['stdPicFile']
            , 'DocTypeID' => $_POST['DocTypeID']);
            $this->docModel->updateDoc($data,$_POST['docID']);
            //$back = base_url("/formControl/stdCardMain");
            //header('Location:' . $back);         
        }
        public function insertDocNextState()
        {
            $data= array('DocID' => $_POST['docID']
            , 'OfficerCommentID' => $_POST['commentid']
            , 'OfficerCommentText' => $_POST['commentText']
            , 'OfficerID' => $_POST['userID']
            , 'stateID' => $_POST['stateID']);
            $this->docStateModel->InsertDocState($data);
            //$this->docModel->updateDocState($data,$_POST['docID']);
            //$back = base_url("/formControl/stdCardMain");
            //header('Location:' . $back);         
        }        
    }
?>