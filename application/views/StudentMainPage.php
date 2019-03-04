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
        <form action="<?php echo base_url("/FormControl/formcaller") ?>" method="post">
        <div class="card" style="margin: 20px auto auto auto">
            <h6 class="card-header bg-success text-light Stidti">Add new request</h6>
            <div class = "row" style="margin: 20px auto auto auto">
                <div class = "col-mb-6 pb-3">
					<select class="custom-select" id="formselect" name="formselect">
                        <option value="#">Choose the form ...</option>
                        <option value="1">Request Form for temporary PSU Identification Card</option>
                        <option value="2">Request Form for name or surname change</option>
                        <option value="3">Request Form for Graduation</option>
                        <option value="4">Request Form for Graduation and Debt Investigation</option>
                    </select>
                </div>
                <div class = "col-mb-2"> 
                  <button type="submit" class="btn btn-primary">Select</button>  
                </div>  
            </div>            
        </div>
        </form>
		
		<!-- below this line is form code -->
		
		<!-- <div class="card" style="margin: 20px auto auto auto">
				<h5 class="card-header bg-primary text-light Stidti">
					รายการคำร้อง
				</h5>
				<div class="card-body">

				</div>
		</div> -->
		<!-- above this line is form code -->

			<div class="card" style="margin: 20px auto auto auto">
				<h6 class="card-header bg-success text-light Stidti">
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
									//$linkpage="FormControl/editReq?docID=".$docid->DocID;
									$linkpage="FormControl/editRequest?docID=".$docid->DocID;
                                    $visible="width:30px;";
                                } 
                                else
                                {
                                    $linkpage='FormControl/AllowedStdView?docID='.$docid->DocID.'&stdID='.$docid->StudentID.'&doctypeID='.$docid->DocTypeID;
                                    $visible="display: none;";
                                }
                                ?>
								<td>	<div class="row">
								<!-- <a href="<?php echo base_url($linkpage);?>"><img id="Image1" src="../assets/images/view.png"
										 style="width:30px;" /></a> -->
										<div class="col">
										<a href="<?php echo base_url($linkpage);?>">Edit</a>	 
										</div>
									<!-- <a href="<?php echo base_url('FormControl/delReq?docID='.$docid->DocID);?>" onclick="return confirm('ยืนยันที่จะลบรายการนี้?');"><img
										 id="Image1" src="../assets/images/trash.png" style="<?php echo $visible;?>" /></a> -->
										 <div class="col">
										 <a href="<?php echo base_url('FormControl/delReq?docID='.$docid->DocID);?>" style="<?php echo $visible;?>" onclick="return confirm('Confirm to delete ?');">Delete</a>
										 </div>
										 </div>
								</td>
							</tr>

							<?php $i++;}?>
						</tbody>
					</table>
				</div>
			</div>
	</div>
</body>

</html>
