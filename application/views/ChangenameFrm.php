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
$studentid = $_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
$fullname = $_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'] . ' ' . $_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
$faculty = $_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
$majorname = $_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];
?>
	<div class="container mt-3 mb-3">
		<form action="<?php echo base_url("/FormControl/insertchangenameReq") ?>"
			method="post" enctype="multipart/form-data">
			<div class="card text-black bg-light">
				<h5 class="card-header bg-primary text-light">
					คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล
				</h5>
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="stdfullname">ข้าพเจ้า(ชื่อ-สกุลเดิม):</label>
								<label id="stdfullname">
									<?php echo $fullname; ?></label>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
								<label>
									<?php echo $studentid; ?></label>
								<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="fac">คณะ:</label>
								<label id="fac">
									<?php echo $faculty; ?></label>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="major">สาขาวิชา:</label>
								<label id="major">
									<?php echo $majorname; ?></label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์มือถือ:</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์มือถือ" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" class="form-check-label">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="newthName">ภาษาไทย:</label>
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newthName" name="newthName" placeholder="ชื่อ" />
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newthSname" name="newthSname" placeholder="สกุล" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="newthName">ภาษาอังกฤษ:</label>
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newengName" name="newengName" placeholder="Name" style="text-transform:uppercase" />
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newengSname" name="newengSname" placeholder="Surname" style="text-transform:uppercase" />
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="reason">เหตุผลเนื่องจาก:</label>
								<input type="text" class="form-control" id="reason" name="reason" placeholder="ระบุเหตุผล" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label class="font-weight-bold">โดยได้แนบเอกสารประกอบคำร้องขอแจ้งเปลี่ยนชื่อ-สกุลดังนี้</label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="font-weight-bold" for="stdPicFile1">1.สำเนาบัตรประจำตัวประชาชน</label>
									<input type="file" class="form-control-file" id="stdFile1" name="stdFile1">
								</div>
								<div class="form-group">
									<label class="font-weight-bold" for="stdPicFile2">2.สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</label>
									<input type="file" class="form-control-file" id="stdFile2" name="stdFile2">
								</div>
								<div class="form-group">
									<label class="font-weight-bold" for="stdPicFile3">3.สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</label>
									<input type="file" class="form-control-file" id="stdFile3" name="stdFile3">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<input type="hidden" id="DocTypeID" name="DocTypeID" value="2" />
								<input type="hidden" id="stateID" name="stateID" value="t02s01" />
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
