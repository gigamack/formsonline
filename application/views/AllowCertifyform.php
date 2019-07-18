<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<style>
		@media print {
			#with_print {
				display: none;
			}
		}
	</style>
</head>
<?php

$getDocInfo = $docInfo[0];
$getStdInfo = $stdinfo;
$studentid = $getDocInfo['StudentID'];
$fullname = $getStdInfo['TITLE_NAME_THAI'] . $getStdInfo['STUD_NAME_THAI'] . ' ' . $getStdInfo['STUD_SNAME_THAI'];
$fullnameeng = $getStdInfo['TITLE_NAME_ENG'] . $getStdInfo['STUD_NAME_ENG'] . ' ' . $getStdInfo['STUD_SNAME_ENG'];
$faculty = $getStdInfo['FAC_NAME_THAI'];
$majorname = $getStdInfo['MAJOR_NAME_THAI'];
$staff_id = $UserInfo->ID;
$AdminName = $UserInfo->Fullname;
$AdminNameEN = $UserInfo->FullnameEng;
$getCertInfo = $certDetail;
$docDetail = $docInfo;

?>

<body>
	<div class="container">
		<form style="margin: 20px auto auto auto" id="certForm" action="<?php echo base_url("/certController/insertDocNextState") ?>" method="post">
			<input type="hidden" id="userID" name="userID" value="<?php echo $staff_id; ?>" />
			<input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocumentID']; ?>" />
			<input type="hidden" id="AdminName" name="AdminName" value="<?php echo $AdminName; ?>" />
			<input type="hidden" id="AdminNameEN" name="AdminNameEN" value="<?php echo $AdminNameEN; ?>" />
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
					$n = count($getCertInfo);
					for ($i = 0; $i < $n; $i++) {
						?>
						<div class="row">
							<div class="col-sm-6">
								<label class="font-weight-bold"> <?php echo $getCertInfo[$i]['certNameTH'] ?> </label>
								<label name="price_u1">ราคาใบละ <?php echo $getCertInfo[$i]['certPrice'] ?></label>
							</div>
							<div class="col-sm-6">
								<div class="row">
									<div class="col-2 text-center">
										<label class="font-weight-bold">Eng</label>
									</div>
									<div class="col-2">
										<label><?php echo $getCertInfo[$i]['engAmount'] ?></label>
									</div>
									<div class="col-2 text-center">
										<label class="font-weight-bold">Thai</label>
									</div>
									<div class="col-2">
										<label><?php echo $getCertInfo[$i]['thAmount'] ?></label>
									</div>
									<div class="col-2">
										<label class="font-weight-bold"><?php echo $getCertInfo[$i]['totalcertPrice'] ?> บาท</label>
									</div>
									<?php $sum = $sum + $getCertInfo[$i]['totalcertPrice']; ?>
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

					<div class="card" id="teacherComment">
						<div class="card-body">
							<label class="card-title font-weight-bold">ข้อมูลการชำระเงิน</label>
							<div class="row">
								<div class="col-sm-2">
									<label class="font-weight-bold">ใบเสร็จรับเงินเลขที่</label>
								</div>
								<div class="col-md-3"><input class="textbox" id="commentText" name="commentText" /></div>

							</div>
						</div>
					</div>
				</div>
				<div class="row text-center">
					<div class="col" id="with_print">
						<div class="form-group">
							<input type="hidden" id="DocTypeID" name="DocTypeID" value="6" />
							<input type="hidden" id="stateID" name="stateID" value="t06s02" />
							<input type="hidden" id="StatusID" name="StatusID" value="S02" />
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</div>
			</div>
	</div>
	</form>
	</div>