<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requisition for Course(s) Transfer/Equivalence</title>
</head>

<body>
    <div class='mt-4'>
        <div class='card text-black bg-light'>
            <div class='card-header bg-success text-light'>
                <h5>Requisition for Course(s) Transfer/Equivalence</h5>
                <h6 class="text-minor">คำร้องขอเทียบโอน/รับโอนรายวิชา</h6>
            </div>
            <div class='card-body'>
                <form action="">
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Dear Registar <small class='sub'>เรียน นายทะเบียนกลาง</small></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Student ID : <small class="sub">รหัสนักศึกษา</small></label>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Fullname : <small class="sub">ชื่อ - นามสกุล</small></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Faculty : <small class="sub">คณะ</small></label>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Major : <small class="sub">สาขา</small></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-row'>
                                <label class='col-md-3' for="mobilenumber">Mobile Number : <small class="sub">หมายเลขโทรศัพท์มือถือ</small></label>
                                <div class='col-md-8'>
                                    <input type="text" class='form-control' id='mobilenumber' placeholder='Mobile Number'>
                                </div>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Study Level : <small class="sub">ระดับการศึกษา</small></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-row'>
                                <label class='col-md-2' for="mobilenumber">Request for : <small class="sub">ยื่นคำร้องเพื่อ</small></label>
                                <div class='col-md-10'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemCE'>
                                        <label for="">Course(s) Equivaience <small class='sub'>ขอเทียบโอนรายวิชา</small></label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemCT'>
                                        <label for="">Course(s) Transfer<small class='sub'>ขอรับโอนรายวิชา</small></label>
                                    </div>
                                    <div class='form-check form-check-inline col-md-6'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemOT'>
                                        <label class='' for="">Other<small class='sub'>อื่น ๆ</small></label>
                                        <div class='col-md-12'>
                                            <input type="text" class='form-control' placeholder="Other">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>