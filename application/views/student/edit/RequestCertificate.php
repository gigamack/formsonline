</head>
<?php
$studentid = $UserInfo->ID;
$fullname = $UserInfo->Fullname;
$fullnameeng = $UserInfo->FullnameEng;
$faculty = $UserInfo->Faculty;
$majorname = $UserInfo->Major;
$dob = $UserInfo->BirthDate;
$citizenid = $UserInfo->CardID;
$getDocInfo = $certDetail;
$docDetail = $docInfo;
// print_r($docDetail);

?>

<body>
	<div class="container">
		<form style="margin: 20px auto auto auto" id="certForm" action="<?php echo base_url("/FormControl/stdMain") ?>" method="post" onsubmit="return validate()">
			<div class="card" id="with_or_without_print">
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
							<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์ที่ติดต่อได้ :</label>
						</div>
						<div class="col-md-3">
							<label class="font-weight-bold" name="tel" id="tel">
								<h5><?php echo $docDetail[0]['tel']; ?></h5>
							</label>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<label class="font-weight-bold">รายการใบรับรองที่ร้องขอ</label>
						</div>
					</div>
					<?php
					$sum = 0;
					$n = count($getDocInfo);
					$showadvisorbox = 0;
					for ($i = 0; $i < $n; $i++) {
						if ($getDocInfo[$i]['certID'] == 'u3') {
							$showadvisorbox = 1;
						}
						?>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold"> <?php echo $getDocInfo[$i]['certNameTH'] ?> </label>
								<label name="price_u1">ราคาใบละ <?php echo $getDocInfo[$i]['certPrice'] ?></label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<label><?php echo $getDocInfo[$i]['engAmount'] ?></label>
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<label><?php echo $getDocInfo[$i]['thAmount'] ?></label>
									</div>
									<div class="col-2">
										<label class="font-weight-bold"><?php echo $getDocInfo[$i]['totalcertPrice'] ?> บาท</label>
									</div>
									<?php $sum = $sum + $getDocInfo[$i]['totalcertPrice']; ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="row">
						<div class="col-sm-10">
						</div>
						<div class="col-sm">
							<label class="font-weight-bold">รวม <?php echo $sum; ?> บาท</label>
						</div>
					</div>
					<!-- <div class="row">
						<label class="font-weight-bold">ความเห็นอาจารย์ที่ปรึกษา</label>
						<hr style="border-top: dotted 1px;" />
						<hr style="border-top: dotted 1px;" />
						<hr style="border-top: dotted 1px;" />
					</div>						 -->

					<style>
						.fill-line {
							border-bottom: dotted 1px;
							margin-top: 1.25em;
						}

						.signth {
							margin-left: 50px;
						}

						.datesign {
							margin-left: 50px;
						}

						.datesign:before {
							content: "วันที่";
							margin-left: -40px;
						}

						.signth:before {
							content: "(ลงชื่อ)";
							margin-left: -40px;
						}

						.signature {
							margin-left: 10px;
							margin-right: 10px;
						}

						.signature:before {
							content: "(";
							/*float: left;*/
							margin-left: -10px;
						}

						.signature:after {
							content: ")";
							float: right;
							margin-right: -10px;
						}
					</style>


					<div class="card" id="teacherComment" style="<?php if ($showadvisorbox == 0) echo "display: none;" ?>">
						<div class="card-body">
							<strong class="card-title">ความเห็นอาจารย์ที่ปรึกษา</strong>
							<span class="card-subtitle mb-2 text-muted">(เฉพาะการขอใบรับรองความประพฤติ)</span>
							<div class="fill-line"></div>
							<div class="fill-line"></div>
							<div class="fill-line"></div>
							<div class="fill-line"></div>
							<div class="fill-line"></div>
							<div class="row">
								<div class="col-md-9"></div>
								<div class="col-md-3 align-center">
									<div class="fill-line signth"></div>
									<div class="fill-line signature"></div>
									<div class="fill-line datesign"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row text-center">
						<div class="col" id="with_print">
							<div class="form-group">
								<input type="hidden" id="DocTypeID" name="DocTypeID" value="6" />
								<input type="hidden" id="stateID" name="stateID" value="t06s01" />
								<button id="btnPrint" class="btn btn-success">Print</button>
								<button id="btnBacktoDashboard" type="button" class="btn btn-success">Back</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<script>
		$(document).ready(function() {
			$("#btnBacktoDashboard").click(function(event) {
				event.preventDefault()
				window.location.href = "<?php echo base_url() ?>dashboard"
			})
			$("#btnPrint").click(function(event) {
				event.preventDefault()
				window.print()
			})
			$("#termEnd").val(<?php echo $Document[0]->termEnd ?>);
			$("#yearEnd").val(<?php echo $Document[0]->yearEnd ?>);
			$("#province").val("<?php echo $Document[0]->province ?>");
		});
	</script>