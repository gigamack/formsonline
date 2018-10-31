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
<div class="container Chuanpim" >
<form style="margin: 20px auto auto auto">
    <div class="card">
        <div class="card-header bg-info text-light Stidti">
            <h3>รายการคำร้องรอพิจารณา</h3>
        </div>
        <div class="card-body">
        <table id="unfinishedReq" class="table table-sm Chuanpimsmall">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">ประเภทคำร้อง</th>
                    <th scope="col">สถานะคำร้อง</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1;?>
            <?php foreach($GetDocID as $docid){?>
                <tr class ="table-warning">
                    <th scope="row"><?php echo $i; ?></th>
                    <td>คำร้องขอทำบัตรนักศึกษาชั่วคราว</td>
                    <td>รอการตรวจสอบ</td>
                    <td><a href="<?php echo base_url('formControl/editReq?docID='.$docid->DocID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a>
                    <a href="<?php echo base_url('formControl/delReq?docID='.$docid->DocID);?>"><img id="Image1" src="../assets/images/trash.png" style="width:30px;"/></a></td>
                </tr>
            <?php $i++;}?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="card" style="margin: 20px auto auto auto">
        <div class="card-header bg-success text-light Stidti">
            <h3>รายการคำร้องที่พิจารณาแล้ว</h3>
        </div>
        <div class="card-body">
        <table id="finishedReq" class="table table-sm Chuanpimsmall">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">ประเภทคำร้อง</th>
                    <th scope="col">สถานะคำร้อง</th>
                    <th scope="col">ตรวจสอบโดย</th>
                </tr>
            </thead>
            <tbody>
                <tr class ="table-warning">
                    <th scope="row">1</th>
                    <td>คำร้องขอทำบัตรนักศึกษาชั่วคราว</td>
                    <td>รอการตรวจสอบ</td>
                    <td>นาง ข</td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>  
</div>
</form>
</body>
</html>