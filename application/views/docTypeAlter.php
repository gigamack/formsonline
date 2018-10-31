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
            $getDoctypeInfo = $doctypeInfo[0];
            //print_r($getDoctypeInfo->DoctypeID $getDoctypeInfo->DoctypeName);
?>
<form action="<?php echo base_url("/baseDataControl/updateDoctype") ?>" method="post">
<div class="container Chuanpim" >
<div class="form-group" style="margin: 20px auto auto auto">
<label for="docTypeName"><h4>ชื่อประเภทคำร้อง :</h4></label>
<input type="text" class="form-control mb-3 col-8" id="docTypeName" name="docTypeName" value="<?php echo  $getDoctypeInfo->DoctypeName; ?>" />
<input type="hidden" id="docTypeID" name="docTypeID" value="<?php echo $getDoctypeInfo->DoctypeID; ?>">
<button type="submit" class="btn btn-primary Chuanpim col-2"><h4>Submit</h4></button>
</div>
</div>
</form>
</body>
</html>