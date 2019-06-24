<?php
$GetDocID = $DocList;
?>
<div class="container">
	<div class="row">
		<div class="col-md">
			<div class="card">
				<h6 class="card-header text-light Stidti bg-success" style="background-color: #003c71;">
					History
				</h6>
				<div class="card-body">
					<table id="unfinishedReq" class="table table-hove">
						<thead>
							<tr class="">
								<th scope="col" class="text-center">#</th>
								<th scope="col" class="text-center">Type</th>
								<th scope="col" class="text-center">Created Date</th>
								<th scope="col" class="text-center">Status</th>
								<th scope="col" class="text-center">Processed Date</th>
								<th scope="col" class="text-center">Manage</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($GetDocID as $docid) { ?>
								<tr>
									<th scope="row">
										<?php echo $i; ?>
									</th>
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
									<td>
										<?php echo $docid->DoctypeNameEng; ?>
									</td>
									<td class="text-center">
										<?php
										$datenew = date("d-M-Y", strtotime($docid->CreatedDate));
										echo $datenew;
										?>
									</td>
									<td class="text-center <?php echo ($docid->StatusID == 'S01') ? 'text-primary' : ($docid->StatusID == 'S02' ? 'text-danger' : 'text-info'); ?>">
										<?php echo ($docid->StatusID == 'S01') ? 'Waiting' : ($docid->StatusID == 'S02' ? 'Approved' : 'Disapprove'); ?>
									</td>
									<?php
									$processedDate = date("d-M-Y", strtotime($docid->OfficerCommentedDate));
									?>
									<td class="text-center">
										<?php
										echo $processedDate;
										?>
									</td>
									<?php
									$linkpage = "";
									$visible = "";
									$wording = '';
									if ($docid->OfficerCommentID == '0') {
										$wording = "Edit";
										$linkpage = "form/edit/" . $docid->DocumentID;
										$visible = "width:30px;";
									} else {
										$wording = "View";
										$linkpage = 'FormControl/AllowedStdView?docID=' . $docid->DocID . '&stdID=' . $docid->StudentID . '&doctypeID=' . $docid->DocTypeID;
										$visible = "display: none;";
									}
									?>
									<td>
										<div class="row">
											<div class="col">
												<a href="<?php echo base_url($linkpage); ?>">
													<?php echo $wording; ?></a>
											</div>
											<div class="col">
												<a href="<?php echo base_url('form/delete/' . $docid->DocumentID); ?>" style="<?php echo $visible; ?>" onclick="return confirm('Confirm to delete ?');">Delete</a>
											</div>
										</div>
									</td>
								</tr>
								<?php $i++;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
</body>

</html>
<script>
	$(document).ready(function() {
		var oTable = $('#unfinishedReq').DataTable({
			"pagingType": "full_numbers",
			"ordering": false,
			columnDefs: [{
					targets: 2,
					"render": function(data, type, row) {
						moment.locale('en');
						return moment(new Date(data)).format('DD-MMM-YYYY');
					}
				},
				{
					targets: 4,
					"render": function(data, type, row) {
						moment.locale('en');
						return moment(new Date(data)).format('DD-MMM-YYYY');
					}
				}
			]
		});
	});
</script>