<?php
// $getDocInfo = $docInfo[0];
$getDocInfo = $docInfo[0];
$getStdInfo = $stdinfo;
$studentid = $getDocInfo['StudentID'];
$fullname = $getStdInfo['TITLE_NAME_THAI'] . $getStdInfo['STUD_NAME_THAI'] . ' ' . $getStdInfo['STUD_SNAME_THAI'];
$faculty = $getStdInfo['FAC_NAME_THAI'];
$majorname = $getStdInfo['MAJOR_NAME_THAI'];
$staff_id = $UserInfo->ID;
$AdminName = $UserInfo->Fullname;
$AdminNameEN = $UserInfo->FullnameEng;
?>
<div class="container mt-3 mb-3">
	<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertDocNextState") ?>" method="post" enctype="multipart/form-data">
		<input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocumentID']; ?>" />
		<input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>" />
		<input type="hidden" id="userID" name="userID" value="<?php echo $staff_id; ?>" />
		<input type="hidden" id="AdminName" name="AdminName" value="<?php echo $AdminName; ?>" />
		<input type="hidden" id="AdminNameEN" name="AdminNameEN" value="<?php echo $AdminNameEN; ?>" />
		<input type="hidden" id="stateID" name="stateID" value="t02s02" />
		<div class="card text-black bg-light">
			<h5 class="card-header bg-primary text-light">
				คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล
			</h5>
			<div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="stdfullname">ข้าพเจ้า(ชื่อ-สกุลเดิม):</label>
							<label id="stdfullname">
								<?php echo $fullname; ?></label>
							<!-- <input type="label" class="form-control" id="stdfullname" placeholder="ชื่อ-สกุล" readonly>       -->
						</div>
						<div class="col">
							<label for="stdid">รหัสนักศึกษา:</label>
							<label>
								<?php echo $studentid; ?></label>
							<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							<!-- <input type="text" class="form-control" id="stdid" placeholder="รหัสนักศึกษา"> -->
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label for="fac">คณะ:</label>
							<label id="fac"><?php echo $faculty; ?></label>
							<!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
						</div>
						<div class="col">
							<label for="major">สาขาวิชา:</label>
							<label id="major">
								<?php echo $majorname; ?></label>
							<!-- <input type="text" class="form-control" id="major" placeholder="สาขาวิชา" readonly>       -->
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label for="tel">หมายเลขโทรศัพท์มือถือ:</label>
							</div>
							<div class="col-md-5">
								<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $getDocInfo['tel']; ?>" disabled />
								<!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label class="form-check-label">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<label for="newthName">ภาษาไทย:</label>
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newthName" name="newthName" value="<?php echo $getDocInfo['newthname']; ?>" disabled />
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newthSname" name="newthSname" value="<?php echo $getDocInfo['newthsname']; ?>" disabled />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label for="newthName">ภาษาอังกฤษ:</label>
							</div>
							<div class="col-md">
								<input type="text" class="form-control" id="newengName" name="newengName" value="<?php echo $getDocInfo['newengname']; ?>" style="text-transform:uppercase" disabled />
							</div>
							<!-- <div class="w-100"></div> -->
							<div class="col-md">
								<input type="text" class="form-control" id="newengSname" name="newengSname" value="<?php echo $getDocInfo['newengsname']; ?>" style="text-transform:uppercase" disabled />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label for="reason">เหตุผลเนื่องจาก:</label>
								<input type="text" class="form-control" id="reason" name="reason" value="<?php echo $getDocInfo['reason']; ?>" disabled />
							</div>
						</div>
					</div>
					<?php
					if ($getDocInfo['stdFile1'] == "") {
						$showattachedbutton = "visibility:hidden;";
					} else {
						$showattachedbutton = "visibility:visible;";
					}
					?>
					<div class="form-group" style="margin: 20px auto auto auto">
						<label>โดยได้แนบเอกสารประกอบคำร้องขอแจ้งเปลี่ยนชื่อ-สกุลดังนี้</label><br />
						<label for="stdPicFile1">1.สำเนาบัตรประจำตัวประชาชน</label>
						<!-- <input type="file" class="form-control-file" id="stdFile1" name="stdFile1"> -->
						<div class="form-group" style="margin: 20px auto auto auto">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1" style="<?php echo $showattachedbutton; ?>">Attached
								file</button>
						</div>
						<label for="stdPicFile2">2.สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</label>
						<!-- <input type="file" class="form-control-file" id="stdFile2" name="stdFile2"> -->
						<div class="form-group" style="margin: 20px auto auto auto">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2" style="<?php echo $showattachedbutton; ?>">Attached
								file</button>
						</div>
						<label for="stdPicFile3">3.สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</label>
						<!-- <input type="file" class="form-control-file" id="stdFile3" name="stdFile3"> -->
						<div class="form-group" style="margin: 20px auto auto auto">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3" style="<?php echo $showattachedbutton; ?>">Attached
								file</button>
						</div>
					</div>
					<input type="hidden" id="DocTypeID" name="DocTypeID" value="2" />
					<div style="margin:  auto auto 20px auto">
						<div style="margin: 20px auto auto auto" class="card text-black bg-light text-center" style="margin: auto 20px auto auto">
							<label class="form-check-label">ความเห็นเจ้าหน้าที่ทะเบียนกลาง Register's Commentd :</label>
							<div class="radio">
								<input type="radio" id="agree" name="StatusID" value="S02">
								<label for="agree">Approve</label>
								<input type="radio" id="disagree" name="StatusID" value="S03">
								<label for="disagree">Disapprove</label>
							</div>
							<div class="form-group purple-border">
								<textarea class="form-control" id="commentText" rows="3" name="commentText" placeholder="เหตุผล:"></textarea>
							</div>
							<button style="margin: auto auto 20px auto" type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
							<?php $fileurl = $getDocInfo['stdFile1'] != "" ? "../uploads/" . $getDocInfo['stdFile1'] : "#"; ?>
							<a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							$fileextension = array(".pdf", ".doc", "docx", ".xls", "xlsx");
							$uploadedextension = substr($getDocInfo['stdFile1'], -4);
							$showmodalpic = in_array($uploadedextension, $fileextension) ? "visibility: hidden;" : "visibility: visible;"; ?>
							<img src="../uploads/<?php echo $getDocInfo['stdFile1']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic; ?>">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
							<?php $fileurl = $getDocInfo['stdFile2'] != "" ? "../uploads/" . $getDocInfo['stdFile2'] : "#"; ?>
							<a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							$fileextension = array(".pdf", ".doc", "docx", ".xls", "xlsx");
							$uploadedextension = substr($getDocInfo['stdFile2'], -4);
							$showmodalpic = in_array($uploadedextension, $fileextension) ? "visibility: hidden;" : "visibility: visible;"; ?>
							<img src="../uploads/<?php echo $getDocInfo['stdFile2']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic; ?>">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
							<?php $fileurl = $getDocInfo['stdFile3'] != "" ? "../uploads/" . $getDocInfo['stdFile3'] : "#"; ?>
							<a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
							$fileextension = array(".pdf", ".doc", "docx", ".xls", "xlsx");
							$uploadedextension = substr($getDocInfo['stdFile3'], -4);
							$showmodalpic = in_array($uploadedextension, $fileextension) ? "visibility: hidden;" : "visibility: visible;"; ?>
							<img src="../uploads/<?php echo $getDocInfo['stdFile3']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic; ?>">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
	</form>

	<script>
		var uploadField = document.getElementById("stdPicFile");
		uploadField.onchange = function() {
			if (this.files[0].size > 10485760) {
				alert("File is too big!");
				this.value = "";
			};
		};
	</script>
</div>