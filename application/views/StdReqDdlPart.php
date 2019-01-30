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
            <h5 class="card-header bg-primary text-light Stidti">เพิ่มคำร้อง</h5>
            <div class = "row" style="margin: 20px auto auto auto">
                <div class = "col-mb-6">
                    <select class="custom-select custom-select-lg" id="formselect" name="formselect">
                        <option value="#">เลือกคำร้องที่ต้องการเพิ่ม</option>
                        <option value="1" <?php if($_SESSION["ddlchosen"]=='1') echo 'selected="selected"';?>>คำร้องขอบัตรนักศึกษาชั่วคราว</option>
                        <option value="2" <?php if($_SESSION["ddlchosen"]=='2') echo 'selected="selected"';?>>คำร้องขอเปลี่ยนชื่อสกุล</option>
                        <option value="3" <?php if($_SESSION["ddlchosen"]=='3') echo 'selected="selected"';?>>คำร้องขอสำเร็จการศึกษา</option>
                    </select>
                </div>
                <div class = "col-mb-2"> 
                  <button type="submit" class="btn btn-lg btn-success">Submit</button>  
                </div>  
            </div>            
        </div>
        </form>
			