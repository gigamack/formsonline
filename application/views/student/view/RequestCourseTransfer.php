<?php
//print_r($TransferSubjectRequest);
?>
<div class='container form-view'>
    <div class='row'>
        <div class='col-md'>
            Dear Registrar
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <div class='tab'>
                <span>My name is </span>
                <span class='font-weight-bold'><?php echo ucwords(strtolower($Document->TitleFullnameEng)) ?></span>
                <span>Student ID</span>
                <span class='font-weight-bold'><?php echo $Document->StudentID ?></span>
                <span>Faculty</span>
                <span class='font-weight-bold'><?php echo ucwords(strtolower($Document->FacultyEng)) ?></span>
                <span>Major</span>
                <span class='font-weight-bold'><?php echo ucwords(strtolower($Document->MajorEng)) ?></span>
                <span class='font-weight-bold'><?php echo ucwords(strtolower("( " . $Document->StudyLevelEng . " )")) ?></span>
                <span>Telephone number</span>
                <span class='font-weight-bold'><?php echo ($Document->tel != "") ? $Document->tel : '-' ?></span>
            </div>
            <div class='tab'>
                <span>I would like to request for</span>
                <span class='font-weight-bold'><?php echo $TransferSubject->RequestNameEN ?></span>
                <span>due to</span>
                <?php switch ($TransferSubject->ReasonID) {
                    case "1":
                        echo "<span class='font-weight-bold'>$TransferSubject->ReasonNameEN</span>";
                        echo "<span> in the </span>";
                        echo "<span class='font-weight-bold'>$TransferSubject->ReasonFor1</span>";
                        echo "<span> (semester/year) </span>";
                        break;
                    case "2":
                        echo "<span class='font-weight-bold'>$TransferSubject->ReasonNameEN</span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor1 </span>";
                        echo "<span> to </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor2 </span>";
                        echo "<span> in the </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor3 </span>";
                        echo "<span> (semester/year) </span>";
                        break;
                    case "3":
                        echo "<span class='font-weight-bold'>$TransferSubject->ReasonNameEN</span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor1 </span>";
                        echo "<span> to </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor2 </span>";
                        echo "<span> in the </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor3 </span>";
                        echo "<span> (semester/year) </span>";
                        break;
                    case "4":
                        echo "<span class='font-weight-bold'>$TransferSubject->ReasonNameEN</span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor1 </span>";
                        echo "<span> to </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor2 </span>";
                        echo "<span> in the </span>";
                        echo "<span class='font-weight-bold'> $TransferSubject->ReasonFor3 </span>";
                        echo "<span> (semester/year) </span>";
                        break;
                    default:
                        break;
                } ?>
                <span> by the following detail : </span>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <input type="hidden" name="CoursesTransfer" id="CoursesTransfer" value="" />
            <div class="row">
                <div class="col-md">
                    <table id="tblCoursesTransfer" class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <span class='font-weight-bold'>Course have been studied</span>
                                </td>
                                <td colspan="3">
                                    <span class='font-weight-bold'>Course to equivalence/transfer</span>
                                </td>
                            </tr>
                            <tr>
                                <td class='font-weight-bold' style="width: 10%">
                                    Subject Codes
                                </td>
                                <td class='font-weight-bold'>
                                    Subject Name
                                </td>
                                <td class='font-weight-bold'>
                                    Credits
                                </td>
                                <td class='font-weight-bold' style="width: 10%">
                                    Subject Codes
                                </td>
                                <td class='font-weight-bold'>
                                    Subject Name
                                </td>
                                <td class='font-weight-bold'>
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
    <div class=' row pt-5'>
        <div class='col-md'>
        </div>
        <div class='col-md'>
            <div class='text-center'>
                <div><?php echo $Document->FullnameEng ?></div>
                <div>( <?php echo ucwords(strtolower($Document->TitleFullnameEng)) ?> )</div>
                <div id='divCreatedDate'><?php echo $Document->CreatedDate ?></div>
                <input id='CreatedDate' type='hidden' value='<?php echo $Document->CreatedDate ?>' />
            </div>
        </div>
    </div>
    <div class='row pt-5 footer'>
        <div class='col-md'>
            <table class='table table-bordered2'>
                <tr>
                    <td class='bg-gray'>
                        <div>
                            Registation Officer's Comments
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="blockquote">
                            <p class="mb-0">
                                (<span <?php echo ($Document->Name == "Approved") ? "class='text-success'" : "class='text-danger'" ?>>
                                    <?php echo $Document->Name ?>
                                </span>) : <?php echo $Document->OfficerCommentText ?>
                            </p>
                            <footer class="blockquote-footer"><?php echo $Document->OfficerName ?> at <cite id='divOfficerCommentedDate'></cite></footer>
                        </div>
                        <input type='hidden' id='inputOfficerCommentedDate' value="<?php echo $Document->OfficerCommentedDate ?>" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    var courseSubject = [];
    $(document).ready(function() {
        moment.locale('en');
        $('#divCreatedDate').text(moment($('#CreatedDate').val()).format('DD MMMM YYYY'))
        $('#divOfficerCommentedDate').text(moment($('#inputOfficerCommentedDate').val()).format('DD MMMM YYYY h:mm:ss A'))
        getSubjectRequest();
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