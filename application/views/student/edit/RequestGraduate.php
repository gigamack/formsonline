	<?php
	$studentid = $UserInfo->ID;
	$fullname = $UserInfo->Fullname;
	$fullnameeng = $UserInfo->FullnameEng;
	$faculty = $UserInfo->Faculty;
	$majorname = $UserInfo->Major;
	$dob = $UserInfo->BirthDate;
	$citizenid = $UserInfo->CardID;

	?>

	<div class="container">
		<div class="row">
			<div class="col-md">
				<form style="margin: 20px auto auto auto" action="<?php echo base_url("form/requestgraduate/update/" . $Document[0]->DocumentID); ?>" method="post">
					<div class="card">
						<div class="card-header bg-success text-light">
							<h5>
								Request for graduation
							</h5>
							<h6 class="text-minor">คำร้องขอสำเร็จการศึกษา</h6>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-3">
									<label class="font-weight-bold" for="stdid">Student ID:</label>
									<small class="sub">รหัสนักศึกษา</small>
								</div>
								<div class="col">
									<label><?php echo $studentid; ?></label>
								</div>
								<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							</div>
							<div class="row">
								<div class="col-md-3">
									<label class="font-weight-bold" for="stdfullname">Fullname:</label>
									<small class="sub">ชื่อ-สกุล</small>
								</div>
								<div class="col">
									<label><?php echo $fullname; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label class="font-weight-bold" for="stdfullname">Fullname (English):</label>
									<small class="sub">ชื่อ-สกุล(ภาษาอังกฤษ)</small>
								</div>
								<div class="col">
									<label><?php echo $fullnameeng; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<label class="font-weight-bold" for="citizenid">Citizen ID :</label>
									<small class="sub">เลขบัตรประชาชน</small>
								</div>
								<div class="col">
									<label><?php echo $citizenid; ?></label>
								</div>
							</div>


							<div class="row">
								<div class="col-md-3">
									<label class="font-weight-bold" for="dob">Date of birth :</label>
									<small class="sub">วัน/เดือน/ปีเกิด :</small>
								</div>
								<div class="col-md">
									<label><?php echo $dob; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<label class="font-weight-bold" for="termEnd">Graduated semester :</label>
									<small class="sub">ภาคการศึกษาที่ขอจบ</small>
								</div>
								<div class="col-md">
									<div class="form-group">
										<select class="custom-select" id="termEnd" name="termEnd">
											<option selected>เลือก</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
									</div>
								</div>
								<div class="col-md">
									<label class="font-weight-bold" for="yearEnd">Graduated year :</label>
									<small class="sub">ปีการศึกษาที่ขอจบ</small>
								</div>
								<div class="col-md">
									<div class="form-group">
										<select class="custom-select" id="yearEnd" name="yearEnd">
											<option selected>เลือก</option>
											<option value="<?php echo date("Y") + 542; ?>"><?php echo date("Y") + 542; ?></option>
											<option value="<?php echo date("Y") + 543; ?>"><?php echo date("Y") + 543; ?></option>
											<option value="<?php echo date("Y") + 544; ?>"><?php echo date("Y") + 544; ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="homenumber">House no:</label>
										<small class="sub">บ้านเลขที่</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="homenumber" name="homenumber" placeholder="บ้านเลขที่" value="<?php echo $Document[0]->houseNumber ?>" />
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="soi">Lane:</label>
										<small class="sub">ซอย</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="soi" name="soi" placeholder="ซอย" value="<?php echo $Document[0]->soi ?>"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="street">Street:</label>
										<small class="sub">ถนน</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="street" name="street" placeholder="ถนน" value="<?php echo $Document[0]->street ?>"/>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="subdistrict">Sub-district:</label>
										<small class="sub">ตำบล</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="ตำบล" value="<?php echo $Document[0]->sub_district ?>"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="district">District:</label>
										<small class="sub">อำเภอ</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="district" name="district" placeholder="อำเภอ" value="<?php echo $Document[0]->district ?>"/>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="province">Province:</label>
										<small class="sub">จังหวัด</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<select class="custom-select" id="province" name="province">
											<option value="" selected>---เลือกจังหวัด---</option>
											<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
											<option value="กระบี่">กระบี่ </option>
											<option value="กาญจนบุรี">กาญจนบุรี </option>
											<option value="กาฬสินธุ์">กาฬสินธุ์ </option>
											<option value="กำแพงเพชร">กำแพงเพชร </option>
											<option value="ขอนแก่น">ขอนแก่น</option>
											<option value="จันทบุรี">จันทบุรี</option>
											<option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
											<option value="ชัยนาท">ชัยนาท </option>
											<option value="ชัยภูมิ">ชัยภูมิ </option>
											<option value="ชุมพร">ชุมพร </option>
											<option value="ชลบุรี">ชลบุรี </option>
											<option value="เชียงใหม่">เชียงใหม่ </option>
											<option value="เชียงราย">เชียงราย </option>
											<option value="ตรัง">ตรัง </option>
											<option value="ตราด">ตราด </option>
											<option value="ตาก">ตาก </option>
											<option value="นครนายก">นครนายก </option>
											<option value="นครปฐม">นครปฐม </option>
											<option value="นครพนม">นครพนม </option>
											<option value="นครราชสีมา">นครราชสีมา </option>
											<option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
											<option value="นครสวรรค์">นครสวรรค์ </option>
											<option value="นราธิวาส">นราธิวาส </option>
											<option value="น่าน">น่าน </option>
											<option value="นนทบุรี">นนทบุรี </option>
											<option value="บึงกาฬ">บึงกาฬ</option>
											<option value="บุรีรัมย์">บุรีรัมย์</option>
											<option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
											<option value="ปทุมธานี">ปทุมธานี </option>
											<option value="ปราจีนบุรี">ปราจีนบุรี </option>
											<option value="ปัตตานี">ปัตตานี </option>
											<option value="พะเยา">พะเยา </option>
											<option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
											<option value="พังงา">พังงา </option>
											<option value="พิจิตร">พิจิตร </option>
											<option value="พิษณุโลก">พิษณุโลก </option>
											<option value="เพชรบุรี">เพชรบุรี </option>
											<option value="เพชรบูรณ์">เพชรบูรณ์ </option>
											<option value="แพร่">แพร่ </option>
											<option value="พัทลุง">พัทลุง </option>
											<option value="ภูเก็ต">ภูเก็ต </option>
											<option value="มหาสารคาม">มหาสารคาม </option>
											<option value="มุกดาหาร">มุกดาหาร </option>
											<option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
											<option value="ยโสธร">ยโสธร </option>
											<option value="ยะลา">ยะลา </option>
											<option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
											<option value="ระนอง">ระนอง </option>
											<option value="ระยอง">ระยอง </option>
											<option value="ราชบุรี">ราชบุรี</option>
											<option value="ลพบุรี">ลพบุรี </option>
											<option value="ลำปาง">ลำปาง </option>
											<option value="ลำพูน">ลำพูน </option>
											<option value="เลย">เลย </option>
											<option value="ศรีสะเกษ">ศรีสะเกษ</option>
											<option value="สกลนคร">สกลนคร</option>
											<option value="สงขลา">สงขลา </option>
											<option value="สมุทรสาคร">สมุทรสาคร </option>
											<option value="สมุทรปราการ">สมุทรปราการ </option>
											<option value="สมุทรสงคราม">สมุทรสงคราม </option>
											<option value="สระแก้ว">สระแก้ว </option>
											<option value="สระบุรี">สระบุรี </option>
											<option value="สิงห์บุรี">สิงห์บุรี </option>
											<option value="สุโขทัย">สุโขทัย </option>
											<option value="สุพรรณบุรี">สุพรรณบุรี </option>
											<option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
											<option value="สุรินทร์">สุรินทร์ </option>
											<option value="สตูล">สตูล </option>
											<option value="หนองคาย">หนองคาย </option>
											<option value="หนองบัวลำภู">หนองบัวลำภู </option>
											<option value="อำนาจเจริญ">อำนาจเจริญ </option>
											<option value="อุดรธานี">อุดรธานี </option>
											<option value="อุตรดิตถ์">อุตรดิตถ์ </option>
											<option value="อุทัยธานี">อุทัยธานี </option>
											<option value="อุบลราชธานี">อุบลราชธานี</option>
											<option value="อ่างทอง">อ่างทอง </option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="zipcode">Postal Code:</label>
										<small class="sub">รหัสไปรษณีย์</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" value="<?php echo $Document[0]->zipcode ?>"/>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label class="font-weight-bold" for="tel">Tel:</label>
										<small class="sub">หมายเลขโทรศัพท์</small>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<input type="text" class="form-control" id="tel" name="tel" placeholder="หมายเลขโทรศัพท์" value="<?php echo $Document[0]->tel ?>"/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md">
									<div class="mx-auto" style="width: 200px;">
										<button type="submit" class="btn btn-success">Update</button>
										<button id="btnBacktoDashboard" type="button" class="btn btn-success">Back</button>
									</div>
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="3" />
									<input type="hidden" id="stateID" name="stateID" value="t03s01" />
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$("#btnBacktoDashboard").click(function(event) {
				event.preventDefault()
				window.location.href = "<?php echo base_url() ?>dashboard"
			})
			$("#termEnd").val(<?php echo $Document[0]->termEnd ?>);
			$("#yearEnd").val(<?php echo $Document[0]->yearEnd ?>);
			$("#province").val("<?php echo $Document[0]->province ?>");
		});
	</script>