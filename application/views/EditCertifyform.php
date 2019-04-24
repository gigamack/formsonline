<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>	
	<!-- <script>
		$(document).ready(function()
		{
		// $( "input[name^='en']").each(function(){
		// 	console.log($(this).val());
		// });	


		$("#certForm").submit(function(){
			var total = 0;
			$( "input[name^='amount_']").each(function(){
				total += $(this).val() << 0;
			});
			// for (var i = 0; i < $( "input[name^='en']").length; i++) 
			// {
    		// 	total += someArray[i] << 0;
			// }
			if(total<=0)
			{
				alert("you select " + total + " form");
				return false;
			}		
			
	});
		
		});
	</script> -->
	<style>
	@media print {
    #with_print {
        display: none;
    }
}
	</style>
</head>
	<?php
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
	$fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
	$fullnameeng=$_SESSION['userSession']['StudentInfo']['STUD_NAME_ENG'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_ENG'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
	$majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
	$dob=$_SESSION['userSession']['StudentInfo']['STUD_BIRTH_DATE'];
	$citizenid=$_SESSION['userSession']['StudentInfo']['CITIZEN_ID'];
	$getDocInfo = $certDetail;
	$docDetail = $docInfo;
	// print_r($docDetail);

?>
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
							<label><?php echo $studentid;?></label>
						</div>
						<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid?>" />				
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
								<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์ที่ติดต่อได้ :</label>
						</div>
						<div class="col-md-3">
						<label class="font-weight-bold" name="tel" id="tel"><h5><?php echo $docDetail[0]['tel']; ?></h5></label>
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
					for ($i = 0; $i < $n; $i++)
					{ 
					?>
					<div class="row">
					<div class="col-sm-6">
							<label class="font-weight-bold"> <?php echo $getDocInfo[$i]['certNameTH']?> </label>								
								<label name="price_u1">ราคาใบละ <?php echo $getDocInfo[$i]['certPrice']?></label>
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
									<label class="font-weight-bold">ค่าใช้จ่าย <?php echo $getDocInfo[$i]['totalcertPrice'] ?></label>
									</div>
									<?php $sum = $sum+$getDocInfo[$i]['totalcertPrice']; ?>
								</div>
							</div>					
					</div>
					<?php } ?>
					<div class="row">
						<label class="font-weight-bold">ราคารวม <?php echo $sum; ?></label>
					</div>
					<div class="row">	
							<!-- <div class="col-1">
							<input type="checkbox" id="sendems" name="sendems"/>
							</div>						 -->
							<div class="col">
							<input type="checkbox" id="sendems" name="sendems"/>							
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
						<div class="col" id="with_print">
							<div class="form-group">
								<input type="hidden" id="DocTypeID" name="DocTypeID" value="6" />
								<input type="hidden" id="stateID" name="stateID" value="t06s01" />
								<button onclick="window.print()">Print</button>
								<button type="submit" class="btn btn-success">Back</button>
								
							</div>
						</div>
					</div>
				</div>
			</div>			
		</form>	