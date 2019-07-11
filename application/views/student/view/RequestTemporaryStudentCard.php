<?php

?>
<div class='container form-view'>
    <div class='row mt-5'>
        <div class='col-md'>
            <div class="text-center">
                <div class='pb-3'>
                    <img src='<?php echo base_url() ?>assets/img/PSU-logo-Original.png' width="75" height="100">
                </div>
                <div>
                    งานรับนักศึกษาและงานทะเบียนกลาง วิทยาเขตภูเก็ต มหาวิทยาลัยสงขลานครินทร์
                </div>
                <div>
                    Registrar's Division, Prince of Songkla University, Phuket Campus
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <div class='text-center bg-gray pt-2 pb-2'>
                <h5 class='text-dark font-weight-bold'>คำร้องขอทำบัตรนักศึกษาชั่วคราว</h5>
                <h5 class='text-dark font-weight-bold'>Request Form for PSU Student Identification Card</h5>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            เรียน นายทะเบียน / Dear Registrar
        </div>
    </div>
    <div class='row'>
        <div class='col-md tab'>
            <span>ข้าพเจ้า</span>
            <span class='font-weight-bold'><?php echo $Document->TitleFullnameEng ?></span>
            <span>รหัสนักศึกษา</span>
            <span class='font-weight-bold'><?php echo $Document->StudentID ?></span>
            <span>คณะ</span>
            <span class='font-weight-bold'><?php echo $Document->FacultyEng ?></span>
            <span>สาขา</span>
            <span class='font-weight-bold'><?php echo $Document->MajorEng ?></span>
            <span>โทรศัพท์</span>
            <span class='font-weight-bold'><?php echo $Document->tel ?></span>
            <span>มีความประสงค์ขอบัตรประจำตัวนักศึกษาชั่วคราว เนื่องจาก</span>
            <span class='font-weight-bold'><?php echo $Document->ReasonNameEng ?></span>
        </div>
    </div>
    <div class='row pt-5 pb-5'>
        <div class='col-md'>
            <div>
                *** พร้อมแนบรูปถ่ายชุดนักศึกษาขนาด 1 นิ้ว จำนวน 1 รูป/ A one-inch color photo with student uniform. (รูปถ่ายอายุไม่เกิน 6 เดือน)
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
                            ความเห็นจากเจ้าหน้าที่ทะเบียนกลาง / Register's Comments
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class='w-50'>
                        <div class="blockquote">
                            <p class="mb-0"><?php echo $Document->OfficerCommentText ?></p>
                            <footer class="blockquote-footer"><?php echo $Document->OfficerName ?><cite id='divOfficerCommentedDate'></cite></footer>
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
        $('#divOfficerCommentedDate').text(moment($('#inputOfficerCommentedDate').val()).format('DD MMMM YYYY'))
    })
</script>