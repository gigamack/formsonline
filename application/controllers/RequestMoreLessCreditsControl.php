<?php 
    class RequestMoreLessCreditsControl extends CI_Controller 
    {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CertModel');
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->model('DocTypeModel');
        $this->load->helper(array('form', 'url'));
    }

        public function Get() {

        }

        public function New()
        {            
            /*
                prepare data, model 
             */
            $studentid=isset($_SESSION['userSession']['StudentInfo']['STUDENT_ID']) ? $_SESSION['userSession']['StudentInfo']['STUDENT_ID'] : "";
            $data2 = $this->session->flashdata('data');
            $this->session->keep_flashdata('data');
            $data2["gpa"] = $this->Student_model->getStudentGPA($studentid);
            // print_r($data2["gpa"]);
            //print_r($data);
            //$data['docList']=$this->DocModel->selectDocWithStateOrder($dataSelect,'CreatedDate','DESC');       
            $this->load->view('student/RequestRegistMoreCredit', $data2);
            // echo date("Y")+543;
        //    echo $data2["gpa"][0]["EDU_YEAR"];
        }
        public function Insert()
        {
                $data= array('StudentID' => $_POST['stdid']
                , 'tel' => $_POST['tel']
                , 'term' => $_POST['term']
                , 'year' => $_POST['year']           
                , 'DocTypeID' => $_POST['DocType']);
                $this->DocModel->InsertDoc($data);
                $dataMaxDocID = array('StudentID' => $_POST['stdid']);
                $maxDocIDS=$this->DocModel->getMaxDocIDbyUserIDtoSetInitState($dataMaxDocID);
                $maxDocID=$maxDocIDS[0];
                $data2 = array('DocID' => $maxDocID->DocID
                , 'stateID' => $_POST['stateID']);
                $this->DocStateModel->InsertDocState($data2);
                $back = base_url("/FormControl/stdMain");
                header('Location:' . $back);
        }

        public function Update()
        {

        }

        public function Delete()
        {
        
        }
    }
?>