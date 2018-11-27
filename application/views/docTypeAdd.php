<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php echo base_url("/BaseDataControl/insertDocType") ?>" method="post">
<div class="container Chuanpim" >
<div class="form-group" style="margin: 20px auto auto auto">
<label for="docTypeName"><h4>ชื่อประเภทคำร้อง :</h4></label>
<input type="text" class="form-control mb-3 col-8" id="docTypeName" name="docTypeName" placeholder="ชื่อประเภทคำร้อง" />
<button type="submit" class="btn btn-primary Chuanpim col-2"><h4>Submit</h4></button>
</div>
</div>
</form>
</body>
</html>