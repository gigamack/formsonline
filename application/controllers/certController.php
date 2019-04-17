<?php 
    class certController extends CI_Controller 
    {

        public function __construct()
    {
        parent::__construct();
        $this->load->model('CertModel');
        $this->load->model('DocModel');
        $this->load->model('DocStateModel');
        $this->load->model('Student_model');
        $this->load->helper(array('form', 'url'));
    }
    // public function index()
    //     {
    //         $this->load->view('css');
    //         $this->load->view('header');  
    //         // $this->load->view('StdReqDdlPart',$data);
    //        $this->load->view('CertificateForm');    
    //     //    $this->load->view('StdReqTable',$data);
    //         $this->load->view('footer'); 
    //     }
    public function testarray()
    {
        $this->load->view('testarray');
    }
    public function insertcert()
        {
            //start with insert amount of cert into certRecord table then insert to document table 
            
                     //eng u form
            isset($_POST["amount_en_u1"])?$en_u1=$_POST["amount_en_u1"]:$en_u1=0;
            isset($_POST["amount_en_u2"])?$en_u2=$_POST["amount_en_u2"]:$en_u2=0;
            isset($_POST["amount_en_u3"])?$en_u3=$_POST["amount_en_u3"]:$en_u3=0;
            isset($_POST["amount_en_u4"])?$en_u4=$_POST["amount_en_u4"]:$en_u4=0;
            isset($_POST["amount_en_u5"])?$en_u5=$_POST["amount_en_u5"]:$en_u5=0;
            isset($_POST["amount_en_u6"])?$en_u6=$_POST["amount_en_u6"]:$en_u6=0;
            //TH u form
            isset($_POST["amount_th_u1"])?$th_u1=$_POST["amount_th_u1"]:$th_u1=0;
            isset($_POST["amount_th_u2"])?$th_u2=$_POST["amount_th_u2"]:$th_u2=0;
            isset($_POST["amount_th_u3"])?$th_u3=$_POST["amount_th_u3"]:$th_u3=0;
            isset($_POST["amount_th_u4"])?$th_u4=$_POST["amount_th_u4"]:$th_u4=0;
            isset($_POST["amount_th_u5"])?$th_u5=$_POST["amount_th_u5"]:$th_u5=0;
            isset($_POST["amount_th_u6"])?$th_u6=$_POST["amount_th_u6"]:$th_u6=0;
            //en g form
            isset($_POST["amount_en_g1"])?$en_g1=$_POST["amount_en_g1"]:$en_g1=0;
            isset($_POST["amount_en_g2"])?$en_g2=$_POST["amount_en_g2"]:$en_g2=0;
            //th g form
            isset($_POST["amount_th_g1"])?$th_g1=$_POST["amount_th_g1"]:$th_g1=0;
            isset($_POST["amount_th_g2"])?$th_g2=$_POST["amount_th_g2"]:$th_g2=0;
            //en o form
            isset($_POST["amount_en_o1"])?$en_o1=$_POST["amount_en_o1"]:$en_o1=0;
            isset($_POST["amount_en_o2"])?$en_o2=$_POST["amount_en_o2"]:$en_o2=0;
            isset($_POST["amount_en_o3"])?$en_o3=$_POST["amount_en_o3"]:$en_o3=0;
            isset($_POST["amount_en_o4"])?$en_o4=$_POST["amount_en_o4"]:$en_o4=0;
            isset($_POST["amount_en_o5"])?$en_o5=$_POST["amount_en_o5"]:$en_o5=0;
            //th o form 
            isset($_POST["amount_th_o1"])?$th_o1=$_POST["amount_th_o1"]:$th_o1=0;
            isset($_POST["amount_th_o2"])?$th_o2=$_POST["amount_th_o2"]:$th_o2=0;
            isset($_POST["amount_th_o3"])?$th_o3=$_POST["amount_th_o3"]:$th_o3=0;
            isset($_POST["amount_th_o4"])?$th_o4=$_POST["amount_th_o4"]:$th_o4=0;
            isset($_POST["amount_th_o5"])?$th_o5=$_POST["amount_th_o5"]:$th_o5=0;
            echo $en_u1;
            //Insert to certrecord
            $data= array('StudentID' => $_POST['stdid']
            , 'tel' => $_POST['tel']          
            , 'addressCert' => $_POST['postaladdress']            
            , 'DocTypeID' => $_POST['DocTypeID']);
           $DocID=$this->DocModel->InsertDoc($data);          

            //this part is unfinished
 if (isset($DocID))
 {
     echo $DocID;
 }
        //insert u form in cert record    
        if($en_u1+$th_u1>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u1"          
            , 'engAmount' => $en_u1            
            , 'thAmount' => $th_u1);    
            $this->CertModel->InsertcertRecord($dataCert);     
        }
        if($en_u2+$th_u2>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u2"          
            , 'engAmount' => $en_u2            
            , 'thAmount' => $th_u2);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_u3+$th_u3>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u3"          
            , 'engAmount' => $en_u3            
            , 'thAmount' => $th_u3);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_u4+$th_u4>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u4"          
            , 'engAmount' => $en_u4            
            , 'thAmount' => $th_u4);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_u5+$th_u5>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u5"          
            , 'engAmount' => $en_u5            
            , 'thAmount' => $th_u5);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_u6+$th_u6>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "u6"          
            , 'engAmount' => $en_u6            
            , 'thAmount' => $th_u6);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }

        // insert g form in cert record  
        if($en_g1+$th_g1>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "g1"          
            , 'engAmount' => $en_g1            
            , 'thAmount' => $th_g1);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_g2+$th_g2>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "g2"          
            , 'engAmount' => $en_g2            
            , 'thAmount' => $th_g2);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }

        // insert o form in cert record  
        if($th_o1>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "o1"          
            , 'engAmount' => $en_o1            
            , 'thAmount' => $th_o1);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($en_o2>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "o2"          
            , 'engAmount' => $en_o2            
            , 'thAmount' => $th_o2);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($th_o3>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "o3"          
            , 'engAmount' => $en_o3            
            , 'thAmount' => $th_o3);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }
        if($th_o4>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "o4"          
            , 'engAmount' => $en_o4            
            , 'thAmount' => $th_o4);   
            $this->CertModel->InsertcertRecord($dataCert);      
        }
        if($en_o5+$th_o5>0)
        {
            $dataCert= array('docID' => $DocID
            , 'certID' => "o5"          
            , 'engAmount' => $en_o5            
            , 'thAmount' => $th_o5
            , 'othername' => $_POST['othercertname']);    
            $this->CertModel->InsertcertRecord($dataCert);    
        }            
        }
    }
?>