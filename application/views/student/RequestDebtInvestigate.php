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
			<form style="margin: 20px auto auto auto" action="<?php echo base_url() ?>form/requestdebtinvestigate" method="post">
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
								<label><?php echo $studentid; ?></label>
							</div>
							<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
						</div>
						<div class="row">
							<div class="col-md-3">
								<label class="font-weight-bold" for="stdfullname">ชื่อ-สกุล :</label>
							</div>
							<div class="col">
								<label><?php echo $fullname; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label class="font-weight-bold" for="stdfullnameeng">ชื่อ-สกุล(ภาษาอังกฤษ) :</label>
							</div>
							<div class="col">
								<label><?php echo $fullnameeng; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label class="font-weight-bold" for="faculty">คณะ :</label>
							</div>
							<div class="col">
								<label><?php echo $faculty; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label class="font-weight-bold" for="major">สาขา :</label>
							</div>
							<div class="col">
								<label><?php echo $majorname; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="font-weight-bold" for="engtest">การผ่านความรู้ภาษาอังกฤษโดย :</label>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<input type="text" class="form-control" id="engtest" name="engtest" placeholder="การผ่านความรู้ภาษาอังกฤษโดย" />
								</div>
							</div>
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
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="col" colspan="4">สำหรับเจ้าหน้าที่ / For staff</th>
								</tr>
								<tr>
									<th scope="col">ห้องสมุด / Library</th>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="col">อาคาร / Building</th>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="col">งานรับนักศึกษาและทะเบียนกลาง / Student Admission and Registration</th>
									<td></td>
									<td></td>
									<td></td>
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
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="5" />
									<input type="hidden" id="stateID" name="stateID" value="t05s01" />
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>