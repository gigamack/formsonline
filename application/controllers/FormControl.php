<?php 
    class FormControl extends CI_Controller 
    {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->helper(array('form', 'url'));
    }
        public function index()
        {
            $this->load->view('login');

            // $this->load->view('welcome_message');
            // $dataSelect=array('StudentID' => "4935511076");
            // $data=$this->DocModel->selectDocWithState($dataSelect);
            // print_r($data);
            // foreach($data as $docid){
            // echo $docid['DocID'];
            // echo "<br/>";
            // }
            //selectLastestState
        }
        public function chkSTDLogin()
        {
            if (isset($_SESSION['userSession']))
            {
                if($_SESSION['userSession']['UserType'] <> 'Students')
                {
                    redirect(base_url());
                }
            }
            else
            {
                redirect(base_url());
            }
        }
        public function chkStaffLogin()
        {
            if (isset($_SESSION['userSession']))
            {
                if($_SESSION['userSession']['UserType'] <> 'Staffs')
                {
                    redirect(base_url());
                }
            }
            else
            {
                redirect(base_url());
            }
        }
        public function stdCardMain()
        {
            $this->chkSTDLogin();
            //$data['docList']=$this->DocModel->getDocByuserID("4935511076");
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $dataSelect=array('StudentID' => $studentid);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','ASC');
            $data['docList2']=$this->DocModel->selectDocWithStateOrder($dataSelect,'OfficerCommentedDate','DESC');
            // $data['docList']=$this->DocModel->selectDocWithState($dataSelect);
            //$data['docList']=$this->DocModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('header');
        //    $this->load->view('sidebar');
            $this->load->view('stdTempCardMain',$data);
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdCardAllowed()
        {
            $this->chkStaffLogin();
            $docID = $_GET['docID'];
            $stdID = $_GET['stdID'];
            $dataselect = array('document.DocID' => $docID);
            $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
            $data['docState'] = $this->DocStateModel->selectDocState($docID);
            $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
            $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
            $this->load->view('css');
            $this->load->view('headerAdmin');
           $this->load->view('stdCardCommented',$data);
            $this->load->view('footer');       
        }
        public function stdCardAllowedStdView()
        {
            $this->chkSTDLogin();
            $docID = $_GET['docID'];
            $stdID = $_GET['stdID'];
            $dataselect = array('document.DocID' => $docID);
            $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
            $data['docState'] = $this->DocStateModel->selectDocState($docID);
            $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
            $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
            $this->load->view('css');
            $this->load->view('header');
           $this->load->view('stdCardCommentedView',$data);
            $this->load->view('footer');       
        }
        public function formindex()
        {
            $this->chkSTDLogin();
            //print_r($_SESSION['userSession']['UserType']);
            $this->load->view('css');
			$this->load->view('formmain');
        }

        public function formindexAdmin()
        {
            $this->chkStaffLogin();
            $this->load->view('css');
            $this->load->view('headerAdmin');
			$this->load->view('formmainAdmin');
        }

        public function stdCardForm()
        {
            $this->chkSTDLogin();
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
            $this->chkStaffLogin();
            $dataSelect=array();
            // $data['docList']=$this->DocModel->selectDocWithState($dataSelect);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','ASC');
            $data['docList2']=$this->DocModel->selectDocWithStateOrder($dataSelect,'OfficerCommentedDate','DESC');
            // $data['docList']=$this->DocModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('headerAdmin');
            $this->load->view('TempStdCardRev',$data);
            $this->load->view('footer');         
        }
        public function stdCardFormAdminTEST()
        {
            $this->chkStaffLogin();
            $dataSelect=array();
            $data['docList']=$this->DocModel->selectDocWithStateTest($dataSelect);
            // $data['docList']=$this->DocModel->selectDoc($dataSelect);
            // $this->load->view('css');
            // $this->load->view('headerAdmin');
            // $this->load->view('TempStdCardRev',$data);
            // $this->load->view('footer');         
            $sorter = $data['docList'];
            //array_multisort($sorter);
            var_dump($sorter);
        }        

        public function stdCardAllow()
        {
            $this->chkStaffLogin();
            $docID = $_GET['docID'];
            $stdID = $_GET['stdID'];
            $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
            $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
            $data['docState'] = $this->DocStateModel->selectDocState($docID);
            $this->load->view('headerAdmin');
            $this->load->view('css');
           $this->load->view('ChkTempReq',$data);
        //    $this->load->view('sidebar');
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function insertReq()
        {
            //$this->load->model('company_model');
            $filename='';
            $encodename = uniqid();
            if ($_FILES['stdPicFile']['name']!='') {
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
            $this->DocModel->InsertDoc($data);
            $dataMaxDocID = array('StudentID' => $_POST['stdid']);
            $maxDocIDS=$this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
            $maxDocID=$maxDocIDS[0];
            $data2 = array('DocID' => $maxDocID->DocID
            , 'stateID' => $_POST['stateID']);
            $this->DocStateModel->InsertDocState($data2);
            $back = base_url("/FormControl/stdCardMain");
            header('Location:' . $back);
        }

        public function editReq()
        {
            $this->chkSTDLogin();
            $docID = $_GET['docID'];
            $data['docInfo']=$this->DocModel->getDocBydocID($docID);
            $back = base_url("/FormControl/stdCardMain");
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('editTempStdCardReq',$data);
            $this->load->view('footer');
        }

        public function delReq()
        {
            $data= array('DocID' => $_GET['docID']);
            $this->DocModel->deleteDoc($data);
            $back = base_url("/FormControl/stdCardMain");
            header('Location:' . $back);
        }

        public function updateReq()
        {
            
                $filename;
                $encodename = uniqid();
                $otherreason = ($_POST['reason']=='5')?$_POST['other']:"";
                if ($_FILES['stdPicFile']['name']=='')
                {
                    $data= array('DocID' => $_POST['docID']
                    , 'StudentID' => $_POST['stdid']
                    , 'ReasonID' => $_POST['reason']
                    , 'ReasonOther' => $otherreason
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
                    , 'ReasonOther' => $otherreason
                    , 'PoliceNoticePath' => $filename
                    , 'DocTypeID' => $_POST['DocTypeID']);                    
                }
            
            // $data= array('DocID' => $_POST['docID']
            // , 'StudentID' => $_POST['stdid']
            // , 'ReasonID' => $_POST['reason']
            // , 'ReasonOther' => $_POST['other']
            // , 'PoliceNoticePath' => $_POST['stdPicFile']
            // , 'DocTypeID' => $_POST['DocTypeID']);
            $this->DocModel->updateDoc($data,$_POST['docID']);
            $back = base_url("/FormControl/stdCardMain");
            header('Location:' . $back);         
        }
        public function insertDocNextState()
        {
            $data= array('DocID' => $_POST['docID']
            , 'OfficerCommentID' => $_POST['commentid']
            , 'OfficerCommentText' => $_POST['commentText']
            , 'OfficerID' => $_POST['userID']
            , 'stateID' => $_POST['stateID']);
            $this->DocStateModel->InsertDocState($data);
            //$this->DocModel->updateDocState($data,$_POST['docID']);
            $back = base_url("/FormControl/stdCardFormAdmin");
            header('Location:' . $back);         
        }        
    }
?>