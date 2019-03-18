<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
	<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
	$majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
	$dob=$_SESSION['userSession']['StudentInfo']['STUD_BIRTH_DATE'];
	$citizenid=$_SESSION['userSession']['StudentInfo']['CITIZEN_ID'];

?>
<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertDebtinvestigate") ?>" method="post">
			<div class="card">
				<div class="card-header bg-success text-light">
				   <h4>Requisition form for Application of a certificate</h4> 
				   <h6 class="text-minor">คำร้องขอหนังสือรับรอง</h6>
                 </div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
						</div>
						<div class="col">
							<label><?php echo $studentid;?></label>
						</div>
						<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid?>" />				
					</div>
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
						</div>
						<div class="col">
							<label><?php echo $fullname;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
								<label class="font-weight-bold" for="stdfullnameeng">ชื่อ-สกุล(ภาษาอังกฤษ) :</label>
						</div>
						<div class="col">
								<label><?php echo $fullnameeng;?></label>
						</div>
					</div>	
					<div class="row">
					<div class="col-md-3">
								<label class="font-weight-bold" for="faculty">คณะ :</label>
						</div>
						<div class="col">
								<label><?php echo $faculty;?></label>
						</div>
					</div>	
					<div class="row">
					<div class="col-md-3">
								<label class="font-weight-bold" for="major">สาขา :</label>
						</div>
						<div class="col">
								<label><?php echo $majorname;?></label>
						</div>
					</div>
					<div class="row">
							<div class="col">
								<label class="font-weight-bold">A Certified Letter for Students who are studying.</label>
								<small class="sub">ใบประมวลผลการศึกษา และหนังสือรับรองต่างๆ สำหรับนักศึกษาที่กำลังศึกษาอยู่</small>
							</div>
						</div>
				</div>
			</div>
		</form>	