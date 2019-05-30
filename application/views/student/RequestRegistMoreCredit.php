<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Request form for register more/less credits than those stipulated</title>
</head>
<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_ENG'];
    $majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_ENG'];
?>
<body>

<?php 
    $this->load->view('css');
    $this->load->view('header');
    $this->load->view('StdReqDdlPart',$docList);
    $status="";
    // echo $gpa[0]["SEM_CREDITS"];
    // echo $gpa[0]["EDU_YEAR"];
    // print_r($gpa[0]);
    if($gpa[0]["STATUS"]=="03")
    {
        $status="Normal";
    }
    else if($gpa[0]["STATUS"]=="04")
    {
        $status="Probation No.1";
    }
    else if($gpa[0]["STATUS"]=="05")
    {
        $status="Probation No.2";
    }
    else if($gpa[0]["STATUS"]=="06")
    {
        $status="Probation No.3";
    }
?>
    
	<!-- <div class="container">		 -->
    <form style="margin: 20px auto auto auto" action="<?php echo base_url("/RequestMoreLessCreditsControl/Insert") ?>" method="post">
        <div class="card">
            <div class="card-header bg-success text-light">
                <h5>Request form for register more/less credits than those stipulated</h5>
                <h6 class="text-minor">คำร้องขอลงทะเบียนเรียนโดยหน่วยกิตเกิน/น้อยกว่าระเบียบฯ มหาวิทยาลัย</h6>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Student ID:</label>
                        </div>
                        <div class="col-md-2">
                            <label id="std_id" name="std_id"><?php echo $studentid ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Fullname:</label>
                        </div>
                        <div class="col-md-2">
                            <label id="fullname" name="fullname"><?php echo $fullnameeng ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Faculty:</label>
                        </div>
                        <div class="col-md-2">
                            <label id="faculty" name="faculty"> <?php echo strtoupper($faculty) ?> </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label>Major:</label>
                        </div>
                        <div class="col-md-2">
                            <label id="major" name="major"> <?php echo $majorname ?> </label>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                            <label for="tel">Telephone:</label>
                        </div>
                        <div class="col-md-2">
                            <input type="textbox" id="tel" name="tel" size="15" maxlength="10"/> 
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-2">
                            <label for="gpax">GPAX:</label>
                        </div>
                        <div class="col-md-2">
                        <label><?php echo $gpa[0]["CUM_GPA"]?></label>
                        </div>
                        <div class="col-md-2">
                            <label>Student Status:</label>
                        </div>                        
                        <div class="col-md-2">
                            <label><?php echo $status ?></label>
                            
                        </div>
                    </div> 
                </div>         
            </div>
        </div>
    </form>
    <!-- </div> -->
    <?php 
    $this->load->view('StdReqTable', $docList);
    $this->load->view('footer');
?> 
</div>
</body>