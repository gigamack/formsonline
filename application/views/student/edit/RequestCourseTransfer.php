<?php
$StudentID = $UserInfo->ID;
$FullnameThai = $UserInfo->Fullname;
$FacultyNameThai = $UserInfo->Faculty;
$MajorNameThai = $UserInfo->Major;
$StudyLevel = $UserInfo->StudyLevel;
?>
<script>
    var courseSubject = [];
    $(document).ready(function() {
        getSubjectRequest()
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

        //var courseSubject = [];
        var courseSubjectIndex = 0;

        $('#btnAddSubject').click(function(event) {
            event.preventDefault()
            var empty = $(".add-subject").filter(function() {
                return this.value === "";
            });

            if (empty.length) {
                alert("Please fill all add subject fields.")
            } else {
                var courseRequestSubject = [];
                var txtCourseStudiedCode = $("#txtCourseStudiedCode").val()
                var txtCourseStudiedName = $("#txtCourseStudiedName").val()
                var txtCourseStudiedCredits = $("#txtCourseStudiedCredits").val()
                var txtCourseTransferCode = $("#txtCourseTransferCode").val()
                var txtCourseTransferName = $("#txtCourseTransferName").val()
                var txtCourseTransferCredits = $("#txtCourseTransferCredits").val()

                courseRequestSubject.push({
                    "txtCourseStudiedCode": txtCourseStudiedCode
                }, {
                    "txtCourseStudiedName": txtCourseStudiedName
                }, {
                    "txtCourseStudiedCredits": txtCourseStudiedCredits
                }, {
                    "txtCourseTransferCode": txtCourseTransferCode
                }, {
                    "txtCourseTransferName": txtCourseTransferName
                }, {
                    "txtCourseTransferCredits": txtCourseTransferCredits
                })

                courseSubject.push(courseRequestSubject)
                $("#tblCoursesTransfer > tbody:last-child").append("<tr id='" + courseSubjectIndex + "'>" +
                    "<td>" + courseRequestSubject[0].txtCourseStudiedCode + "</td>" +
                    "<td>" + courseRequestSubject[1].txtCourseStudiedName + "</td>" +
                    "<td>" + courseRequestSubject[2].txtCourseStudiedCredits + "</td>" +
                    "<td>" + courseRequestSubject[3].txtCourseTransferCode + "</td>" +
                    "<td>" + courseRequestSubject[4].txtCourseTransferName + "</td>" +
                    "<td>" + courseRequestSubject[5].txtCourseTransferCredits + "</td>" +
                    "<td><button id='" + courseSubjectIndex + "' class='btn btn-danger btn-delete-subject'>Delete</button></td>" +
                    "</tr>")

                $("#CoursesTransfer").val(JSON.stringify(courseSubject))

                $("#" + courseSubjectIndex).click(function(event) {
                    event.preventDefault()
                    courseSubject.splice($(this).attr('id'), 1);
                    $("#" + $(this).attr('id')).remove();
                    console.log(courseSubject)
                    $("#CoursesTransfer").val(JSON.stringify(courseSubject))
                })
                courseSubjectIndex++;

                $(".add-subject").each(function() {
                    $(this).val("")
                })

                console.log($("#CoursesTransfer").val())
            }
        })

        $("#btnClear").click(function() {
            $(".add-subject").each(function() {
                $(this).val("")
            })
        })

        $("#btnUpdate").click(function(event) {
            //event.preventDefault()
            if ($("#MobileNumber").val() == "") {
                alert("Pleasr add your mobile number.")
                $("#MobileNumber").focus()
                return false
            }
            if ($("input[name=RequestForItem]:checked").val() === undefined) {
                alert("Please select your request")
                $("input[name=RequestForItem]").focus()
                return false
            }
            if (courseSubject.length == 0) {
                alert("Pleasr add your Courses for request.")
                $("#txtCourseStudiedCode").focus()
                return false
            }
            if ($("input[name=ReasonForRequest]:checked").val() === undefined) {
                alert("Please select your reason for request")
                $("#AdmissionToUniversity").focus()
                return false
            }
        })
        $("#btnBacktoDashboard").click(function(event) {
            event.preventDefault()
            window.location.href = "<?php echo base_url() ?>dashboard"
        })

        $('input:radio[name="RequestForItem"]').filter('[value="<?php echo $TransferSubject[0]->RequestForID ?>"]').click();
        $('input:radio[name="ReasonForRequest"]').filter('[value="<?php echo $TransferSubject[0]->ReasonForID ?>"]').click();

    })

    function getSubjectRequest() {

        var SubjectAmount = "<?php echo sizeof($TransferSubjectRequest) ?>"
        var Subjects = <?php echo json_encode($TransferSubjectRequest) ?>;
        var courseSubjectIndex = 0;
        for (i = 0; i < SubjectAmount; i++) {
            //console.log(Subjects[i]["SubjectIDFrom"])
            var courseRequestSubject = [];
            courseRequestSubject.push({
                "txtCourseStudiedCode": Subjects[i]["SubjectIDFrom"]
            }, {
                "txtCourseStudiedName": Subjects[i]["SubjectNameFrom"]
            }, {
                "txtCourseStudiedCredits": Subjects[i]["CreditsFrom"]
            }, {
                "txtCourseTransferCode": Subjects[i]["SubjectIDTo"]
            }, {
                "txtCourseTransferName": Subjects[i]["SubjectNameTo"]
            }, {
                "txtCourseTransferCredits": Subjects[i]["CreditsTo"]
            })
            courseSubject.push(courseRequestSubject)

            $("#tblCoursesTransfer > tbody:last-child").append("<tr id='" + courseSubjectIndex + "'>" +
                "<td>" + courseRequestSubject[0].txtCourseStudiedCode + "</td>" +
                "<td>" + courseRequestSubject[1].txtCourseStudiedName + "</td>" +
                "<td>" + courseRequestSubject[2].txtCourseStudiedCredits + "</td>" +
                "<td>" + courseRequestSubject[3].txtCourseTransferCode + "</td>" +
                "<td>" + courseRequestSubject[4].txtCourseTransferName + "</td>" +
                "<td>" + courseRequestSubject[5].txtCourseTransferCredits + "</td>" +
                "<td><button id='" + courseSubjectIndex + "' class='btn btn-danger btn-delete-subject'>Delete</button></td>" +
                "</tr>")

            $("#CoursesTransfer").val(JSON.stringify(courseSubject))

            $("#" + courseSubjectIndex).click(function(event) {
                event.preventDefault()
                courseSubject.splice($(this).attr('id'), 1);
                $("#" + $(this).attr('id')).remove();
                console.log(courseSubject)
                $("#CoursesTransfer").val(JSON.stringify(courseSubject))
            })
            courseSubjectIndex++;

            $(".add-subject").each(function() {
                $(this).val("")
            })
        }
    }
</script>
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class='mt-4'>
                <div class='card'>
                    <div class='card-header bg-success text-light'>
                        <h5>Requisition for Course(s) Transfer/Equivalence</h5>
                        <h6 class="text-minor">คำร้องขอเทียบโอน/รับโอนรายวิชา</h6>
                    </div>
                    <div class='card-body'>
                        <form method="post" action="<?php echo base_url("form/requestcoursetransfer/update/" . $Document[0]->DocumentID); ?>" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header">
                                            Personel Information
                                        </div>
                                        <div class="card-body">
                                            <div class='row'>
                                                <div class='col-md'>
                                                    <div class='form-group'>
                                                        <label for="">Student ID : <small class="sub">รหัสนักศึกษา</small><?php echo $StudentID ?></label>
                                                        <input type="hidden" name="StudentID" value="<?php echo $StudentID ?>">
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
                                                            <input type="text" class='form-control' name="MobileNumber" id='MobileNumber' placeholder='Mobile Number' value="<?php echo $Document[0]->tel ?>">
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
                                                                    <input type="text" value="<?php echo $TransferSubject[0]->RequestForOther ?>" name='txtRequestForItemOT' class='form-control' placeholder="Other">
                                                                </div>
                                                            </div>
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
                                    <div id="divCourseForRequest" class='card'>
                                        <div class='card-header'>
                                            Courses for request / รายวิชาที่จะขอ
                                        </div>
                                        <div class='card-body'>
                                            <div class='form-group row'>
                                                <label for="staticEmail" class="col-md-3">Course have been studied<small class='sub'>รายวิชาที่ได้ศึกษามาแล้ว</small></label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control add-subject" id="txtCourseStudiedCode" placeholder="Subject Codes / รหัสรายวิชา">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control add-subject" id="txtCourseStudiedName" placeholder="Subject Name / ชื่อรายวิชา">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control add-subject" id="txtCourseStudiedCredits" placeholder="Credits / จำนวนหน่วยกิต">
                                                </div>
                                            </div>
                                            <div class='form-group row'>
                                                <label for="staticEmail" class="col-md-3">Course to equivalence/transfer<small class='sub'>รายวิชาที่จะขอเทียบโอน</small></label>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control add-subject" id="txtCourseTransferCode" placeholder="Subject Codes / รหัสรายวิชา">
                                                </div>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control add-subject" id="txtCourseTransferName" placeholder="Subject Name / ชื่อรายวิชา">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control add-subject" id="txtCourseTransferCredits" placeholder="Credits / จำนวนหน่วยกิต">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md">
                                                    <div class='float-right'>
                                                        <button id='btnAddSubject' class='btn btn-success mr-1'>Add Subject</button>
                                                        <button id='btnClear' class='btn btn-primary'>Clear</button>
                                                    </div>
                                                </div>

                                            </div>

                                            <input type="hidden" name="CoursesTransfer" id="CoursesTransfer" value="" />
                                            <div class="row">
                                                <div class="col-md">
                                                    <table id="tblCoursesTransfer" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <td colspan="3">
                                                                    รายวิชาที่ได้ศึกษามาแล้ว(ไม่ตรงตามหลักสูตร) /Course have been studied
                                                                </td>
                                                                <td colspan="3">
                                                                    Course to equivalence/transfer
                                                                </td>
                                                                <td rowspan="2" class="align-middle">
                                                                    Manage
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="width: 10%">
                                                                    Codes
                                                                </td>
                                                                <td>
                                                                    Name
                                                                </td>
                                                                <td>
                                                                    Credits
                                                                </td>
                                                                <td style="width: 10%">
                                                                    Codes
                                                                </td>
                                                                <td>
                                                                    Name
                                                                </td>
                                                                <td>
                                                                    Credits
                                                                </td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
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
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='1' ? $TransferSubject[0]->ReasonFor1 : '') ?>" class="form-control" name="txtAdmissionToUniversity" id="txtAdmissionToUniversity" placeholder="semester/year">
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
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='2' ? $TransferSubject[0]->ReasonFor1 : '') ?>" class="form-control" name="txtApproveMoveFromFieldStudyFrom" id="txtApproveMoveFromFieldStudyFrom" placeholder="from the field of study">
                                                        </div>

                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md'>
                                                            <label for="">To The Field of Study :</label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='2' ? $TransferSubject[0]->ReasonFor2 : '') ?>" class="form-control" name="txtApproveMoveFromFieldStudyTo" id="txtApproveMoveFromFieldStudyTo" placeholder="to the field of study">
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-2'>
                                                            <label for="">From Semester / Year : </label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='2' ? $TransferSubject[0]->ReasonFor2 : '') ?>" class="form-control" name="txtApproveMoveFromFieldStudyYear" id="txtApproveMoveFromFieldStudyYear" placeholder="from semester/year">
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
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='3' ? $TransferSubject[0]->ReasonFor1 : '') ?>" class="form-control" name="txtApproveMoveFromFacultyFrom" id="txtApproveMoveFromFacultyFrom" placeholder="from the faculty / college">
                                                        </div>

                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md'>
                                                            <label for="">To Faculty :</label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='3' ? $TransferSubject[0]->ReasonFor2 : '') ?>" class="form-control" name="txtApproveMoveFromFacultyTo" id="txtApproveMoveFromFacultyTo" placeholder="to the faculty / college">
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-2'>
                                                            <label for="">From Semester / Year</label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='3' ? $TransferSubject[0]->ReasonFor3 : '') ?>" class="form-control" name="txtApproveMoveFromFacultyYear" id="txtApproveMoveFromFacultyYear" placeholder="from semester/year">
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
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='4' ? $TransferSubject[0]->ReasonFor1 : '') ?>" class="form-control" name="txtApproveMoveFromUniversityFrom" id="txtApproveMoveFromUniversityFrom" placeholder="from the university">
                                                        </div>

                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md'>
                                                            <label for="">To University : </label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='4' ? $TransferSubject[0]->ReasonFor2 : '') ?>" class="form-control" readonly name="txtApproveMoveFromUniversityTo" id="txtApproveMoveFromUniversityTo" placeholder="to the university" value='มหาวิทยาลัยสงขลานครินทร์'>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-md-2'>
                                                            <label for="">From Semester / Year : </label>
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='4' ? $TransferSubject[0]->ReasonFor3 : '') ?>" class="form-control" name="txtApproveMoveFromUniversityYear" id="txtApproveMoveFromUniversityYear" placeholder="from semester/year">
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
                                                            <input type="text" value="<?php echo ($TransferSubject[0]->ReasonForID=='5' ? $TransferSubject[0]->ReasonFor1 : '') ?>" class="form-control" name="txtOther" id="txtOther" id="txtOther" placeholder="Other">
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
                                            <div class="row">
                                                <div class="col-md">
                                                    <?php if (!empty($Document[0]->stdFile1)) { ?>
                                                        <input type="hidden" name="oldfilename" value="<?php echo $Document[0]->stdFile1 ?>" />
                                                        <a class="btn btn-link btn-lg" target="_blank" href="<?php echo base_url("uploads/" . $Document[0]->stdFile1) ?>" role="button"><b>1. Attached File </b></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
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
                                    <button name='btnUpdate' id='btnUpdate' class='btn btn-success'>Update</button>
                                    <button id="btnBacktoDashboard" type="button" class="btn btn-success">Back</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>