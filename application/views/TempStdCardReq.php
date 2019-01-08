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
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
    $majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
?>
	<div class="container">
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertReq") ?>" method="post"
			enctype="multipart/form-data">
			<div class="card">
				<h5 class="card-header bg-primary text-light">
					คำร้องขอทำบัตรนักศึกษาชั่วคราว
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
					</div>
					<div class="row">
						<div class="col">
							<label class="font-weight-bold" for="fac">คณะ :</label>
							<label>
								<?php echo $faculty;?></label>
						</div>
						<div class="col">
							<label class="font-weight-bold" for="major">สาขาวิชา :</label>
							<label>
								<?php echo $majorname;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="font-weight-bold">มีความประสงค์ขอบัตรประจำตัวนักศึกษาชั่วคราวเนื่องจาก/I would
								like to request a
								PSU Student identification card due to:</label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<select class="custom-select" id="reason" name="reason" onchange="if (this.value=='5'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
								<option selected>เลือก/Choose..</option>
								<option value="1">บัตรสูญหาย/ loss of the previous card (แนบใบแจ้งความจากสถานีตำรวจ/the notice from police
									station is enclosed)</option>
								<option value="2">บัตรชำรุด/ damaged card</option>
								<option value="3">บัตรหมดอายุ/ an expired card.</option>
								<option value="4">เปลี่ยนรหัสนักศึกษา,คำนำหน้า,ชื่อ-สกุล/ Change of ID No.,Title,Full Name.</option>
								<option value="5">อื่นๆ /Other</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="text" class="form-control" id="other" name="other" placeholder="ระบุ /Other" style="visibility:hidden;" />
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="font-weight-bold" for="stdPicFile">แนบไฟล์รูปภาพใบแจ้งความจากสถานีตำรวจ กรณีบัตรสูญหาย</label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="file" class="form-control-file" id="stdPicFile" name="stdPicFile">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="text-danger font-weight-bold">* ในการติดต่อรับบัตรนักศึกษาชั่วคราว กรุณานำรูปถ่ายหน้าตรงขนาด1นิ้ว
								1 รูปมาด้วย</label>
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

		<script>
			var uploadField = document.getElementById("stdPicFile");
			uploadField.onchange = function () {
				if (this.files[0].size > 10485760) {
					alert("File is too big!");
					this.value = "";
				};
			};

		</script>
	</div>
</body>

</html>
