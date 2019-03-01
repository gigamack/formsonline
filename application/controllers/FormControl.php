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
        public function stdMain()
        {
            $this->chkSTDLogin();
            //$data['docList']=$this->DocModel->getDocByuserID("4935511076");
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $dataSelect=array('StudentID' => $studentid);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','DESC');
            // $data['docList']=$this->DocModel->selectDocWithState($dataSelect);
            //$data['docList']=$this->DocModel->selectDoc($dataSelect);
            $this->load->view('css');
            $this->load->view('header');
        //    $this->load->view('sidebar');
            $this->load->view('StudentMainPage',$data);
            $this->load->view('footer');
            // $this->load->view('script');         
        }

        public function stdcardform2()
        {   
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('StdReqDdlPart',$data);

            $this->load->view('StdReqTable',$data);
            $this->load->view('footer');
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

        // public function stdCardAllowed()
        // {
        //     $this->chkStaffLogin();
        //     $docID = $_GET['docID'];
        //     $stdID = $_GET['stdID'];
        //     $dataselect = array('document.DocID' => $docID);
        //     $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
        //     $data['docState'] = $this->DocStateModel->selectDocState($docID);
        //     $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
        //     $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
        //     $this->load->view('css');
        //     $this->load->view('headerAdmin');
        //    $this->load->view('stdCardCommented',$data);
        //     $this->load->view('footer');       
        // }
        // public function stdCardAllowedStdView()
        // {
        //     $this->chkSTDLogin();
        //     $docID = $_GET['docID'];
        //     $stdID = $_GET['stdID'];
        //     $dataselect = array('document.DocID' => $docID);
        //     $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
        //     $data['docState'] = $this->DocStateModel->selectDocState($docID);
        //     $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
        //     $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
        //     $this->load->view('css');
        //     $this->load->view('header');
        //    $this->load->view('stdCardCommentedView',$data);
        //     $this->load->view('footer');       
        // }
        public function AllowedStdView()
        {
            $this->chkSTDLogin();
            $doctypeID = $_GET['doctypeID'];
            $docID = $_GET['docID'];
            $stdID = $_GET['stdID'];
            $dataselect = array('document.DocID' => $docID);
            $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
            $data['docState'] = $this->DocStateModel->selectDocState($docID);
            $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
            $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
            $this->load->view('css');
            $this->load->view('header');
            if($doctypeID==1)
            {
                $this->load->view('stdCardCommentedView',$data);
            }
            elseif($doctypeID==2)
            {
                $this->load->view('ChangenameAllowedSTD',$data);
            }           
            elseif($doctypeID==2)
            {
                $this->load->view('#',$data);
            }
            $this->load->view('footer');       
        }
        public function Allowed()
        {
            $this->chkStaffLogin();
            $doctypeID = $_GET['doctypeID'];
            $docID = $_GET['docID'];
            $stdID = $_GET['stdID'];
            $dataselect = array('document.DocID' => $docID);
            $doctypeID = $_GET['doctypeID'];
            $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
            $data['docState'] = $this->DocStateModel->selectDocState($docID);
            $data['docCommented'] = $this->DocModel->selectDocWithState($dataselect);
            $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
            $this->load->view('css');
            $this->load->view('headerAdmin');
            if($doctypeID==1)
            {
                $this->load->view('stdCardCommented',$data);
            }
            elseif($doctypeID==2)
            {
                $this->load->view('ChangenameAllowed',$data);
            }           
            $this->load->view('footer');       
        }
        public function formindex()
        {
            $this->chkSTDLogin();
            //print_r($_SESSION['userSession']['UserType']);
            $this->load->view('css');
			$this->load->view('formmain');
        }

        public function formcaller()
        {   
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $dataSelect=array('StudentID' => $studentid);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','ASC');
            $data['docList2']=$this->DocModel->selectDocWithStateOrder($dataSelect,'OfficerCommentedDate','DESC');
            $chosenform = $_POST['formselect'];
            $this->load->view('css');
            $this->load->view('header');           
            $_SESSION["ddlchosen"] = $chosenform;
            $this->load->view('StdReqDdlPart',$data);            
            if($chosenform=='1')
            {
                $this->load->view('stdTempcardfrm');
                // $this->load->view('TempStdCardReq');
            }
            else if($chosenform=='2')
            {
                $this->load->view('NameChangingFrm');
            }
            else if($chosenform=='3')
            {
                $this->load->view('GraduateReqForm');
            }
            else if($chosenform=='4')
            {
                $this->load->view('DebtInvestigate');
            }
            $this->load->view('StdReqTable',$data);
            $this->load->view('footer');
        }

        public function formcallerStaff()
        {   
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $dataSelect=array('StudentID' => $studentid);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','ASC');
            $data['docList2']=$this->DocModel->selectDocWithStateOrder($dataSelect,'OfficerCommentedDate','DESC');
            $chosenform = $_POST['formselect'];
            $this->load->view('css');
            $this->load->view('header');           
            $_SESSION["ddlchosen"] = $chosenform;
            $this->load->view('StdReqDdlPart',$data);            
            if($chosenform=='1')
            {
                $this->load->view('stdTempcardfrm');
                // $this->load->view('TempStdCardReq');
            }
            else if($chosenform=='2')
            {
                $this->load->view('NameChangingFrm');
            }
            else if($chosenform=='3')
            {
                $this->load->view('GraduateReqForm');
            }
            else if($chosenform=='4')
            {
                $this->load->view('DebtInvestigate');
            }
            $this->load->view('StdReqTable',$data);
            $this->load->view('footer');
        }

        public function changenameform()
        {
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('ChangenameFrm');
            $this->load->view('footer');
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
            if($data['docInfo'][0]['DocTypeID']==1)
            {$this->load->view('ChkTempReq',$data);
            }
            else if($data['docInfo'][0]['DocTypeID']==2)
            {$this->load->view('ChangenameAllow',$data);               
            }          
        //    $this->load->view('sidebar');
            $this->load->view('footer');
            // $this->load->view('script');         
        }
        public function changeNameAllow()
        {
        
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
            $this->send_mail();        
            $back = base_url("/FormControl/stdMain");
            header('Location:' . $back);
        }

        public function send_mail() {
            $from_email = "gigamack@gmail.com";
            $to_email = $this->input->post('iesorn.c@phuket.psu.ac.th');
            //Load email library
            $this->load->library('email');
            $this->email->from($from_email, 'Iesorn Chaisane');
            $this->email->to($to_email);
            $this->email->subject('Send Email Codeigniter');
            $this->email->message('The email send using codeigniter library');
            $this->email->send();
            //Send mail
            // if($this->email->send())
            //     $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully.");
            // else
            //     $this->session->set_flashdata("email_sent","You have encountered an error");
            //$this->load->view('stdMain');
        }

        public function insertchangenameReq()
        {
            //$this->load->model('company_model');
            $filename='';
            $encodename = uniqid();
            if ($_FILES['stdFile1']['name']!='') {
                $filename = $encodename.'_'.$_FILES['stdFile1']['name'];
                $tempFile = $_FILES['stdFile1']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile1']['name'];
                move_uploaded_file($tempFile, $targetFile);
            }
            if ($_FILES['stdFile2']['name']!='') {
                $filename2 = $encodename.'_'.$_FILES['stdFile2']['name'];
                $tempFile = $_FILES['stdFile2']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile2']['name'];
                move_uploaded_file($tempFile, $targetFile);
            }
            if ($_FILES['stdFile3']['name']!='') {
                $filename3 = $encodename.'_'.$_FILES['stdFile3']['name'];
                $tempFile = $_FILES['stdFile3']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile3']['name'];
                move_uploaded_file($tempFile, $targetFile);
            }
            $data= array('StudentID' => $_POST['stdid']
            , 'tel' => $_POST['tel']
            , 'stdFile1' => $filename
            , 'stdFile2' => $filename2
            , 'stdFile3' => $filename3
            , 'reason' => $_POST['reason']
            , 'newthname' => $_POST['newthName']
            , 'newthsname' => $_POST['newthSname']
            , 'newengname' => $_POST['newengName']
            , 'newengsname' => $_POST['newengSname']
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

        public function insertGradReq()
        {
            $data= array('StudentID' => $_POST['stdid']
            , 'tel' => $_POST['tel']
            , 'termEnd' => $_POST['termEnd']
            , 'yearEnd' => $_POST['yearEnd']
            , 'soi' => $_POST['soi']
            , 'houseNumber' => $_POST['homenumber']
            , 'street' => $_POST['street']
            , 'sub_district' => $_POST['subdistrict']
            , 'district' => $_POST['district']
            , 'province' => $_POST['province']
            , 'zipcode' => $_POST['zipcode']
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

        public function insertMasterGradReq()
        {
            $data= array('StudentID' => $_POST['stdid']
            , 'tel' => $_POST['tel']
            , 'termEnd' => $_POST['termEnd']
            , 'yearEnd' => $_POST['yearEnd']
            , 'houseNumber' => $_POST['homenumber']
            , 'street' => $_POST['street']
            , 'sub_district' => $_POST['subdistrict']
            , 'district' => $_POST['district']
            , 'province' => $_POST['province']
            , 'zipcode' => $_POST['zipcode']
            , 'thesissubjCode' => $_POST['thesissubjCode']
            , 'thesisnameth' => $_POST['thesisnameth']
            , 'thesisnameeng' => $_POST['thesisnameeng']
            , 'engtest' => $_POST['engtest']);
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

        //added 05-2-2019
        public function editRequest()
        {                        
            $this->chkSTDLogin();
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $dataSelect=array('StudentID' => $studentid);
            $data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','ASC');
            $data['docList2']=$this->DocModel->selectDocWithStateOrder($dataSelect,'OfficerCommentedDate','DESC');
            $docID = $_GET['docID'];
            $data['docInfo']=$this->DocModel->getDocBydocID($docID);
            $back = base_url("/FormControl/stdCardMain");
            // print_r($data['docInfo']);
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('StdReqDdlPart',$data);
            
            if($data['docInfo'][0]['DocTypeID']==1)
            {
                $this->load->view('editTempStdCardReq',$data);
            }
            else if($data['docInfo'][0]['DocTypeID']==2)
            {
                $this->load->view('EditChangenameFrm',$data);               
            }
            else if($data['docInfo'][0]['DocTypeID']==3)
            {
                $this->load->view('EditGradReqForm',$data);
            }
            $this->load->view('StdReqTable',$data);
            $this->load->view('footer');
        }
        //ended

        public function editReq()
        {
            $this->chkSTDLogin();
            $docID = $_GET['docID'];
            $data['docInfo']=$this->DocModel->getDocBydocID($docID);
            $back = base_url("/FormControl/stdCardMain");
            // print_r($data['docInfo']);
            $this->load->view('css');
            $this->load->view('header');
            if($data['docInfo'][0]['DocTypeID']==1)
            {
                $this->load->view('editTempStdCardReq',$data);
            }
            else if($data['docInfo'][0]['DocTypeID']==2)
            {
                $this->load->view('EditChangenameFrm',$data);               
            }
            else if($data['docInfo'][0]['DocTypeID']==3)
            {
                $this->load->view('EditGradReqForm',$data);
            }
            $this->load->view('footer');
        }

        public function delReq()
        {
            $data= array('DocID' => $_GET['docID']);
            $docinfo['docInfo']=$this->DocModel->getDocBydocID($_GET['docID']);
            if($docinfo['docInfo'][0]['PoliceNoticePath']!='')
            {
                $targetPath = getcwd() . '/uploads/';
                unlink($targetPath . $docinfo['docInfo'][0]['PoliceNoticePath']);
            }
            if($docinfo['docInfo'][0]['stdFile1']!='')
            {
                $targetPath = getcwd() . '/uploads/';
                unlink($targetPath . $docinfo['docInfo'][0]['stdFile1']);
            }
            if($docinfo['docInfo'][0]['stdFile2']!='')
            {
                $targetPath = getcwd() . '/uploads/';
                unlink($targetPath . $docinfo['docInfo'][0]['stdFile2']);
            }
            if($docinfo['docInfo'][0]['stdFile3']!='')
            {
                $targetPath = getcwd() . '/uploads/';
                unlink($targetPath . $docinfo['docInfo'][0]['stdFile3']);
            }
            $this->DocModel->deleteDoc($data);
            $back = base_url("/FormControl/stdMain");
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
        public function updateChangeNameReq()
        {
            
                $filename='';
                $filename2='';
                $filename3='';
                $encodename = uniqid();
            if ($_FILES['stdFile1']['name']!='') {
                $filename = $encodename.'_'.$_FILES['stdFile1']['name'];
                $tempFile = $_FILES['stdFile1']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile1']['name'];
                move_uploaded_file($tempFile, $targetFile);
                unlink($targetPath . $_POST['currentimageValue1']);
            }
            if ($_FILES['stdFile2']['name']!='') {
                $filename2 = $encodename.'_'.$_FILES['stdFile2']['name'];
                $tempFile = $_FILES['stdFile2']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile2']['name'];
                move_uploaded_file($tempFile, $targetFile);
                unlink($targetPath . $_POST['currentimageValue2']);
            }
            if ($_FILES['stdFile3']['name']!='') {
                $filename3 = $encodename.'_'.$_FILES['stdFile3']['name'];
                $tempFile = $_FILES['stdFile3']['tmp_name'];
                $targetPath = getcwd() . '/uploads/';
                $targetFile = $targetPath . $encodename .'_'. $_FILES['stdFile3']['name'];
                move_uploaded_file($tempFile, $targetFile);
                unlink($targetPath . $_POST['currentimageValue3']);
            }
                    $data= array('DocID' => $_POST['docID']
                    , 'StudentID' => $_POST['stdid']
                    , 'tel' => $_POST['tel']                    
                    , 'newthname' => $_POST['newthName']
                    , 'newthsname' => $_POST['newthSname']
                    , 'newengname' => $_POST['newengName']
                    , 'newengsname' => $_POST['newengSname']
                    , 'reason' => $_POST['reason']
                    , 'DocTypeID' => $_POST['DocTypeID']);
                    $this->DocModel->updateDoc($data,$_POST['docID']);
                    if($filename!='')
                    {
                        $data= array('DocID' => $_POST['docID']                       
                        , 'stdFile1' => $filename);
                        $this->DocModel->updateDoc($data,$_POST['docID']);
                    }
                    if($filename2!='')
                    {
                        $data= array('DocID' => $_POST['docID']                       
                        , 'stdFile2' => $filename2);
                        $this->DocModel->updateDoc($data,$_POST['docID']);
                    }
                    if($filename3!='')
                    {
                        $data= array('DocID' => $_POST['docID']                       
                        , 'stdFile3' => $filename3);
                        $this->DocModel->updateDoc($data,$_POST['docID']);
                    }
            $back = base_url("/FormControl/stdCardMain");
            header('Location:' . $back);         
        }
        public function updateGradReq()
        {            
                    $data=array('DocID' => $_POST['docID']
                                , 'StudentID' => $_POST['stdid']
                                , 'tel' => $_POST['tel']
                                , 'soi' => $_POST['soi']
                                , 'termEnd' => $_POST['termEnd']
                                , 'yearEnd' => $_POST['yearEnd']
                                , 'houseNumber' => $_POST['homenumber']
                                , 'street' => $_POST['street']
                                , 'sub_district' => $_POST['subdistrict']
                                , 'district' => $_POST['district']
                                , 'province' => $_POST['province']
                                , 'zipcode' => $_POST['zipcode']
                                , 'DocTypeID' => $_POST['DocTypeID']);
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
        public function graduateform()
        {
            $this->chkSTDLogin();
            $data['stdinfo'] = $this->Student_model->getStudentInfo('5730212051');
            $this->load->view('css');
            $this->load->view('header');

            $this->load->view('GraduateReqForm',$data);
            $this->load->view('footer');
        }

        public function Mastergraduateform()
        {
            $this->chkSTDLogin();
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('MasterGraduateReqForm');
            $this->load->view('footer');
        }

        public function DebtInvestigateform()
        {
            $this->chkSTDLogin();
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('DebtInvestigate');
            $this->load->view('footer');
        }
        public function DebtInvestigatefReg()
        {
            $this->chkSTDLogin();
            $this->load->view('css');
            $this->load->view('header');
            $this->load->view('DebtInvestigateReg');
            $this->load->view('footer');
        }
        

        public function editstatGradmaster()
        {   
            $this->chkSTDLogin();   
            $this->load->view('css');         
            $this->load->view('header');
            $this->load->view('updateStatMasterGrad');
            $this->load->view('footer');

        }

        public function editstatGrad()
        {   
            $this->chkSTDLogin();   
            $this->load->view('css');         
            $this->load->view('header');
            $this->load->view('updateStatGrad');
            $this->load->view('footer');

        }


    }
?>