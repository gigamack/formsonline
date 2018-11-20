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
<form style="margin: 20px auto auto auto" action="<?php echo base_url("/formControl/stdCardAllow") ?>" method="post">
    <div class="card">
        <div class="card-header bg-info text-light Stidti">
            <h3>รายการคำร้องรอตรวจสอบ</h3>
        </div>
        <div class="card-body">
        <table id="unfinishedReq" class="table table-sm Chuanpimsmall">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">ประเภทคำร้อง</th>
                    <th scope="col">ผู้ยื่นคำร้อง</th>
                    <th scope="col">วันที่สร้างคำร้อง</th>
                    <th scope="col">สถานะคำร้อง</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>         
                <?php $i=1;?>
                <?php foreach($GetDocID as $docid){?>
                <?php if($docid->stateID == "t01s01"){ ?>
                <tr class ="table-warning">
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo ($docid->DocTypeID==1?'คำร้องขอทำบัตรนักศึกษาชั่วคราว':'');?></td>
                    <td><?php echo $docid->StudentID;?></td>
                    <td><?php echo $docid->CreatedDate;?></td>
                    <td>รอการตรวจสอบ</td>
                    <td><a href="<?php echo base_url('formControl/stdCardAllow?docID='.$docid->DocID.'&stdID='.$docid->StudentID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a></td>
                </tr>
                <?php $i++;}}?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="card" style="margin: 20px auto auto auto">
        <div class="card-header bg-success text-light Stidti">
            <h3>รายการคำร้องที่ตรวจสอบแล้ว</h3>
        </div>
        <div class="card-body">
        <table id="finishedReq" class="table table-sm Chuanpimsmall">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">ประเภทคำร้อง</th>
                    <th scope="col">ผู้ยื่นคำร้อง</th>
                    <th scope="col">วันที่จัดการคำร้อง</th>
                    <th scope="col">สถานะคำร้อง</th>
                    <th scope="col">รายละเอียด</th>
                </tr>
            </thead>
            <tbody>         
                <?php $i=1;?>
                <?php foreach($docList2 as $docid){?>
                <?php if($docid->stateID != "t01s01"){ ?>
                <tr class ="table-warning">
                    <th scope="row"><?php echo $i; ?></th>
                    <td><?php echo ($docid->DocTypeID==1?'คำร้องขอทำบัตรนักศึกษาชั่วคราว':'');?></td>
                    <td><?php echo $docid->StudentID;?></td>
                    <td><?php echo $docid->OfficerCommentedDate;?></td>
                    <td>รอการตรวจสอบ</td>
                    <td><a href="<?php echo base_url('formControl/stdCardAllowed?docID='.$docid->DocID.'&stdID='.$docid->StudentID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a></td>
                </tr>
                <?php $i++;}}?>
            </tbody>
            </tbody>
        </table>
        </div>
    </div>  
</div>
</form>
</body>
</html>