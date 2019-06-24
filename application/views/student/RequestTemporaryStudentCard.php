<?php
$studentid = $UserInfo->ID;
$fullname = $UserInfo->Fullname;
$faculty = $UserInfo->Faculty;
$majorname = $UserInfo->Major;
?>
<div class="container">
	<div class="row">
		<div class="col-md">
			<form id="tempCardform" style="margin: 20px auto auto auto" action="<?php echo base_url(); ?>form/requesttemporarystudentcard" method="post" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header bg-success text-light">
						<h5>Request Form for temporary PSU Identification Card</h5>
						<h6 class="text-minor">คำร้องขอรับบัตรนักศึกษาชั่วคราว</h6>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="stdid">Student ID /</label>
								<small class="sub">รหัสนักศึกษา</small>
								<label><?php echo $studentid; ?></label>
							</div>
							<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							<div class="col">
								<label class="font-weight-bold" for="stdfullname">Fullname /</label>
								<small class="sub">ชื่อ-สกุล:</small>
								<label><?php echo $fullname; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="fac">Faculty /</label>
								<small class="sub">คณะ :</small>
								<label>
									<?php echo $faculty; ?></label>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="major">Major /</label>
								<small class="sub">สาขาวิชา :</small>
								<label>
									<?php echo $majorname; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold">I would like to request a PSU Student identification card due to/
									มีความประสงค์ขอบัตรประจำตัวนักศึกษาชั่วคราวเนื่องจาก :</label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<select class="custom-select" id="reason" name="reason" onchange="if (this.value=='5'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
									<option value="0" selected>Choose/เลือก..</option>
									<option value="1">Loss of the previous card. (the notice from police station is enclosed.) / บัตรสูญหาย (แนบใบแจ้งความจากสถานีตำรวจ)</option>
									<option value="2">Damaged card./ บัตรชำรุด</option>
									<option value="3">Expired card./ บัตรหมดอายุ</option>
									<option value="4">Change of ID No.,Title,Full Name./ เปลี่ยนรหัสนักศึกษา,คำนำหน้า,ชื่อ-สกุล</option>
									<option value="5">Other /อื่นๆ</option>
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
								<label class="font-weight-bold" for="stdPicFile">In case of loss of previous card, the notice from police station is required <small class="sub">แนบไฟล์รูปภาพใบแจ้งความจากสถานีตำรวจ กรณีบัตรสูญหาย</small></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input type="file" class="form-control" id="stdPicFile" name="stdPicFile">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="text-danger font-weight-bold">* Please bring your 1 inch formal photo to registration office when you contact to receive new student ID card / ในการติดต่อรับบัตรนักศึกษาชั่วคราว กรุณานำรูปถ่ายหน้าตรงขนาด1นิ้ว
									1 รูปมาด้วย</label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="1" />
									<input type="hidden" id="stateID" name="stateID" value="t01s01" />
									<div class="mx-auto" style="width: 100px;">
										<button type="submit" class="btn btn-success">Submit</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	var uploadField = document.getElementById("stdPicFile");
	uploadField.onchange = function() {
		if (this.files[0].size > 10485760) {
			alert("File is too big!");
			this.value = "";
		};
	};

	$(document).ready(function() {
		$("#tempCardform").submit(function() {
			var selectedvalue = $("#reason").val();
			if (selectedvalue == 0) {
				alert("You have to select reason.");
				return false;
			}
			if (selectedvalue == 1) {
				if ($("#stdPicFile").val() == "") {
					alert("You have to attach picture.");
					return false;
				}
			}
		});
	});
</script>