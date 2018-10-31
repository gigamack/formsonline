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
            $GetDocTypeList = $docList;
?>
<div class="container Chuanpim" >
<form style="margin: 20px auto auto auto">
    <div class="card">
        <div class="card-header bg-info text-light Stidti">
            <h3>รายการประเภทคำร้อง</h3>
        </div>
        <div class="card-body">
        <table id="unfinishedReq" class="table table-sm Chuanpimsmall">
            <thead>
                <tr class="bg-dark text-light">
                    <th scope="col">รหัสประเภทคำร้อง</th>
                    <th scope="col">ชือประเภทคำร้อง</th>
                    <th scope="col">จัดการ</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($GetDocTypeList as $docTypeList){?>
                <tr class ="table-warning">
                    <th scope="row"><?php echo $docTypeList->DoctypeID; ?></th>
                    <td><?php echo $docTypeList->DoctypeName; ?></td>
                    <td><a href="<?php echo base_url('baseDataControl/editDocType?doctypeID='.$docTypeList->DoctypeID);?>"><img id="Image1" src="../assets/images/view.png" style="width:30px;"/></a>
                    <a href="<?php echo base_url('baseDataControl/delDocType?doctypeID='.$docTypeList->DoctypeID);?>"><img id="Image1" src="../assets/images/trash.png" style="width:30px;"/></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</form>
</body>
</html>