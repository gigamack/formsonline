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
            //print_r($_SESSION['userSession'][0]);
            $GetDocID = $docList;
?>
<div class="container Chuanpim" id="ResultList">
<div class="row mt-2">
			<div class="col">
				<button class="btn btn-primary btn-lg btn-block mt-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample1"
				 aria-expanded="true" aria-controls="multiCollapseExample1">รายการคำร้องรอพิจารณา</button>

			</div>
			<div class="col">
				<button class="btn btn-success btn-lg btn-block mt-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample2"
				 aria-expanded="false" aria-controls="multiCollapseExample2">รายการคำร้องที่พิจารณาแล้ว</button>
			</div>
</div>

    <div class="collapse show" id="multiCollapseExample1" data-parent="#ResultList">
        <div class="card" style="margin: 20px auto auto auto">
            <div class="card-header bg-primary text-light Stidti">
                <h3>รายการคำร้องรอพิจารณา</h3>
            </div>
            <div class="card-body">
            <table id="unfinishedReq" class="table table-sm Chuanpimsmall">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">#</th>
                        <th scope="col">ประเภทคำร้อง</th>
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
                        <td>คำร้องขอทำบัตรนักศึกษาชั่วคราว</td>
                        <td><?php echo $docid->CreatedDate ?></td>
                        <td>รอการตรวจสอบ</td>
                        <td><a href="<?php echo base_url('FormControl/editReq?docID='.$docid->DocID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a>
                        <a href="<?php echo base_url('FormControl/delReq?docID='.$docid->DocID);?>"><img id="Image1" src="../assets/images/trash.png" style="width:30px;"/></a></td>
                    </tr>

                    <?php $i++;}}?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="collapse " id="multiCollapseExample2" data-parent="#ResultList">
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
                        <th scope="col">วันที่ดำเนินการ</th>
                        <th scope="col">รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1;?>
                <?php foreach($docList2 as $docid){?>
                    <?php if($docid->stateID != "t01s01"){ ?>
                    <tr class ="table-warning">
                        <th scope="row"><?php echo $i; ?></th>
                        <td>คำร้องขอทำบัตรนักศึกษาชั่วคราว</td>                    
                        <td><?php echo ($docid->OfficerCommentID == '1') ? 'เห็นชอบ' : 'ไม่เห็นชอบ';?></td>
                        <td><?php echo $docid->OfficerCommentedDate ?></td>
                        <td><a href="<?php echo base_url('FormControl/stdCardAllowedStdView?docID='.$docid->DocID.'&stdID='.$docid->StudentID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a>
                    </tr>
                    <?php $i++;}}?>
                </tbody>
            </table>
            </div>
        </div>  
    </div>
</div>
</body>
</html>