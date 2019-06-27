<?php
$GetDocID = $docList;
?>
<div class="container Chuanpim" id="ResultList">
	<div class="row mt-2">
		<div class="col">
			<button class="btn btn-primary btn-lg btn-block mt-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">รายการคำร้องรอตรวจสอบ</button>

		</div>
		<div class="col">
			<button class="btn btn-success btn-lg btn-block mt-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">รายการคำร้องที่ตรวจสอบแล้ว</button>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="collapse show" id="multiCollapseExample1" data-parent="#ResultList">
				<div class="card mt-3">
					<h5 class="card-header bg-primary text-light">
						รายการคำร้องรอตรวจสอบ
					</h5>
					<div class="card-body">
						<table id="unfinishedReq" class="table table-hove">
							<thead>
								<tr class="">
									<th scope="col">#</th>
									<th scope="col">ประเภทคำร้อง</th>
									<th scope="col">ผู้ยื่นคำร้อง</th>
									<th scope="col">วันที่สร้างคำร้อง</th>
									<th scope="col">สถานะคำร้อง</th>
									<th scope="col">จัดการ</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($GetDocID as $docid) { ?>

									<?php if (($docid->StatusID != 'S03' && $docid->StatusID != 'S02')) { ?>
										<?php
										$docTypeName = "";
										if ($docid->DocTypeID == 1) {
											$docTypeName = 'คำร้องขอทำบัตรนักศึกษาชั่วคราว';
										} else if ($docid->DocTypeID == 2) {
											$docTypeName = 'คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล';
										} else if ($docid->DocTypeID == 3) {
											$docTypeName = 'คำร้องขอสำเร็จการศึกษา';
										} else if ($docid->DocTypeID == 4) {
											$docTypeName = 'คำร้องขอสำเร็จการศึกษา ป.โท';
										} else if ($docid->DocTypeID == 5) {
											$docTypeName = 'คำร้องขอตรวจสอบหนี้สิน';
										} else if ($docid->DocTypeID == 6) {
											$docTypeName = 'คำร้องขอหนังสือรับรอง';
										}
										?>
										<tr class="">
											<th scope="row">
												<?php echo $i; ?>
											</th>
											<td>
												<?php echo $docid->DoctypeNameTH; ?>
											</td>
											<td>
												<?php echo $docid->StudentID; ?>
											</td>
											<td>
												<?php echo $docid->CreatedDate; ?>
											</td>
											<td><?php echo $docid->Name; ?></td>
											<td><a href="<?php echo base_url('FormControl/stdCardAllow?docID=' . $docid->DocumentID . '&stdID=' . $docid->StudentID); ?>">Manage</a></td>
										</tr>
										<?php $i++;
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="collapse " id="multiCollapseExample2" data-parent="#ResultList">
				<div class="card mt-3">
					<h5 class="card-header bg-success text-light">
						รายการคำร้องที่ตรวจสอบแล้ว
					</h5>
					<div class="card-body">
						<table id="finishedReq" class="table table-hover">
							<thead>
								<tr class="">
									<th scope="col">#</th>
									<th scope="col">ประเภทคำร้อง</th>
									<th scope="col">ผู้ยื่นคำร้อง</th>
									<th scope="col">วันที่จัดการคำร้อง</th>
									<th scope="col">สถานะคำร้อง</th>
									<th scope="col">รายละเอียด</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($docList as $docid) { ?>
									<?php if ($docid->StatusID == 'S02' || $docid->StatusID == 'S03') { ?>
										<?php
										$docTypeName = "";
										if ($docid->DocTypeID == 1) {
											$docTypeName = 'คำร้องขอทำบัตรนักศึกษาชั่วคราว';
										} else if ($docid->DocTypeID == 2) {
											$docTypeName = 'คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล';
										} else if ($docid->DocTypeID == 3) {
											$docTypeName = 'คำร้องขอสำเร็จการศึกษา';
										} else if ($docid->DocTypeID == 4) {
											$docTypeName = 'คำร้องขอสำเร็จการศึกษา ป.โท';
										} else if ($docid->DocTypeID == 5) {
											$docTypeName = 'คำร้องขอตรวจสอบหนี้สิน';
										} else if ($docid->DocTypeID == 6) {
											$docTypeName = 'คำร้องขอหนังสือรับรอง';
										}
										?>
										<tr class="">
											<th scope="row">
												<?php echo $i; ?>
											</th>
											<td>
												<?php echo $docid->DoctypeNameTH; ?>
											</td>
											<td>
												<?php echo $docid->StudentID; ?>
											</td>
											<td>
												<?php echo $docid->OfficerCommentedDate; ?>
											</td>
											<td>
												<?php
												echo $docid->ID == "S02" ?  "<span style='color:green'>$docid->Name</span>" : "<span style='color:red'>$docid->Name</span>";
												?>
											</td>
											<td class="text-center"><a href="<?php echo base_url('FormControl/Allowed?docID=' . $docid->DocID . '&stdID=' . $docid->StudentID . '&doctypeID=' . $docid->DocTypeID); ?>">View</a></td>
										</tr>
										<?php $i++;
									}
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			var oTable = $('#unfinishedReq').DataTable({
				"pagingType": "full_numbers",
				"ordering": false,
				columnDefs: [{
					targets: 3,
					"render": function(data, type, row) {
						moment.locale('th');
						return moment(data).format('lll');
					}
				}]
			});
			var oTable = $('#finishedReq').DataTable({
				"pagingType": "full_numbers",
				"ordering": false,
				columnDefs: [{
					targets: 3,
					"render": function(data, type, row) {
						moment.locale('th');
						return moment(data).format('lll');
					}
				}]
			});
		});
	</script>