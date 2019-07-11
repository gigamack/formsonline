<?php
class FormControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CertModel');
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        //$this->load->model('PSUPassportModel');
        $this->load->model('DocTypeModel');
        $this->load->model('DocumentModel');
        $this->load->model('DocumentStateModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
        $this->load->model('UserModel');

        //$PSUPassport = $this->session->flashdata('PSUPassport');
        //$this->PSUPassportModel->setPSUPassport($PSUPassport);
    }
    public function index()
    {
        $this->load->view('login');
    }
    public function chkSTDLogin()
    {
        if (isset($_SESSION['userSession'])) {
            if ($_SESSION['userSession']['UserType'] <> 'Students') {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }
    public function chkStaffLogin()
    {
        if (isset($_SESSION['userSession'])) {
            if ($_SESSION['userSession']['UserType'] <> 'Staffs') {
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function stdCardMain()
    {
        $this->chkSTDLogin();
        $studentid = isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
        $dataSelect = array('StudentID' => $studentid);
        $data['docList'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'document.CreatedDate', 'ASC');
        $data['docList2'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'OfficerCommentedDate', 'DESC');
        $this->load->view('css');
        $this->load->view('header');
        $this->load->view('stdTempCardMain', $data);
        $this->load->view('footer');
    }

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
        if ($doctypeID == 1) {
            $this->load->view('stdCardCommentedView', $data);
        } elseif ($doctypeID == 2) {
            $this->load->view('ChangenameAllowedSTD', $data);
        } elseif ($doctypeID == 3) {
            $this->load->view('GradAllowedSTD', $data);
        } elseif ($doctypeID == 4) {
            $this->load->view('MasterGradAllowedSTD', $data);
        } elseif ($doctypeID == 5) {
            $this->load->view('DebtAllowedSTD', $data);
        } elseif ($doctypeID == 6) {
            $data['certDetail'] = $this->CertModel->getCertDetailBydocID($docID);
            $this->load->view('AllowedCertifyFormSTDview', $data);
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
        if ($doctypeID == 1) {
            $this->load->view('stdCardCommented', $data);
        } elseif ($doctypeID == 2) {
            $this->load->view('ChangenameAllowed', $data);
        } elseif ($doctypeID == 3) {
            $this->load->view('GradAllowed', $data);
        } elseif ($doctypeID == 4) {
            $this->load->view('MasterGradAllowed', $data);
        } elseif ($doctypeID == 5) {
            $this->load->view('DebtAllowed', $data);
        } elseif ($doctypeID == 6) {
            $data['certDetail'] = $this->CertModel->getCertDetailBydocID($docID);
            $this->load->view('AllowedCertifyform', $data);
        }
        $this->load->view('footer');
    }
    public function formindex()
    {
        $this->chkSTDLogin();
        $this->load->view('css');
        $this->load->view('formmain');
    }

    public function formcaller()
    {
        $studentid = isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
        $dataSelect = array('StudentID' => $studentid);
        $data['docList'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'document.CreatedDate', 'DESC');
        $data['docList2'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'OfficerCommentedDate', 'DESC');
        $data['doctypeList'] = $this->DocTypeModel->getDocType();
        $chosenform = $_POST['formselect'];
        $this->load->view('css');
        $this->load->view('header');
        $_SESSION["ddlchosen"] = $chosenform;
        $this->load->view('StdReqDdlPart', $data);

        switch ($chosenform) {
            case '1':
                $this->load->view('stdTempcardfrm');
                break;
            case '2':
                $this->load->view('NameChangingFrm');
                break;
            case '3':
                $this->load->view('GraduateReqForm');
                break;
            case '4':
                $this->load->view('MasterGraduateReqForm');
                break;
            case '5':
                $this->load->view('DebtInvestigate');
                break;
            case '6':
                $this->load->view('CertificateForm');
                break;
            case '7':
                $this->session->set_flashdata('data', $data);
                return redirect(base_url() . 'RequestMoreLessCreditsControl/New');
                break;
            case '8':
                $this->load->view('student/RequestCourseTransfer');
                break;
            default:
                break;
        }
        $this->load->view('StdReqTable', $data);
        $this->load->view('footer');
    }

    public function formcallerStaff()
    {
        $studentid = isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
        $dataSelect = array('StudentID' => $studentid);
        $data['docList'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'document.CreatedDate', 'ASC');
        $data['docList2'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'OfficerCommentedDate', 'DESC');
        $chosenform = $_POST['formselect'];
        $this->load->view('css');
        $this->load->view('header');
        $_SESSION["ddlchosen"] = $chosenform;
        $this->load->view('StdReqDdlPart', $data);
        if ($chosenform == '1') {
            $this->load->view('stdTempcardfrm');
        } else if ($chosenform == '2') {
            $this->load->view('NameChangingFrm');
        } else if ($chosenform == '3') {
            $this->load->view('GraduateReqForm');
        } else if ($chosenform == '4') {
            $this->load->view('DebtInvestigateStaff');
        }
        $this->load->view('StdReqTable', $data);
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
        $this->load->view('TempStdCardReq_test');
        $this->load->view('footer');
    }

    public function stdCardFormAdmin()
    {
        $data['UserInfo'] = $this->UserModel;
        $dataSelect = array();
        $data['docList'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'document.CreatedDate', 'ASC');
        //$data['docList2'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'OfficerCommentedDate', 'DESC');
        $this->load->view('dashboard/header', $data);
        $this->load->view('TempStdCardRev', $data);
        $this->load->view('footer');
    }
    public function stdCardFormAdminTEST()
    {
        $this->chkStaffLogin();
        $dataSelect = array();
        $data['docList'] = $this->DocModel->selectDocWithStateTest($dataSelect);
        $sorter = $data['docList'];
        var_dump($sorter);
    }

    public function stdCardAllow()
    {
        $docID = $_GET['docID'];
        $stdID = $_GET['stdID'];
        $data['UserInfo'] = $this->UserModel;
        $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
        $data['stdinfo'] = $this->Student_model->getStudentInfo($stdID);
        $data['docState'] = $this->DocStateModel->selectDocState($docID);
        $this->load->view('dashboard/header', $data);
        if ($data['docInfo'][0]['DocTypeID'] == 1) {
            $this->load->view('ChkTempReq', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 2) {
            $this->load->view('ChangenameAllow', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 3) {
            $this->load->view('updateStatGrad', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 4) {
            $this->load->view('updateStatMasterGrad', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 5) {
            $this->load->view('DebtInvestigateStaff', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 6) {
            $data['certDetail'] = $this->CertModel->getCertDetailBydocID($docID);
            $this->load->view('AllowCertifyform', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 8) {
            $this->load->model('DocumentModel');
            $this->load->model('TransferSubjectRequestModel');
            $this->load->model('TransferSubjectModel');
            $data['Document'] = $this->DocumentModel->Get($docID);
            $data['TransferSubject'] = $this->TransferSubjectModel->Get($docID);
            $data['TransferSubjectRequest'] = $this->TransferSubjectRequestModel->Get($docID);
            $this->load->view('student/admin/RequestCourseTransfer', $data);
        }
        $this->load->view('footer');
    }
    public function changeNameAllow()
    { }

    public function insertReq()
    {
        $filename = '';
        $encodename = uniqid();
        if ($_FILES['stdPicFile']['name'] != '') {
            $filename = $encodename . '_' . $_FILES['stdPicFile']['name'];
            $tempFile = $_FILES['stdPicFile']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdPicFile']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        $data = array(
            'StudentID' => $_POST['stdid'], 'ReasonID' => $_POST['reason'], 'ReasonOther' => $_POST['other'], 'PoliceNoticePath' => $filename, 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        $this->send_mail();
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function send_mail()
    {
        $from_email = "gigamack@gmail.com";
        $to_email = $this->input->post('iesorn.c@phuket.psu.ac.th');
        $this->load->library('email');
        $this->email->from($from_email, 'Iesorn Chaisane');
        $this->email->to($to_email);
        $this->email->subject('Send Email Codeigniter');
        $this->email->message('The email send using codeigniter library');
        $this->email->send();
    }

    public function insertcert()
    {
        //start with insert amount of cert into certRecord table then insert to document table 

        //eng u form
        isset($_POST["en_amount_u1"]) ? $en_u1 = $_POST["en_amount_u1"] : $en_u1 = 0;
        isset($_POST["en_amount_u2"]) ? $en_u2 = $_POST["en_amount_u2"] : $en_u2 = 0;
        isset($_POST["en_amount_u3"]) ? $en_u3 = $_POST["en_amount_u3"] : $en_u3 = 0;
        isset($_POST["en_amount_u4"]) ? $en_u4 = $_POST["en_amount_u4"] : $en_u4 = 0;
        isset($_POST["en_amount_u5"]) ? $en_u5 = $_POST["en_amount_u5"] : $en_u5 = 0;
        isset($_POST["en_amount_u6"]) ? $en_u6 = $_POST["en_amount_u6"] : $en_u6 = 0;
        //TH u form
        isset($_POST["th_amount_u1"]) ? $th_u1 = $_POST["th_amount_u1"] : $th_u1 = 0;
        isset($_POST["th_amount_u2"]) ? $th_u2 = $_POST["th_amount_u2"] : $th_u2 = 0;
        isset($_POST["th_amount_u3"]) ? $th_u3 = $_POST["th_amount_u3"] : $th_u3 = 0;
        isset($_POST["th_amount_u4"]) ? $th_u4 = $_POST["th_amount_u4"] : $th_u4 = 0;
        isset($_POST["th_amount_u5"]) ? $th_u5 = $_POST["th_amount_u5"] : $th_u5 = 0;
        isset($_POST["th_amount_u6"]) ? $th_u6 = $_POST["th_amount_u6"] : $th_u6 = 0;
        //en g form
        isset($_POST["en_amount_g1"]) ? $en_g1 = $_POST["en_amount_g1"] : $en_g1 = 0;
        isset($_POST["en_amount_g2"]) ? $en_g2 = $_POST["en_amount_g2"] : $en_g2 = 0;
        //th g form
        isset($_POST["th_amount_g1"]) ? $th_g1 = $_POST["th_amount_g1"] : $th_g1 = 0;
        isset($_POST["th_amount_g2"]) ? $th_g2 = $_POST["th_amount_g2"] : $th_g2 = 0;
        //en o form
        isset($_POST["en_amount_o1"]) ? $en_o1 = $_POST["en_amount_o1"] : $en_o1 = 0;
        isset($_POST["en_amount_o2"]) ? $en_o2 = $_POST["en_amount_o2"] : $en_o2 = 0;
        isset($_POST["en_amount_o3"]) ? $en_o3 = $_POST["en_amount_o3"] : $en_o3 = 0;
        isset($_POST["en_amount_o4"]) ? $en_o4 = $_POST["en_amount_o4"] : $en_o4 = 0;
        isset($_POST["en_amount_o5"]) ? $en_o5 = $_POST["en_amount_o5"] : $en_o5 = 0;
        //th o form 
        isset($_POST["th_amount_o1"]) ? $th_o1 = $_POST["th_amount_o1"] : $th_o1 = 0;
        isset($_POST["th_amount_o2"]) ? $th_o2 = $_POST["th_amount_o2"] : $th_o2 = 0;
        isset($_POST["th_amount_o3"]) ? $th_o3 = $_POST["th_amount_o3"] : $th_o3 = 0;
        isset($_POST["th_amount_o4"]) ? $th_o4 = $_POST["th_amount_o4"] : $th_o4 = 0;
        isset($_POST["th_amount_o5"]) ? $th_o5 = $_POST["th_amount_o5"] : $th_o5 = 0;

        //Insert to certrecord
        $data = array(
            'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'addressCert' => $_POST['postaladdress'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);

        //this part is unfinished
        $data['maxdoc'] = $this->DocModel->getMaxDocIDByuserID($_POST['stdid']);
        $DocID = $data['maxdoc'][0]['maxDocID'];

        $dataCert = array(
            'docID' => $DocID, 'certID' => $_POST['tel'], 'engAmount' => $_POST['postaladdress'], 'thAmount' => $_POST['DocTypeID']
        );
    }

    public function insertchangenameReq()
    {
        $filename = '';
        $encodename = uniqid();
        if ($_FILES['stdFile1']['name'] != '') {
            $filename = $encodename . '_' . $_FILES['stdFile1']['name'];
            $tempFile = $_FILES['stdFile1']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile1']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        if ($_FILES['stdFile2']['name'] != '') {
            $filename2 = $encodename . '_' . $_FILES['stdFile2']['name'];
            $tempFile = $_FILES['stdFile2']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile2']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        if ($_FILES['stdFile3']['name'] != '') {
            $filename3 = $encodename . '_' . $_FILES['stdFile3']['name'];
            $tempFile = $_FILES['stdFile3']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile3']['name'];
            move_uploaded_file($tempFile, $targetFile);
        }
        $data = array(
            'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'stdFile1' => $filename, 'stdFile2' => $filename2, 'stdFile3' => $filename3, 'reason' => $_POST['reason'], 'newthname' => $_POST['newthName'], 'newthsname' => $_POST['newthSname'], 'newengname' => $_POST['newengName'], 'newengsname' => $_POST['newengSname'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function insertGradReq()
    {
        $data = array(
            'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'termEnd' => $_POST['termEnd'], 'yearEnd' => $_POST['yearEnd'], 'soi' => $_POST['soi'], 'houseNumber' => $_POST['homenumber'], 'street' => $_POST['street'], 'sub_district' => $_POST['subdistrict'], 'district' => $_POST['district'], 'province' => $_POST['province'], 'zipcode' => $_POST['zipcode'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function insertMasterGradReq()
    {
        $data = array(
            'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'termEnd' => $_POST['termEnd'], 'yearEnd' => $_POST['yearEnd'], 'houseNumber' => $_POST['homenumber'], 'street' => $_POST['street'], 'sub_district' => $_POST['subdistrict'], 'district' => $_POST['district'], 'province' => $_POST['province'], 'zipcode' => $_POST['zipcode'], 'thesissubjCode' => $_POST['thesissubjCode'], 'thesisnameth' => $_POST['thesisnameth'], 'thesisnameeng' => $_POST['thesisnameeng'], 'engtest' => $_POST['engtest'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function insertDebtinvestigate()
    {
        $data = array(
            'StudentID' => $_POST['stdid'], 'engtest' => $_POST['engtest'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->InsertDoc($data);
        $dataMaxDocID = array('StudentID' => $_POST['stdid']);
        $maxDocIDS = $this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
        $maxDocID = $maxDocIDS[0];
        $data2 = array(
            'DocID' => $maxDocID->DocID, 'stateID' => $_POST['stateID']
        );
        $this->DocStateModel->InsertDocState($data2);
        $this->send_mail();
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }


    //added 05-2-2019
    public function editRequest()
    {
        //$this->chkSTDLogin();
        $studentid = isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
        $dataSelect = array('StudentID' => $studentid);
        $data['docList'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'document.CreatedDate', 'ASC');
        $data['docList2'] = $this->DocModel->selectDocWithStateOrder($dataSelect, 'OfficerCommentedDate', 'DESC');
        $docID = $_GET['DocumentID'];
        $data['docInfo'] = $this->DocModel->getDocBydocID($docID);
        //$back = base_url("/FormControl/stdMain");

        // $this->load->view('css');
        // $this->load->view('header');
        // $this->load->view('StdReqDdlPart', $data);

        if ($data['docInfo'][0]['DocTypeID'] == 1) {
            $this->load->view('editTempStdCardReq', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 2) {
            $this->load->view('EditChangenameFrm', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 3) {
            $this->load->view('EditGradReqForm', $data);
        }
        // $this->load->view('StdReqTable', $data);
        //$this->load->view('footer');
    }
    //ended

    public function editReq()
    {
        //$this->chkSTDLogin();
        $docID = $_GET['DocumentID'];
        $data['UserInfo'] = $this->UserModel;
        $data['docInfo'] = $this->DocModel->getDocBydocID($docID);

        $this->load->view('dashboard/header', $data);
        if ($data['docInfo'][0]['DocTypeID'] == 1) {
            $this->load->view('editTempStdCardReq', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 2) {
            $this->load->view('EditChangenameFrm', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 3) {
            $this->load->view('EditGradReqForm', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 4) {
            $this->load->view('EditMasterGradForm', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 5) {
            $this->load->view('EditDebtInvestigate', $data);
        } else if ($data['docInfo'][0]['DocTypeID'] == 6) {
            $data['certDetail'] = $this->CertModel->getCertDetailBydocID($docID);
            $this->load->view('EditCertifyform', $data);
        }
    }

    public function delReq()
    {
        $data = array('DocID' => $_GET['docID']);
        $docinfo['docInfo'] = $this->DocModel->getDocBydocID($_GET['docID']);
        if ($docinfo['docInfo'][0]['PoliceNoticePath'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['PoliceNoticePath']);
        }
        if ($docinfo['docInfo'][0]['stdFile1'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile1']);
        }
        if ($docinfo['docInfo'][0]['stdFile2'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile2']);
        }
        if ($docinfo['docInfo'][0]['stdFile3'] != '') {
            $targetPath = getcwd() . '/uploads/';
            unlink($targetPath . $docinfo['docInfo'][0]['stdFile3']);
        }
        $this->DocModel->deleteDoc($data);
        redirect(base_url() . 'dashboard');
    }

    public function updateReq()
    {

        $filename = "";
        $encodename = uniqid();
        $otherreason = ($_POST['reason'] == '5') ? $_POST['other'] : "";
        if ($_FILES['stdPicFile']['name'] == '') {
            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'ReasonID' => $_POST['reason'], 'ReasonOther' => $otherreason, 'DocTypeID' => $_POST['DocTypeID']
            );
        } else {
            $filename = $encodename . '_' . $_FILES['stdPicFile']['name'];
            $tempFile = $_FILES['stdPicFile']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdPicFile']['name'];
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['currentimageValue']);

            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'ReasonID' => $_POST['reason'], 'ReasonOther' => $otherreason, 'PoliceNoticePath' => $filename, 'DocTypeID' => $_POST['DocTypeID']
            );
        }

        $this->DocModel->updateDoc($data, $_POST['docID']);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }
    public function updateChangeNameReq()
    {

        $filename = '';
        $filename2 = '';
        $filename3 = '';
        $encodename = uniqid();
        if ($_FILES['stdFile1']['name'] != '') {
            $filename = $encodename . '_' . $_FILES['stdFile1']['name'];
            $tempFile = $_FILES['stdFile1']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile1']['name'];
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['currentimageValue1']);
        }
        if ($_FILES['stdFile2']['name'] != '') {
            $filename2 = $encodename . '_' . $_FILES['stdFile2']['name'];
            $tempFile = $_FILES['stdFile2']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile2']['name'];
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['currentimageValue2']);
        }
        if ($_FILES['stdFile3']['name'] != '') {
            $filename3 = $encodename . '_' . $_FILES['stdFile3']['name'];
            $tempFile = $_FILES['stdFile3']['tmp_name'];
            $targetPath = getcwd() . '/uploads/';
            $targetFile = $targetPath . $encodename . '_' . $_FILES['stdFile3']['name'];
            move_uploaded_file($tempFile, $targetFile);
            unlink($targetPath . $_POST['currentimageValue3']);
        }
        $data = array(
            'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'newthname' => $_POST['newthName'], 'newthsname' => $_POST['newthSname'], 'newengname' => $_POST['newengName'], 'newengsname' => $_POST['newengSname'], 'reason' => $_POST['reason'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->updateDoc($data, $_POST['docID']);
        if ($filename != '') {
            $data = array(
                'DocID' => $_POST['docID'], 'stdFile1' => $filename
            );
            $this->DocModel->updateDoc($data, $_POST['docID']);
        }
        if ($filename2 != '') {
            $data = array(
                'DocID' => $_POST['docID'], 'stdFile2' => $filename2
            );
            $this->DocModel->updateDoc($data, $_POST['docID']);
        }
        if ($filename3 != '') {
            $data = array(
                'DocID' => $_POST['docID'], 'stdFile3' => $filename3
            );
            $this->DocModel->updateDoc($data, $_POST['docID']);
        }
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }
    public function updateGradReq()
    {
        $data = array(
            'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'soi' => $_POST['soi'], 'termEnd' => $_POST['termEnd'], 'yearEnd' => $_POST['yearEnd'], 'houseNumber' => $_POST['homenumber'], 'street' => $_POST['street'], 'sub_district' => $_POST['subdistrict'], 'district' => $_POST['district'], 'province' => $_POST['province'], 'zipcode' => $_POST['zipcode'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->updateDoc($data, $_POST['docID']);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function updateMasterGradReq()
    {
        $data = array(
            'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'tel' => $_POST['tel'], 'soi' => $_POST['soi'], 'termEnd' => $_POST['termEnd'], 'yearEnd' => $_POST['yearEnd'], 'houseNumber' => $_POST['homenumber'], 'street' => $_POST['street'], 'sub_district' => $_POST['subdistrict'], 'district' => $_POST['district'], 'province' => $_POST['province'], 'zipcode' => $_POST['zipcode'], 'DocTypeID' => $_POST['DocTypeID'], 'subjType' => $_POST['subjType'], 'thesissubjCode' => $_POST['thesissubjCode'], 'thesisnameth' => $_POST['thesisnameth'], 'thesisnameeng' => $_POST['thesisnameeng'], 'engtest' => $_POST['engtest']
        );
        $this->DocModel->updateDoc($data, $_POST['docID']);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function updateDebtinvestigate()
    {
        $Fullname = $this->UserModel->Fullname;
        $appdate = date("Y-m-d");
        $debtfac = 0;
        $debtlib = 0;
        $debtbuild = 0;
        $debtreg = 0;
        $debtFacapproveby = '';
        $debtFacapprovedate = '';
        $debtLibapproveby = '';
        $debtLibapprovedate = '';
        $debtBuildtapproveby = '';
        $debtBuildapprovedate = '';
        $debtRegtapproveby = '';
        $debtRegapprovedate = '';

        if (isset($_POST['debtfac'])) {
            $debtfac = $_POST['debtfac'];
            $debtFacapproveby = $Fullname;
            $debtFacapprovedate = $appdate;
        } else {

            $debtfac = 0;
            $debtFacapproveby = "";
            $debtFacapprovedate = "";
        }

        if (!isset($_POST['debtlib'])) {
            $debtlib = 0;
            $debtLibapproveby = "";
            $debtLibapprovedate = "";
        } else {
            $debtlib = $_POST['debtlib'];
            $debtLibapproveby = $Fullname;
            $debtLibapprovedate = $appdate;
        }

        if (!isset($_POST['debtbuild'])) {
            $debtbuild = 0;
            $debtBuildtapproveby = "";
            $debtBuildapprovedate = "";
        } else {
            $debtbuild = $_POST['debtbuild'];
            $debtBuildtapproveby = $Fullname;
            $debtBuildapprovedate = $appdate;
        }

        if (!isset($_POST['debtreg'])) {
            $debtreg = 0;
            $debtRegtapproveby = "";
            $debtRegapprovedate = "";
        } else {
            $debtreg = $_POST['debtreg'];
            $debtRegtapproveby = $Fullname;
            $debtRegapprovedate = $appdate;
        }
        if ($_POST['staffunit'] = 'COC' or $_POST['staffunit'] = 'FIS' or $_POST['staffunit'] = 'TE' or $_POST['staffunit'] = 'ESSAND') {
            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'nodebtFac' => $debtfac, 'debtFacapproveby' => $debtFacapproveby, 'debtFacapprovedate' => $debtFacapprovedate, 'DocTypeID' => $_POST['DocTypeID']
            );
        } else if ($_POST['staffunit'] = 'งานทะเบียนกลาง') {
            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'nodebtReg' => $debtreg, 'debtRegtapproveby' => $debtRegtapproveby, 'debtRegapprovedate' => $debtRegapprovedate, 'DocTypeID' => $_POST['DocTypeID']
            );
        } else if ($_POST['staffunit'] = 'งานห้องสมุด') {
            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'nodebtLib' => $debtlib, 'debtLibapproveby' =>  $debtLibapproveby, 'debtLibapprovedate' => $debtLibapprovedate, 'DocTypeID' => $_POST['DocTypeID']
            );
        } else if ($_POST['staffunit'] = 'งานอาคาร') {
            $data = array(
                'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'nodebtBuild' => $debtbuild, 'debtBuildtapproveby' => $debtBuildtapproveby, 'debtBuildapprovedate' => $debtBuildapprovedate, 'DocTypeID' => $_POST['DocTypeID']
            );
        }

        $this->DocModel->updateDoc($data, $_POST['docID']);
        if ($debtreg != 0 and $debtbuild != 0 and $debtfac != 0 and $debtlib != 0) {
            $resultdebt = $debtreg + $debtbuild + $debtfac + $debtlib;
            if ($resultdebt != 8) {
                $data2 = array(
                    'DocumentID' => $_POST['docID'],
                    'OfficerCommentID' => '2',
                    'OfficerCommentText' => 'มีหนี้สินคงค้าง',
                    'OfficerID' => $_POST['userID']
                );
            } else {
                $data2 = array(
                    'DocumentID' => $_POST['docID'],
                    'OfficerCommentID' => '1',
                    'OfficerCommentText' => 'ไม่มีหนี้สินคงค้าง',
                    'OfficerID' => $_POST['userID']
                );
            }
        } else {
            $data2 = array(
                'DocumentID' => $_POST['docID']
            );
        }

        $data = array(
            'DocumentID' => $_POST['docID'],
            'OfficerID' => $_POST['userID'],
            'StatusID' => "S01"
        );
        $this->DocStateModel->InsertDocState($data);

        $this->DocStateModel->InsertDocState($data2);
        $back = base_url("/FormControl/stdCardFormAdmin");
        header('Location:' . $back);
    }

    public function updateDebtinvestigateStd()
    {

        $data = array(
            'DocID' => $_POST['docID'], 'StudentID' => $_POST['stdid'], 'engtest' => $_POST['engtest'], 'DocTypeID' => $_POST['DocTypeID']
        );
        $this->DocModel->updateDoc($data, $_POST['docID']);
        $back = base_url("/FormControl/stdMain");
        header('Location:' . $back);
    }

    public function insertDocNextState()
    {
        $data = array(
            'DocumentID' => $_POST['docID'],
            'OfficerCommentText' => $_POST['commentText'],
            'OfficerID' => $_POST['userID'],
            'OfficerName' => $_POST['AdminName'],
            'OfficerNameEN' => $_POST['AdminNameEN'],
            'StatusID' => $_POST['StatusID']
        );
        $this->DocStateModel->InsertDocState($data);

        $this->DocumentModel->Update($_POST['docID'], array('StatusID' => $_POST['StatusID']));

        $back = base_url("/FormControl/stdCardFormAdmin");
        header('Location:' . $back);
    }
    public function graduateform()
    {
        $this->chkSTDLogin();
        $data['stdinfo'] = $this->Student_model->getStudentInfo('5730212051');
        $this->load->view('css');
        $this->load->view('header');

        $this->load->view('GraduateReqForm', $data);
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
    public function DebtInvestigateStaff()
    {
        $this->chkSTDLogin();
        $this->load->view('css');
        $this->load->view('header');
        $this->load->view('DebtInvestigateStaff');
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
