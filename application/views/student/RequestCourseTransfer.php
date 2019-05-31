<?php
//print_r($_SESSION['userSession']);

// echo "<br/><br/>";
$StudentInfo = $_SESSION['userSession']['StudentInfo'];
$StudentID = $StudentInfo['STUDENT_ID'];
$FullnameThai = $StudentInfo['TITLE_NAME_THAI'] . $StudentInfo['STUD_NAME_THAI'] . ' ' . $StudentInfo['STUD_SNAME_THAI'];
$FacultyNameThai = $StudentInfo['FAC_NAME_THAI'];
$MajorNameThai = $StudentInfo['MAJOR_NAME_THAI'];

$StudyLevel = $StudentInfo['STUDY_LEVEL_ID'];
switch ($StudentInfo['STUDY_LEVEL_ID']) {
    case '06':
        $StudyLevel = 'ปริญญาตรี';
        break;
    default:
        break;
}

//print_r($StudentInfo);

// echo "<br/><br/>";
// echo $StudentInfo['STUDENT_ID'] . "<br/>";
// echo $StudentInfo['TITLE_NAME_THAI'] . "<br/>";
// echo $StudentInfo['STUD_NAME_THAI'] . "<br/>";
// echo $StudentInfo['STUD_SNAME_THAI'] . "<br/>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Requisition for Course(s) Transfer/Equivalence</title>

    <script>
        $(document).ready(function() {
            $('input[name=txtRequestForItemOT]').hide()
            $('input[name=RequestForItem]').on('change', function() {
                if ($('input[name=RequestForItem]:checked').val() == 2) {
                    $('input[name=txtRequestForItemOT]').show()
                } else {
                    $('input[name=txtRequestForItemOT]').hide()
                    $('input[name=txtRequestForItemOT]').val('')
                }
            })
            $('input[name=ReasonForRequest').on('change', function() {
                switch ($(this).val()) {
                    case '1':
                        $('#divAdmissionToUniversity').show()
                        $('#divFieldStudy').hide()
                        $('#divMoveFaculty').hide()
                        $('#divMoveUniversity').hide()
                        $('#divOther').hide()
                        break
                    case '2':
                        $('#divAdmissionToUniversity').hide()
                        $('#divFieldStudy').show()
                        $('#divMoveFaculty').hide()
                        $('#divMoveUniversity').hide()
                        $('#divOther').hide()
                        break
                    case '3':
                        $('#divAdmissionToUniversity').hide()
                        $('#divFieldStudy').hide()
                        $('#divMoveFaculty').show()
                        $('#divMoveUniversity').hide()
                        $('#divOther').hide()
                        break
                    case '4':
                        $('#divAdmissionToUniversity').hide()
                        $('#divFieldStudy').hide()
                        $('#divMoveFaculty').hide()
                        $('#divMoveUniversity').show()
                        $('#divOther').hide()
                        break
                    case '5':
                        $('#divAdmissionToUniversity').hide()
                        $('#divFieldStudy').hide()
                        $('#divMoveFaculty').hide()
                        $('#divMoveUniversity').hide()
                        $('#divOther').show()
                        break
                }
            })

            $('#btnClear').click(function(event) {
                event.preventDefault();
                $('#txtCourseStudied').val('')
                $('#txtCourseTransfer').val('')
            })
            $('#btnAddSubject').click(function(event) {
                event.preventDefault()
                alert('Add Subject')
            })
        })
    </script>
</head>

<body>
    <div class='mt-4'>
        <div class='card'>
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
                                <label for="">Student ID : <small class="sub">รหัสนักศึกษา</small><?php echo $StudentID ?></label>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Fullname : <small class="sub">ชื่อ - นามสกุล</small><?php echo $FullnameThai ?></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Faculty : <small class="sub">คณะ</small><?php echo $FacultyNameThai ?></label>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Major : <small class="sub">สาขา</small><?php echo $MajorNameThai ?></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-row'>
                                <label class='col-md-3' for="mobilenumber">Mobile Number : <small class="sub">หมายเลขโทรศัพท์มือถือ</small></label>
                                <div class='col-md-8'>
                                    <input type="text" class='form-control' id='txtMobileNumber' placeholder='Mobile Number'>
                                </div>
                            </div>
                        </div>
                        <div class='col-md'>
                            <div class='form-group'>
                                <label for="">Study Level : <small class="sub">ระดับการศึกษา</small><?php echo $StudyLevel ?></label>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='form-row'>
                                <label class='col-md-2' for="mobilenumber">Request for : <small class="sub">ยื่นคำร้องเพื่อ</small></label>
                                <div class='col-md-10'>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemCE' value='0'>
                                        <label for="RequestForItemCE">Course(s) Equivaience <small class='sub'>ขอเทียบโอนรายวิชา</small></label>
                                    </div>
                                    <div class='form-check form-check-inline'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemCT' value='1'>
                                        <label for="RequestForItemCT">Course(s) Transfer<small class='sub'>ขอรับโอนรายวิชา</small></label>
                                    </div>
                                    <div class='form-check form-check-inline col-md-6'>
                                        <input class='form-check-input' type="radio" name='RequestForItem' id='RequestForItemOT' value='2'>
                                        <label class='' for="RequestForItemOT">Other<small class='sub'>อื่น ๆ</small></label>
                                        <div class='col-md-12'>
                                            <input type="text" name='txtRequestForItemOT' class='form-control' placeholder="Other">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='card'>
                                <div class='card-header'>
                                    Courses for request / รายวิชาที่จะขอ
                                </div>
                                <div class='card-body'>
                                    <div class='form-group row'>
                                        <label for="staticEmail" class="col-md-3">Course have been studied<small class='sub'>รายวิชาที่ได้ศึกษามาแล้ว</small></label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" id="txtCourseStudiedCode" placeholder="Subject Codes / รหัสรายวิชา">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="txtCourseStudiedName" placeholder="Subject Name / ชื่อรายวิชา">
                                        </div>
                                    </div>
                                    <div class='form-group row'>
                                        <label for="staticEmail" class="col-md-3">Course to equivalence/transfer<small class='sub'>รายวิชาที่จะขอเทียบโอน</small></label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" id="txtCourseTransferCode" placeholder="Subject Codes / รหัสรายวิชา">
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" class="form-control" id="txtCourseTransferName" placeholder="Subject Name / ชื่อรายวิชา">
                                        </div>
                                    </div>
                                    <div class='float-right'>
                                        <button id='btnAddSubject' class='btn btn-success mr-1'>Add Subject</button>
                                        <button id='btnClear' class='btn btn-primary'>Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='card'>
                                <div class='card-header'>
                                    Reason for request / เนื่องจาก (เหตุผล)
                                </div>
                                <div class='card-body'>
                                    <div class='form-group'>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ReasonForRequest" id="AdmissionToUniversity" value="1">
                                            <label for="AdmissionToUniversity">Admission to the university in the semester/year
                                                <small class='sub'>สอบคัดเลือกเข้ามหาวิทยาลัยสงขลานครินทร์ได้ ตั้งแต่ภาคการศึกษาที่</small></label>
                                        </div>
                                        <div class='form-check' id='divAdmissionToUniversity' style="display:none">
                                            <div class='row'>
                                                <div class='col-md-2'>
                                                    <label for="">From Semester / Year : </label>
                                                    <input type="text" class="form-control" id="txtAdmissionToUniversity" placeholder="semester/year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ReasonForRequest" id="ApproveMoveFromFieldStudy" value="2">
                                            <label for="AdmissionToUniversity">Approval to move from the field of study
                                                <small class='sub'>ได้รับอนุมัติให้ย้ายประเภทวิชา / สาขาวิชา</small></label>
                                        </div>
                                        <div class='form-check' id='divFieldStudy' style="display:none">
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for="">From The Field of Study :</label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFieldStudyFrom" placeholder="from the field of study">
                                                </div>

                                            </div>
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for="">To The Field of Study :</label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFieldStudyTo" placeholder="to the field of study">
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'>
                                                    <label for="">From Semester / Year : </label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFieldStudyYear" placeholder="from semester/year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ReasonForRequest" id="ApproveMoveFromFaculty" value="3">
                                            <label for="AdmissionToUniversity">Approval to move from the faculty/college
                                                <small class='sub'>ได้รับอนุมัติให้ย้ายคณะ / วิทยาลัย</small></label>
                                        </div>
                                        <div class='form-check' id='divMoveFaculty' style="display:none">
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for=""> From Faculty : </label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFacultyFrom" placeholder="from the faculty / college">
                                                </div>

                                            </div>
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for="">To Faculty :</label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFacultyTo" placeholder="to the faculty / college">
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'>
                                                    <label for="">From Semester / Year</label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromFacultyYear" placeholder="from semester/year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ReasonForRequest" id="ApproveMoveFromUniversity" value="4">
                                            <label for="AdmissionToUniversity">Approval to move from the university
                                                <small class='sub'>ได้รับอนุมัติให้ย้ายมหาวิทยาลัย</small></label>
                                        </div>
                                        <div class='form-check' id='divMoveUniversity' style="display:none">
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for="">From Univeristy : </label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromUniversityFrom" placeholder="from the university">
                                                </div>

                                            </div>
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <label for="">To University : </label>
                                                    <input type="text" class="form-control" readonly id="txtApproveMoveFromUniversityTo" placeholder="to the university" value='มหาวิทยาลัยสงขลานครินทร์'>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-2'>
                                                    <label for="">From Semester / Year : </label>
                                                    <input type="text" class="form-control" id="txtApproveMoveFromUniversityYear" placeholder="from semester/year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ReasonForRequest" id="ReasonOther" value="5">
                                            <label for="AdmissionToUniversity">Other
                                                <small class='sub'>อื่น ๆ </small></label>
                                        </div>
                                        <div class='form-check' id='divOther' style="display:none">
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <input type="text" class="form-control" id="txtOther" placeholder="Other">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md'>
                            <div class='card'>
                                <div class='card-header'>
                                    Attachment / เอกสารที่แนบมาด้วย
                                </div>
                                <div class='card-body'>
                                    <div class='row'>
                                        <div class='col-md'>
                                            <div class='form-group'>
                                                <input name='fileAttachment' id='fileAttachment' type="file" class='form-control'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='mx-auto'>
                            <button name='btnSendRequest' id='btnSendRequest' class='btn btn-success'>Send Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>