<?php
$studentid = $_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
$fullname = $_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'] . ' ' . $_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
$faculty = $_SESSION['userSession']['StudentInfo']['FAC_NAME_ENG'];
$majorname = $_SESSION['userSession']['StudentInfo']['MAJOR_NAME_ENG'];
?>
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertchangenameReq") ?>"
			method="post" enctype="multipart/form-data">
			<div class="card text-black bg-light">
				<h6 class="card-header bg-primary">
					Change of name form / คำร้องขอเปลี่ยน ชื่อ-สกุล
				</h6>
				<div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
							<label class="font-weight-bold" for="stdfullname">Current fullname<small class="sub">ชื่อ-สกุลเดิม</small>:</label>
								<!-- <small class="font-weight-bold" for="stdfullname">ชื่อ-สกุลเดิม:</small> -->
								<!-- <label class="font-weight-bold" for="stdfullname">ข้าพเจ้า(ชื่อ-สกุลเดิม):</label>-->
								<span id="stdfullname"><?php echo $fullname; ?></span>
							</div>
							<div class="col-md-6">
								<label class="font-weight-bold" for="stdid">Student ID:<small class="sub">รหัสนักศึกษา</small></label>
								<span id="stdid"><?php echo $studentid; ?></span>
								<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="fac">Faculty<small class="sub">คณะ</small>:</label>
								<span id="fac">
									<?php echo $faculty; ?></span>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="major">Major<small class="sub">สาขาวิชา</small>:</label>								
								<span id="major">
									<?php echo $majorname; ?></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="tel">Mobilephone number<small class="sub">หมายเลขโทรศัพท์มือถือ</small>:</label>					
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์มือถือ" />
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
								<label class="font-weight-bold" for="newthName">English <small class="sub">ภาษาอังกฤษ</small>:</label>
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
								<label class="font-weight-bold" for="reason">Reason<small class="sub">เหตุผลเนื่องจาก</small>:</label>				
								<input type="text" class="form-control" id="reason" name="reason" placeholder="ระบุเหตุผล" />
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
							<div class="col">
								<div class="form-group">
								<label class="font-weight-bold" for="stdPicFile1">1.Copy of National ID Card<small class="sub">สำเนาบัตรประจำตัวประชาชน</small>:</label>
									<input type="file" class="form-control-file" id="stdFile1" name="stdFile1" required>
								</div>
							</div>
						</div>
						<div class="row">
						<div class="col">
						<div class="form-group">
									<label class="font-weight-bold" for="stdPicFile2">2.Copy of change of name form <small class="sub">สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</small>:</label>
									<input type="file" class="form-control-file" id="stdFile2" name="stdFile2" required>
								</div>
						</div>
						</div>
						<div class="row">
						<div class="col">
						<div class="form-group">
									<label class="font-weight-bold" for="stdPicFile2">3.Copy of Passport <small class="sub">สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</small>:</label>
									<input type="file" class="form-control-file" id="stdFile3" name="stdFile3">
								</div>
						</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group text-center">
								<input type="hidden" id="DocTypeID" name="DocTypeID" value="2" />
								<input type="hidden" id="stateID" name="stateID" value="t02s01" />
								<button type="submit" class="btn btn-success">Submit</button>
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
