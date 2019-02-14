<?php
            $GetDocID = $docList;
?>
<div class="card" style="margin: 20px auto auto auto">
				<h5 class="card-header bg-primary text-light Stidti">
				History
				</h5>
				<div class="card-body">
					<table id="unfinishedReq" class="table table-hove">
						<thead>
							<tr class="">
								<th scope="col">#</th>
								<th scope="col">Type</th>
								<th scope="col">Created Date</th>
								<th scope="col">Status</th>
                                <th scope="col">Processed Date</th>
								<th scope="col">Manage</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($GetDocID as $docid){?>                           						
                                <tr>
								<th scope="row">
									<?php echo $i; ?>
								</th>
								<td>
									<?php echo ($docid->DocTypeID==1?'คำร้องขอทำบัตรนักศึกษาชั่วคราว':($docid->DocTypeID==2?'คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล':($docid->DocTypeID==3?'คำร้องขอสำเร็จการศึกษา':'')));?>
								</td>
								<td>
									<?php echo $docid->CreatedDate ?>
								</td>
								<td class="<?php echo ($docid->OfficerCommentID == '1') ? 'text-primary' : ($docid->OfficerCommentID == '2'?'text-danger':'text-info');?>">
                                <?php echo ($docid->OfficerCommentID == '1') ? 'Approved' : ($docid->OfficerCommentID == '2'?'Disapproved':'Waiting');?>
                                </td>
                                <td>
									<?php echo $docid->OfficerCommentedDate ?>
								</td>
                                <?php
                                $linkpage="";
                                $visible="";
                                if($docid->OfficerCommentID == '0')
                                {
                                    $linkpage="FormControl/editReq?docID=".$docid->DocID;
                                    $visible="width:30px;";
                                } 
                                else
                                {
                                    $linkpage='FormControl/AllowedStdView?docID='.$docid->DocID.'&stdID='.$docid->StudentID.'&doctypeID='.$docid->DocTypeID;
                                    $visible="display: none;";
                                }
                                ?>
								<td><a href="<?php echo base_url($linkpage);?>"><img id="Image1" src="../assets/images/view.png"
										 style="width:30px;" /></a>
									<a href="<?php echo base_url('FormControl/delReq?docID='.$docid->DocID);?>" onclick="return confirm('ยืนยันที่จะลบรายการนี้?');"><img
										 id="Image1" src="../assets/images/trash.png" style="<?php echo $visible;?>" /></a></td>
							</tr>

							<?php $i++;}?>
						</tbody>
					</table>
				</div>
			</div>
	</div>
</body>

</html>