<?php 
    class formControl extends CI_Controller 
    {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('docModel');
        $this->load->model('docStateModel');
        $this->load->helper(array('form', 'url'));
    }
        public function index()
        {
            $this->load->view('login');

            // $this->load->view('welcome_message');
            // $dataSelect=array('StudentID' => "4935511076");
            // $data=$this->docModel->selectDocWithState($dataSelect);
            // print_r($data);
            // foreach($data as $docid){
            // echo $docid['DocID'];
            // echo "<br/>";
            // }
            //selectLastestState
        }
    
        public function stdCardMain()
        {
            //$data['docList']=$this->docModel->getDocByuserID("4935511076");
            $dataSelect=array('StudentID' => "4935511076");
            $data['docList']=$this->docModel->selectDocWithState($dataSelect);
            //$data['docList']=$this->docModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('header');
        //    $this->load->view('sidebar');
            $this->load->view('stdTempCardMain',$data);
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardAllowed()
        {
            $docID = $_GET['docID'];
            $dataselect = array('document.DocID' => $docID);
            $data['docInfo'] = $this->docModel->getDocBydocID($docID);
            $data['docState'] = $this->docStateModel->selectDocState($docID);
            $data['docCommented'] = $this->docModel->selectDocWithState($dataselect);
            $this->load->view('css');
            $this->load->view('headerAdmin');
           $this->load->view('stdCardCommented',$data);
            $this->load->view('footer');       
        }

        public function stdCardForm()
        {
            $this->load->view('css');
            $this->load->view('header');
            //$this->load->view('sidebar');
            $this->load->view('TempStdCardReq');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardForm_test()
        {
            $this->load->view('css');
           $this->load->view('header');
            //$this->load->view('sidebar');
            $this->load->view('TempStdCardReq_test');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardFormAdmin()
        {
            $dataSelect=array();
            $data['docList']=$this->docModel->selectDocWithState($dataSelect);
            // $data['docList']=$this->docModel->selectDoc($dataSelect);
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
            $this->load->view('headerAdmin');
            $this->load->view('css');
           $this->load->view('ChkTempReq',$data);
        //    $this->load->view('sidebar');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function addnews($facid, $nameFac)
        {
            $filename;
            $date = date('Y-m-d H:i:s');
            if (!empty($_FILES)) {
                $filename = $_FILES['file']['name'];
                $tempFile = $_FILES['file']['tmp_name'];
                $targetPath = getcwd() . '/uploaded_file/';
                $targetFile = $targetPath . $_FILES['file']['name'];
    
                move_uploaded_file($tempFile, $targetFile);
            }
            $this->News_model->addnews($_POST, $filename, $date, $facid, $_SESSION['UserID']);
            $this->session->set_flashdata('compelte', 'ระบบได้ทำการอัปโหลดไฟล์ของท่านเสร็จเรียบร้อยแล้ว');
            redirect(base_url("Project-COOP/Fun_sidebar_admin/show_news?namefac_sub=" . $nameFac));
        }

        public function insertReq()
        {
            //$this->load->model('company_model');
            $filename;
            $encodename = uniqid();
            if (!empty($_FILES)) {
                $filename = $encodename.'_'.$_FILES['stdPicFile']['name'];
                $tempFile = $_FILES['stdPicFile']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdPicFile']['name'];
                move_uploaded_file($tempFile, $targetFile);
            }
            $data= array('StudentID' => $_POST['stdid']
            , 'ReasonID' => $_POST['reason']
            , 'ReasonOther' => $_POST['other']
            , 'PoliceNoticePath' => $filename
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
            
                $filename;
                $encodename = uniqid();
                if (empty($_FILES['stdPicFile']))
                {
                    $data= array('DocID' => $_POST['docID']
                    , 'StudentID' => $_POST['stdid']
                    , 'ReasonID' => $_POST['reason']
                    , 'ReasonOther' => $_POST['other']
                    , 'DocTypeID' => $_POST['DocTypeID']);                    
                }
                else
                {
                    $filename = $encodename.'_'.$_FILES['stdPicFile']['name'];
                    $tempFile = $_FILES['stdPicFile']['tmp_name'];
                    $targetPath = getcwd() . '/uploads/';
                    $targetFile = $targetPath . $encodename .'_'. $_FILES['stdPicFile']['name'];
                    move_uploaded_file($tempFile, $targetFile);
                    unlink($targetPath . $_POST['currentimageValue']);

                    $data= array('DocID' => $_POST['docID']
                    , 'StudentID' => $_POST['stdid']
                    , 'ReasonID' => $_POST['reason']
                    , 'ReasonOther' => $_POST['other']
                    , 'PoliceNoticePath' => $filename
                    , 'DocTypeID' => $_POST['DocTypeID']);                    
                }
            
            // $data= array('DocID' => $_POST['docID']
            // , 'StudentID' => $_POST['stdid']
            // , 'ReasonID' => $_POST['reason']
            // , 'ReasonOther' => $_POST['other']
            // , 'PoliceNoticePath' => $_POST['stdPicFile']
            // , 'DocTypeID' => $_POST['DocTypeID']);
            $this->docModel->updateDoc($data,$_POST['docID']);
            $back = base_url("/formControl/stdCardMain");
            header('Location:' . $back);         
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