	<?php
      $getDocInfo = $docInfo[0];           
      $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
      $fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
      $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
      $majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
?>
<div class="container">
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/updateReq") ?>" method="post"
			enctype="multipart/form-data">
			<div class="card text-black bg-light">
				<h5 class="card-header bg-success text-light">
					คำร้องขอทำบัตรนักศึกษาชั่วคราว
				</h5>
				<div class="input-group">
					<div class="card-body">
						<div class="row">
							<div class="col"></div>
						</div>

						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
								<label>
									<?php echo $studentid;?></label>
							</div>
							<input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>" />
							<input type="hidden" id="stdid" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>" />
							<div class="col">
								<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
								<label>
									<?php echo $getDocInfo['StudentID']; ?></label>
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
									<option value="1" <?php if($getDocInfo['ReasonID']=='1' ){ echo ' selected="selected"' ; } ?>>บัตรสูญหาย/ loss
										of the previous card (แนบใบแจ้งความจากสถานีตำรวจ/the notice from police station is enclosed)</option>
									<option value="2" <?php if($getDocInfo['ReasonID']=='2' ){ echo ' selected="selected"' ; } ?>>บัตรชำรุด/
										damaged card</option>
									<option value="3" <?php if($getDocInfo['ReasonID']=='3' ){ echo ' selected="selected"' ; } ?>>บัตรหมดอายุ/ an
										expired card.</option>
									<option value="4" <?php if($getDocInfo['ReasonID']=='4' ){ echo ' selected="selected"' ; } ?>>เปลี่ยนรหัสนักศึกษา,คำนำหน้า,ชื่อ-สกุล/
										Change of ID No.,Title,Full Name.</option>
									<option value="5" <?php if($getDocInfo['ReasonID']=='5' ){ echo ' selected="selected"' ; } ?>>อื่นๆ /Other</option>
								</select>
							</div>
						</div>

						<div class="row">
							<?php 
            if($getDocInfo['ReasonOther']=="")
            {
              $showtextbox="visibility:hidden;";
            }
            else
            {
              $showtextbox="visibility: visible;";
            }           
            ?>
							<div class="col">
								<input type="text" class="form-control" id="other" name="other" placeholder="ระบุ /Other" style="<?php echo $showtextbox;?>"
								 value="<?php echo (isset($getDocInfo['ReasonOther'])?$getDocInfo['ReasonOther']:"") ?>" />
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

						<?php 
            if($getDocInfo['PoliceNoticePath']=="")
            {
              $showattachedbutton="visibility:hidden;";
            }
            else
            {
              $showattachedbutton="visibility:visible;";
            }           
            ?>
						<div class="form-group" style="margin: 20px auto auto auto">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="<?php echo $showattachedbutton;?>">Attached
								file</button>
						</div>

						<input type="hidden" name="currentimageValue" value="<?php echo $getDocInfo['PoliceNoticePath']; ?>" />

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
									<button type="submit" class="btn btn-success btn-block ">Update</button>
							</div>
						</div>
					</div>	

					</div>
				</div>
			</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
							<?php $fileurl= $getDocInfo['PoliceNoticePath']!=""?"../uploads/".$getDocInfo['PoliceNoticePath']:"#"; ?>
							<a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<?php
                $fileextension = array(".pdf", ".doc", "docx", ".xls","xlsx");
                $uploadedextension = substr($getDocInfo['PoliceNoticePath'],-4);
                $showmodalpic= in_array($uploadedextension,$fileextension)?"visibility: hidden;":"visibility: visible;"; 
              ?>
							<img src="../uploads/<?php echo $getDocInfo['PoliceNoticePath']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail"
							 style="<?php echo $showmodalpic;?>">
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
			uploadField.onchange = function () {
				if (this.files[0].size > 10485760) {
					alert("File is too big!");
					this.value = "";
				};
			};

		</script>