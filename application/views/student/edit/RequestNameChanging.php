<?php
$studentid = $UserInfo->ID;
$fullname = $UserInfo->Fullname;
$faculty = $UserInfo->Faculty;
$majorname = $UserInfo->Major;
?>
<div class="container">
	<div class="row">
		<div class="col-md">
			<form style="margin: 20px auto auto auto" action="<?php echo base_url("form/requestnamechanging/update/" . $Document[0]->DocumentID); ?>" method="post" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header bg-success text-light">
						<h5>Change of name form</h5>
						<h6 class="text-minor">คำร้องขอเปลี่ยน ชื่อ-สกุล</h6>
					</div>
					<div class="card-body">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label class="font-weight-bold" for="stdfullname">Current fullname<small class="sub">ชื่อ-สกุลเดิม</small>:</label>
									<label><?php echo $fullname; ?></label>
								</div>
								<div class="col-md-6">
									<label class="font-weight-bold" for="stdid">Student ID:<small class="sub">รหัสนักศึกษา</small></label>
									<label><?php echo $studentid; ?></label>
									<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label class="font-weight-bold" for="fac">Faculty<small class="sub">คณะ</small>:</label>
									<label><?php echo $faculty; ?></label>
								</div>
								<div class="col">
									<label class="font-weight-bold" for="major">Major<small class="sub">สาขาวิชา</small>:</label>
									<label><?php echo $majorname; ?></label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label class="font-weight-bold" for="tel">Mobilephone number<small class="sub">หมายเลขโทรศัพท์มือถือ</small>:</label>
								</div>
								<div class="col-md-5">
									<input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์มือถือ" value="<?php echo $Document[0]->tel ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col">
									<label class="font-weight-bold" class="form-check-label">Wish to change my fullname to <small class="sub">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</small></label>
								</div>
							</div>
							<br />
							<div class="row">
								<div class="col-md-2">
									<label class="font-weight-bold" for="newthName">Thai <small class="sub">ภาษาไทย</small>:</label>
								</div>
								<div class="col-md">
									<input type="text" class="form-control" id="newthName" name="newthName" placeholder="ชื่อ" value="<?php echo $Document[0]->newthname ?>" />
								</div>
								<div class="col-md">
									<input type="text" class="form-control" id="newthSname" name="newthSname" placeholder="สกุล" value="<?php echo $Document[0]->newthsname ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label class="font-weight-bold" for="newthName">English <small class="sub">ภาษาอังกฤษ</small>:</label>
								</div>
								<div class="col-md">
									<input type="text" class="form-control" id="newengName" name="newengName" placeholder="Name" value="<?php echo $Document[0]->newengname ?>" style="text-transform:uppercase" />
								</div>
								<div class="col-md">
									<input type="text" class="form-control" id="newengSname" name="newengSname" placeholder="Surname" value="<?php echo $Document[0]->newengsname ?>" style="text-transform:uppercase" />
								</div>
							</div>
							<div class="row">
								<div class="col">
									<label class="font-weight-bold" for="reason">Reason<small class="sub">เหตุผลเนื่องจาก</small>:</label>
									<input type="text" class="form-control" id="reason" name="reason" placeholder="ระบุเหตุผล" value="<?php echo $Document[0]->reason ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col">
									<label class="font-weight-bold">By attaching the supporting documents<small class="sub">โดยได้แนบเอกสารประกอบคำร้องขอแจ้งเปลี่ยนชื่อ-สกุลดังนี้</small>:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="">
										<label class="font-weight-bold" for="stdPicFile1">1.Copy of National ID Card<small class="sub">สำเนาบัตรประจำตัวประชาชน</small>:</label>
										<input type="file" class="form-control" id="stdFile1" name="stdFile1">
										<?php if (!empty($Document[0]->stdFile1)) { ?>
											<input type="hidden" name="oldfilename1" value="<?php echo $Document[0]->stdFile1 ?>" />
											<a class="btn btn-link btn-lg" target="_blank" href="<?php echo base_url("uploads/" . $Document[0]->stdFile1) ?>" role="button"><b>1. Attached File : </b><?php echo "Copy of National ID Card." ?></a>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="">
										<label class="font-weight-bold" for="stdPicFile2">2.Copy of change of name form <small class="sub">สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</small>:</label>
										<input type="file" class="form-control" id="stdFile2" name="stdFile2">
										<?php if (!empty($Document[0]->stdFile2)) { ?>
											<input type="hidden" name="oldfilename2" value="<?php echo $Document[0]->stdFile2 ?>" />
											<a class="btn btn-link btn-lg" target="_blank" href="<?php echo base_url("uploads/" . $Document[0]->stdFile2) ?>" role="button"><b>2. Attached File : </b><?php echo "Copy of change of name form." ?></a>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="">
										<label class="font-weight-bold" for="stdPicFile2">3.Copy of Passport <small class="sub">สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</small>:</label>
										<input type="file" class="form-control" id="stdFile3" name="stdFile3">
										<?php if (!empty($Document[0]->stdFile3)) { ?>
											<input type="hidden" name="oldfilename3" value="<?php echo $Document[0]->stdFile3 ?>" />
											<a class="btn btn-link btn-lg" target="_blank" href="<?php echo base_url("uploads/" . $Document[0]->stdFile3) ?>" role="button"><b>3. Attached File : </b><?php echo "Copy of Passport." ?></a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md">
								<div class="mx-auto text-center">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="2" />
									<input type="hidden" id="stateID" name="stateID" value="t02s01" />
									<button type="submit" class="btn btn-success">Update</button>
									<button id="btnBacktoDashboard" type="button" class="btn btn-success">Back</button>
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
	// var uploadField = document.getElementById("stdPicFile");
	// uploadField.onchange = function() {
	// 	if (this.files[0].size > 10485760) {
	// 		alert("File is too big!");
	// 		this.value = "";
	// 	};
	// };

	$(document).ready(function() {
		$("#btnBacktoDashboard").click(function(event) {
			event.preventDefault()
			window.location.href = "<?php echo base_url() ?>dashboard"
		})
	})
</script>