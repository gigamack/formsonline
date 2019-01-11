<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
	$majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
	$dob="";
	$citizenid="";

?>
	<div class="container">
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertReq") ?>" method="post"
			enctype="multipart/form-data">
			<div class="card">
				<h5 class="card-header bg-primary text-light">
					คำร้องขอสำเร็จการศึกษา
				</h5>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
							<label>
								<?php echo $studentid;?></label>
						</div>
						<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid?>" />
						<div class="col">
							<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
							<label><?php echo $fullname;?></label>
						</div>
						<div class="col">
							<label class="font-weight-bold" for="stdfullnameeng">ชื่อ-สกุล(ภาษาอังกฤษ) :</label>
							<label><?php echo $fullnameeng;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label class="font-weight-bold" for="citizenid">เลขบัตรประชาชน :</label>
							<label>
								<?php echo $citizenid;?></label>
						</div>
						<div class="col-md-4">
							<label class="font-weight-bold" for="dob">วัน/เดือน/ปีเกิด :</label>
							<label>
								<?php echo $dob;?></label>
						</div>
					</div>				
					<div class="row">
						<div class="col-md-2">
						<label class="font-weight-bold" for="termEnd">ภาคการศึกษาที่ขอจบ :</label>
						</div>
						<div class="col-md-2">
						<div class="form-group">						
							<select class="custom-select" id="termEnd" name="termEnd">
								<option selected>เลือก</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>	
							</select>
						</div>
						</div>
						<div class="col-md-2">
						<label class="font-weight-bold" for="yearEnd">ปีการศึกษาที่ขอจบ :</label>
						</div>
							<div class="col-md-2">
							<div class="form-group">						
								<select class="custom-select" id="yearEnd" name="yearEnd">
									<option selected>เลือก</option>
									<option value="1">2561</option>
									<option value="2">2562</option>
									<option value="3">2563</option>	
								</select>
							</div>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
						<div class="form-group">
						<label class="font-weight-bold" for="homenumber">บ้านเลขที่:</label>
						</div></div>
						<div class="col-md-2"><div class="form-group">
						<input type="text" class="form-control" id="homenumber" name="homenumber" placeholder="บ้านเลขที่" />
						</div></div>
						<div class="col-sm-2"><div class="form-group">
						<label class="font-weight-bold" for="soi">ซอย:</label>
						</div></div>
						<div class="col-md-2"><div class="form-group">
						<input type="text" class="form-control" id="soi" name="soi" placeholder="ซอย" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-sm-2">
						<label class="font-weight-bold" for="street">ถนน:</label>
						</div>
						<div class="col-md-2">
						<input type="text" class="form-control" id="street" name="street" placeholder="ถนน" />
						</div>
						<div class="col-sm-2">
						<label class="font-weight-bold" for="subdistrict">ตำบล:</label>
						</div>
						<div class="col-md-2">
						<input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="ตำบล" />
						</div>
					</div>
					
					<div class="row">
						<div class="col">
							<div class="form-group">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="1" />
									<input type="hidden" id="stateID" name="stateID" value="t01s01" />
									<button type="submit" class="btn btn-success btn-block ">Submit</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</form>	
	</div>
</body>

</html>
