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
			<form style="margin: 20px auto auto auto" id="certForm" action="<?php echo base_url() ?>form/requestcertificate'" method="post" onsubmit="return validate()">
				<div class="card">
					<div class="card-header bg-success text-light">
						<h4>Requisition form for Application of a certificate</h4>
						<h6 class="text-minor">คำร้องขอหนังสือรับรอง</h6>
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
								<label class="font-weight-bold" for="major">หมายเลขโทรศัพท์ที่ติดต่อได้ :</label>
							</div>
							<div class="col-md-3">
								<input class="form-control" type="text" name="tel" id="tel">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold">A Certified Letter for Students who are studying.</label>
								<small class="sub">ใบประมวลผลการศึกษา และหนังสือรับรองต่างๆ สำหรับนักศึกษาที่กำลังศึกษาอยู่</small>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Transcript </label>
								<small class="sub">ใบประมวลผลการศึกษา ฉบับรอสภาฯ</small>
								<label class="font-weight-bold" name="price_u1" value="70">(THB 70.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" id="amount_en_u1" name="amount_en_u1" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u1" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Bonafide student certificate </label>
								<small class="sub">ใบรับรองการเป็นนักศึกษา</small>
								<label class="font-weight-bold" name="price_u2" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_u2" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u2" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Bonafide student behaviour certificate </label>
								<small class="sub">ใบรับรองความประพฤติ(ความเห็นอาจารย์ที่ปรึกษา)</small>
								<label class="font-weight-bold" name="price_u3" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_u3" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u3" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Last year student certificate </label>
								<small class="sub">ใบรับรองเรียนชั้นปีสุดท้าย(กำลังรอเกรดเทอมสุดท้าย)</small>
								<label class="font-weight-bold" name="price_u4" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_u4" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u4" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Completed of the curriculum certificate</label>
								<small class="sub">ใบรับรองเรียนครบตามหลักสูตร(เกรดครบทุกวิชาตามหลักสูตรที่เรียนมา)</small>
								<label class="font-weight-bold" name="price_u5" value="70">(THB 70.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_u5" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u5" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Waiting an approval from the university council certificate</label>
								<small class="sub">ใบรับรองสภาอนุมัติ(ผ่านการตรวจสอบแล้วว่าเรียนครบตามหลักสูตร)</small>
								<label class="font-weight-bold" name="price_u6" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_u6" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_u6" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold">A Certified Letter for graduated student.</label>
								<small class="sub">ใบประมวลผลการศึกษา และหนังสือรับรองต่างๆ สำหรับนักศึกษาที่สำเร็จศการศึกษาไปแล้ว</small>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Transcript </label>
								<small class="sub">ใบประมวลผลการศึกษา ฉบับสภาฯอนุมัติ</small>
								<label class="font-weight-bold" name="price_g1" value="70">(THB 70.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_g1" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_g1" />
									</div>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Approved from the university council certificate</label>
								<small class="sub">ใบรับรองสำเร็จฉบับสภาอนุมัติ</small>
								<label class="font-weight-bold" name="price_g2" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_g2" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_g2" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold">Other.</label>
								<small class="sub">อื่นๆ</small>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">Course Description</label>
								<small class="sub">คำอธิบายรายวิชา</small>
								<label class="font-weight-bold" name="price_o1" value="70">(THB 70.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_o1" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">ใบแปลประกาศนียบัตร/ปริญญาบัตร (แนบสำเนา)</label>
								<label class="font-weight-bold" name="price_o2" value="100">(THB 100.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_o2" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">ใบประกาศนียบัตรอาหารและเครื่องดื่ม/การโรงแรม</label>
								<label class="font-weight-bold" name="price_o3" value="250">(THB 250.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_o3" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold">ใบแทนปริญญาบัตร (กรณีปริญญาบัตรหาย)</label>
								<label class="font-weight-bold" name="price_o4" value="200">(THB 200.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_o4" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-inline">
								<label class="font-weight-bold">อื่นๆ</label>
								<input class="form-control ml-2 w-50" type="text" name="othercertname" id="othercertname" />
								<label class="font-weight-bold text-right ml-2" name="price_o5" value="50">(THB 50.-)</label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_th_o5" />
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<input class="form-control" type="number" value="0" name="amount_en_o5" />
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<input type="checkbox" id="sendems" name="sendems" />
								<label class="font-weight-bold">Sending by EMS.</label>
								<small class="sub">ส่งเอกสารทาง EMS </small>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="stdfullnameeng">ที่อยู่ที่สามารถจัดส่งเอกสารให้(กรุณากรอกให้ชัดเจน)</label>
								<textarea class="form-control" name="postaladdress" rows="3"></textarea>
							</div>
						</div>
						<div class="row text-center">
							<div class="col">
								<div class="form-group">
									<input type="hidden" id="DocTypeID" name="DocTypeID" value="6" />
									<input type="hidden" id="stateID" name="stateID" value="t06s01" />
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
<script>
	$(document).ready(function() {
		$("#certForm").submit(function() {
			var total = 0;
			$("input[name^='amount_']").each(function() {
				total += $(this).val() << 0;
			});

			if (total <= 0) {
				alert("you select " + total + " form");
				return false;
			}
		});
	});
</script>