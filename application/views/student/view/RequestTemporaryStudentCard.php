<div class='container form-view'>
    <div class='row mt-5'>
        <div class='col-md'>
            <div class="text-center">
                <div class='pb-3'>
                    <img src='<?php echo base_url() ?>assets/img/PSU-logo-Original.png' width="75" height="100">
                </div>
                <!-- <div>
                    งานรับนักศึกษาและงานทะเบียนกลาง วิทยาเขตภูเก็ต มหาวิทยาลัยสงขลานครินทร์
                </div> -->
                <div>
                    Registrar's Division, Prince of Songkla University, Phuket Campus
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <div class='text-center bg-gray pt-2 pb-2'>
                <!-- <h5 class='text-dark font-weight-bold'>คำร้องขอทำบัตรนักศึกษาชั่วคราว</h5> -->
                <h5 class='text-dark font-weight-bold'>Request Form for PSU Student Identification Card</h5>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            Dear Registrar
        </div>
    </div>
    <div class='row'>
        <div class='col-md tab'>
            <span class='font-weight-bold'><?php echo $Document->TitleFullnameEng ?></span>
            <span>Student ID</span>
            <span class='font-weight-bold'><?php echo $Document->StudentID ?></span>
            <span>Faculty</span>
            <span class='font-weight-bold'><?php echo $Document->FacultyEng ?></span>
            <span>Major</span>
            <span class='font-weight-bold'><?php echo $Document->MajorEng ?></span>
            <span>Telephone</span>
            <span class='font-weight-bold'><?php echo $Document->tel ?></span>
            <span>I would like to request a Temporary Student Identification Card</span>
            <span class='font-weight-bold'><?php echo $Document->ReasonNameEng ?></span>
        </div>
    </div>
    <div class='row pt-5 pb-5'>
        <div class='col-md'>
            <div>
                *** A one-inch color photo with student uniform. (Photos not older than 6 months)
            </div>
        </div>
    </div>
    <div class='row pt-5'>
        <div class='col-md'>
        </div>
        <div class='col-md'>
            <div class='text-center'>
                <div><?php echo $Document->FullnameEng ?></div>
                <div>( <?php echo $Document->TitleFullnameEng ?> )</div>
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
                            Registrar's Comments
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class='w-50'>
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
    $(document).ready(function() {
        moment.locale('en');
        $('#divCreatedDate').text(moment($('#CreatedDate').val()).format('DD MMMM YYYY'))
        $('#divOfficerCommentedDate').text(moment($('#inputOfficerCommentedDate').val()).format('DD MMMM YYYY h:mm:ss A'))
    })
</script>