	<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
	$majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
	$dob=$_SESSION['userSession']['StudentInfo']['STUD_BIRTH_DATE'];
    $citizenid=$_SESSION['userSession']['StudentInfo']['CITIZEN_ID'];
    $getDocInfo = $docInfo[0];
?>
	<div class="container">
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/updateMasterGradReq") ?>" method="post">
			<input type="hidden" name="docID" id="docID" value="<?php echo $getDocInfo['DocID'];?>">
			<div class="card">
				<h5 class="card-header bg-success text-light">
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
						<div class="col-md">
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
								<option selected><?php echo $getDocInfo['termEnd'];?></option>
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
									<option selected><?php echo $getDocInfo['yearEnd'];?></option>
									<option value="<?php echo strftime("%Y")+542;?>"><?php echo strftime("%Y")+542;?></option>
									<option value="<?php echo strftime("%Y")+543;?>"><?php echo strftime("%Y")+543;?></option>
									<option value="<?php echo strftime("%Y")+544;?>"><?php echo strftime("%Y")+544;?></option>	
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
						<input type="text" class="form-control" id="homenumber" name="homenumber" value="<?php echo $getDocInfo['houseNumber'];?>" />
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="soi">ซอย:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="soi" name="soi" value="<?php echo $getDocInfo['soi'];?>" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="street">ถนน:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="street" name="street" value="<?php echo $getDocInfo['street'];?>" />
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="subdistrict">ตำบล:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="subdistrict" name="subdistrict"  value="<?php echo $getDocInfo['sub_district'];?>" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="district">อำเภอ:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<input type="text" class="form-control" id="district" name="district" value="<?php echo $getDocInfo['district'];?>" />
						</div></div>
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="province">จังหวัด:</label>
						</div></div>
						<div class="col-md">
						<div class="form-group">						
								<select class="custom-select" id="province" name="province">
								<option select="selected" value="<?php echo $getDocInfo['province'];?>"><?php echo $getDocInfo['province'];?></option>
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
						<input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $getDocInfo['zipcode'];?>" />
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $getDocInfo['tel'];?>" />
						</div></div>
					</div>	

					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="thesissubjType">ประเภทวิชา:</label>
						</div></div>
						<div class="col-md"><div class="form-group">
								<select class="custom-select" id="subjType" name="subjType">
									<option selected><?php echo $getDocInfo['subjType'];?></option>
									<option value="สารนิพนธ์">สารนิพนธ์ </option>
									<option value="วิทยานิพนธ์">วิทยานิพนธ์ </option>	
								</select>
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="thesissubjCode">รหัสวิชาวิทยานิพนธ์ :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="thesissubjCode" name="thesissubjCode" placeholder="รหัสวิชาวิทยานิพนธ์" value="<?php echo $getDocInfo['thesissubjCode'];?>" />
						</div></div>
					</div>
					<div class="row">
						<div class="col-md">
						<div class="form-group">
						<label class="font-weight-bold" for="thesisnameth">ชื่อวิชาวิทยานิพนธ์ภาษาไทย :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<textarea class="form-control" id="thesisnameth" name="thesisnameth" rows="3" placeholder="ชื่อวิชาวิทยานิพนธ์ภาษาไทย"><?php echo $getDocInfo['thesisnameth'];?></textarea>
						</div></div>
						<div class="col-md"><div class="form-group">
						<label class="font-weight-bold" for="thesisnameeng">ชื่อวิชาวิทยานิพนธ์ภาษาอังกฤษ :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<textarea class="form-control" id="thesisnameeng" name="thesisnameeng" placeholder="ชื่อวิชาวิทยานิพนธ์ภาษาอังกฤษ"><?php echo $getDocInfo['thesisnameeng'];?></textarea>
						</div></div>
					</div>
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
						<label class="font-weight-bold" for="engtest">การผ่านความรู้ภาษาอังกฤษโดย :</label>
						</div></div>
						<div class="col-md"><div class="form-group">
						<input type="text" class="form-control" id="engtest" name="engtest" placeholder="การผ่านความรู้ภาษาอังกฤษโดย" value="<?php echo $getDocInfo['engtest'];?>"/>
						</div></div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group text-center">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="4" />
									<input type="hidden" id="stateID" name="stateID" value="t04s01" />
									<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</form>	
	</div>


