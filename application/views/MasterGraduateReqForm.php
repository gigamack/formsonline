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
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertReq") ?>" method="post">
			<div class="card">
				<h5 class="card-header bg-primary text-light">
					คำร้องขอสำเร็จการศึกษา
				</h5>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
						</div>
						<div class="col">
							<label><?php echo $studentid;?></label>
						</div>
						<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid?>" />				
					</div>
					<div class="row">
						<div class="col">
							<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
						</div>
						<div class="col">
							<label><?php echo $fullname;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col">
								<label class="font-weight-bold" for="stdfullnameeng">ชื่อ-สกุล(ภาษาอังกฤษ) :</label>
						</div>
						<div class="col">
								<label><?php echo $fullnameeng;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<label class="font-weight-bold" for="citizenid">เลขบัตรประชาชน :</label>
						</div>
						<div class="col-md-4">
							<label><?php echo $citizenid;?></label>
						</div>
					</div>

					
					<div class="row">						
						<div class="col-md">
							<label class="font-weight-bold" for="dob">วัน/เดือน/ปีเกิด :</label>
						</div>
						<div class="col-md">
							<label><?php echo $dob;?></label>
						</div>
					</div>				
					<div class="row">
						<div class="col-md">
						<label class="font-weight-bold" for="termEnd">ภาคการศึกษาที่ขอจบ :</label>
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
						<label class="font-weight-bold" for="yearEnd">ปีการศึกษาที่ขอจบ :</label>
						</div>
							<div class="col-md">
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
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="homenumber">บ้านเลขที่:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="homenumber" name="homenumber" placeholder="บ้านเลขที่" />
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="soi">ซอย:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="soi" name="soi" placeholder="ซอย" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="street">ถนน:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="street" name="street" placeholder="ถนน" />
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="subdistrict">ตำบล:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="ตำบล" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="district">อำเภอ:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="district" name="district" placeholder="อำเภอ" />
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="province">จังหวัด:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">						
								<select class="custom-select" id="yearEnd" name="yearEnd">
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
						<label class="font-weight-bold" for="zipcode">รหัสไปรษณีย์:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="รหัสไปรษณีย์" />
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="tel" name="tel" placeholder="หมายเลขโทรศัพท์" />
						</div></div>
					</div>

					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="thesissubjType">ประเภทวิชา:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
								<select class="custom-select" id="subjType" name="yearEnd">
									<option value="" selected>--เลือกประเภท--</option>
									<option value="อ่างทอง">สารนิพนธ์ </option>
									<option value="อ่างทอง">วิทยานิพนธ์ </option>	
								</select>
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="thesissubjCode">รหัสวิชาวิทยานิพนธ์ :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="thesissubjCode" name="thesissubjCode" placeholder="รหัสวิชาวิทยานิพนธ์" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="thesisnameth">ชื่อวิชาวิทยานิพนธ์ภาษาไทย :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<textarea class="form-control" id="thesisnameth" name="thesisnameth" rows="3" placeholder="ชื่อวิชาวิทยานิพนธ์ภาษาไทย"></textarea>
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="thesisnameeng">ชื่อวิชาวิทยานิพนธ์ภาษาอังกฤษ :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<textarea class="form-control" id="thesisnameeng" name="thesisnameeng" rows="3" placeholder="ชื่อวิชาวิทยานิพนธ์ภาษาอังกฤษ"></textarea>
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="engtest">การผ่านความรู้ภาษาอังกฤษโดย :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<textarea class="form-control" id="engtest" name="engtest" rows="3" placeholder="การผ่านความรู้ภาษาอังกฤษโดย"></textarea>
						</div></div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="4" />
									<input type="hidden" id="stateID" name="stateID" value="t04s01" />
									<button type="submit" class="btn btn-success btn-block">Submit</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</form>	
	</div>
</body>

</html>
