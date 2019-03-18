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
            <h6 class="card-header bg-success Stidti">Add new request</h6>
            <div class = "row" style="margin: 20px auto auto auto">
                <div class = "col-mb-6 pb-3">
                    <select class="custom-select" id="formselect" name="formselect">
                        <option value="#">Choose the form ...</option>
                        <option value="1" <?php if($_SESSION["ddlchosen"]=='1') echo 'selected="selected"';?>>Requisition Form for temporary PSU Identification Card</option>
                        <option value="2" <?php if($_SESSION["ddlchosen"]=='2') echo 'selected="selected"';?>>Requisition Form for name or surname change</option>
                        <option value="3" <?php if($_SESSION["ddlchosen"]=='3') echo 'selected="selected"';?>>Requisition Form for Graduation</option>
                        <option value="4" <?php if($_SESSION["ddlchosen"]=='4') echo 'selected="selected"';?>>Requisition Form for Graduation (Graduated student)</option>
                        <option value="5" <?php if($_SESSION["ddlchosen"]=='5') echo 'selected="selected"';?>>Requisition Form for Graduation and Debt Investigation</option>
                        <option value="6" <?php if($_SESSION["ddlchosen"]=='6') echo 'selected="selected"';?>>Requisition form for Application of a certificate</option>
                    </select>
                </div>
                <div class = "col-mb-2"> 
                  <button type="submit" class="btn btn-success">Select</button>  
                </div>  
            </div>            
        </div>
    </form>
			