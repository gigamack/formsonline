<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
	<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
	$majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
	$dob=$_SESSION['userSession']['StudentInfo']['STUD_BIRTH_DATE'];
    $citizenid=$_SESSION['userSession']['StudentInfo']['CITIZEN_ID'];
	// $appFacStaff = "";	
	/* ******** */
	$getDocInfo = $docInfo[0];
	/*get approveinfo*/ 
	$appFacStaff = $getDocInfo['debtFacapproveby'];
    $appdateFac = $getDocInfo['debtFacapprovedate'];
    $appLibStaff = $getDocInfo['debtLibapproveby'];
    $appdateLib = $getDocInfo['debtLibapprovedate'];
    $appBuildStaff = $getDocInfo['debtBuildtapproveby'];
    $appdateBuild = $getDocInfo['debtBuildapprovedate'];
    $appRegStaff = $getDocInfo['debtRegtapproveby'];
	$appdateReg = $getDocInfo['debtRegapprovedate'];

	if($appdateFac==0000-00-00) $appdateFac='';
	if($appdateLib==0000-00-00) $appdateLib='';
	if($appdateBuild==0000-00-00) $appdateBuild='';
	if($appdateReg==0000-00-00) $appdateReg='';
	/*end*/
    // $getStdInfo = $stdinfo; 
	// $studentid= $getDocInfo['StudentID'];
	// $fullname= $getStdInfo['TITLE_NAME_THAI'].' '.$getStdInfo['STUD_NAME_THAI'].' '.$getStdInfo['STUD_SNAME_THAI'];
    // $fullnameeng= $getStdInfo['TITLE_NAME_ENG'].' '.$getStdInfo['STUD_NAME_ENG'].' '.$getStdInfo['STUD_SNAME_ENG'];
    // $faculty=$getStdInfo['FAC_NAME_THAI'];
    // $majorname=$getStdInfo['MAJOR_NAME_THAI'];
	// $staff_id=$_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][0];		
	// $dob=$getStdInfo['STUD_BIRTH_DATE'];
	// $citizenid=$getStdInfo['CITIZEN_ID'];
	// $dob=$getStdInfo['STUD_BIRTH_DATE'];

?>
		<form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/updateDebtinvestigateStd") ?>" method="post">
			<div class="card">
				<div class="card-header bg-success text-light">
				   <h4>Request form for Graduation and Debt Investigation (Graduate School) </h4> 
				   <h6 class="text-minor">คำร้องเพื่อขอสำเร็จการศึกษาและสำรวจหนี้สิน (ระดับบัณฑิตศึกษา) </h6>
                 </div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
						</div>
						<div class="col">
							<label><?php echo $studentid;?></label>
						</div>
						<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid;?>" />				
					</div>
					<div class="row">
						<div class="col-md-3">
							<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
						</div>
						<div class="col">
							<label><?php echo $fullname;?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
								<label class="font-weight-bold" for="stdfullnameeng">ชื่อ-สกุล(ภาษาอังกฤษ) :</label>
						</div>
						<div class="col">
								<label><?php echo $fullnameeng;?></label>
						</div>
					</div>	
					<div class="row">
					<div class="col-md-3">
								<label class="font-weight-bold" for="faculty">คณะ :</label>
						</div>
						<div class="col">
								<label><?php echo $faculty;?></label>
						</div>
					</div>	
					<div class="row">
					<div class="col-md-3">
								<label class="font-weight-bold" for="major">สาขา :</label>
						</div>
						<div class="col">
								<label><?php echo $majorname;?></label>
						</div>
					</div>			
					<div class="row">
						<div class="col-md-3">
						<div class="form-group">
						<label class="font-weight-bold" for="engtest">การผ่านความรู้ภาษาอังกฤษโดย :</label>
						</div></div>
						<div class="col-md-5"><div class="form-group">
						<input type="text" class="form-control" id="engtest" name="engtest" placeholder="การผ่านความรู้ภาษาอังกฤษโดย" value="<?php echo $getDocInfo['engtest']; ?>"/>
						</div></div>
					</div>
					<div class="row">
					<div class="col">
								<label class="font-weight-bold">มีความประสงค์ให้ดำเนินการอนุมัติการสำเร็จการศึกษาและขอสำรวจหนี้</label>
						</div>
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
							<th scope="col">หน่วยงาน</th>
							<th scope="col">ไม่มีหนี้สิน</th>
							<th scope="col">ผู้ตรวจสอบ</th>
							<th scope="col">วัน เดือน ปี</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<th scope="col">คณะ / Faculty</th>
							<td>
                                <label class="radio-inline"><input type="radio" name="debtfac" value="1" <?php if($getDocInfo['nodebtFac']== 1) echo "checked";?> disabled>ไม่มีหนี้สิน</label>
                                <label class="radio-inline"><input type="radio" name="debtfac" value="2" <?php if($getDocInfo['nodebtFac']== 2) echo "checked";?> disabled>มีหนี้สิน</label>
                            </td>
							<td><?php echo $appFacStaff; ?></td>
							<td><?php echo $appdateFac; ?></td>
							</tr>
							<tr>
							<th scope="col" colspan="4">สำหรับเจ้าหน้าที่ / For staff</th>							
							</tr>
							<tr>
							<th scope="col">ห้องสมุด / Library</th>
							<td>
                            <label class="radio-inline"><input type="radio" name="debtlib" value="1" <?php if($getDocInfo['nodebtLib']== 1) echo "checked";?> disabled>ไม่มีหนี้สิน</label>
                            <label class="radio-inline"><input type="radio" name="debtlib" value="2" <?php if($getDocInfo['nodebtLib']== 2) echo "checked";?> disabled>มีหนี้สิน</label>
                            </td>
							<td><?php echo $appLibStaff; ?></td>
							<td><?php echo $appdateLib; ?></td>
							</tr>
							<tr>
							<th scope="col">อาคาร / Building</th>
							<td>
                            <label class="radio-inline"><input type="radio" name="debtbuild" value="1" <?php if($getDocInfo['nodebtBuild']== 1) echo "checked";?> disabled>ไม่มีหนี้สิน</label>
                            <label class="radio-inline"><input type="radio" name="debtbuild" value="2" <?php if($getDocInfo['nodebtBuild']== 2) echo "checked";?> disabled>มีหนี้สิน</label>
                            </td>
							<td><?php echo $appBuildStaff; ?></td>
							<td><?php echo $appdateBuild; ?></td>
							</tr>                            
							<tr>
							<th scope="col">งานรับนักศึกษาและทะเบียนกลาง<br/>Student Admission and Registration</th>
							<td>			
                            <label class="radio-inline"><input type="radio" name="debtreg" value="1" <?php if($getDocInfo['nodebtReg']== 1) echo "checked";?> disabled>ไม่มีหนี้สิน</label>
                            <label class="radio-inline"><input type="radio" name="debtreg" value="2" <?php if($getDocInfo['nodebtReg']== 2) echo "checked";?> disabled>มีหนี้สิน</label>
                            </td>
							<td><?php echo $appRegStaff; ?></td>
							<td><?php echo $appdateReg; ?></td>
							</tr>
						</tbody>
					</table>					
					<div class="row">
					<div class="col">
								<label class="font-weight-bold">หมายเหตุ:</label><label>นักศึกษาท่านใดที่มีหนี้สิน ให้ชำระหนี้สินให้เรียบร้อย มิฉะนั้น มหาวิทยาลัยสงวนสิทธิ์ไม่เสนออนุมัติปริญญา</label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
							<input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>" />
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="5" />
									<input type="hidden" id="stateID" name="stateID" value="t05s01" />
									<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</form>	

