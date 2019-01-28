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
            $GetDocID = $docList;
    ?>
	<script>
		function clickAlert() {
            alert("Alert!");
        }
    </script>
	<div class="container Chuanpim" id="ResultList">
        <form action="#">
        <div class="card" style="margin: 20px auto auto auto">
            <h5 class="card-header bg-primary text-light Stidti">เพิ่มคำร้อง</h5>
            <div class = "row" style="margin: 20px auto auto auto">
                <div class = "col-mb-6">
                    <select class="custom-select custom-select-lg">
                        <option selected>เลือกคำร้องที่ต้องการเพิ่ม</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class = "col-mb-2"> 
                  <button type="submit" class="btn btn-lg btn-success">Submit</button>  
                </div>  
            </div>            
        </div>
        </form>
			<div class="card" style="margin: 20px auto auto auto">
				<h5 class="card-header bg-primary text-light Stidti">
					รายการคำร้อง
				</h5>
				<div class="card-body">
					<table id="unfinishedReq" class="table table-hove">
						<thead>
							<tr class="">
								<th scope="col">#</th>
								<th scope="col">ประเภทคำร้อง</th>
								<th scope="col">วันที่สร้างคำร้อง</th>
								<th scope="col">สถานะคำร้อง</th>
                                <th scope="col">วันที่ดำเนินการ</th>
								<th scope="col">จัดการ</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;?>
							<?php foreach($GetDocID as $docid){?>                           						
                                <tr class="<?php echo ($docid->OfficerCommentID == '1') ? 'bg-primary' : ($docid->OfficerCommentID == '2'?'bg-danger':'bg-warning');?>">
								<th scope="row">
									<?php echo $i; ?>
								</th>
								<td>
									<?php echo ($docid->DocTypeID==1?'คำร้องขอทำบัตรนักศึกษาชั่วคราว':($docid->DocTypeID==2?'คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล':($docid->DocTypeID==3?'คำร้องขอสำเร็จการศึกษา':'')));?>
								</td>
								<td>
									<?php echo $docid->CreatedDate ?>
								</td>
								<td>
                                <?php echo ($docid->OfficerCommentID == '1') ? 'เห็นชอบ' : ($docid->OfficerCommentID == '2'?'ไม่เห็นชอบ':'รอการตรวจสอบ');?>
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
