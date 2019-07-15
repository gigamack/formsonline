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
                <span class='font-weight-bold'><?php echo $Document->TitleFullnameEng ?></span>
                <span>Student ID</span>
                <span class='font-weight-bold'><?php echo $Document->StudentID ?></span>
                <span>Faculty</span>
                <span class='font-weight-bold'><?php echo $Document->FacultyEng ?></span>
                <span>Major</span>
                <span class='font-weight-bold'><?php echo $Document->MajorEng ?></span>
                <span class='font-weight-bold'>Undergraduate Students</span>
                <span>Telephone</span>
                <span class='font-weight-bold'><?php echo $Document->tel ?></span>
            </div>
            <div class='tab'>
                <span>I would like to change the following personel information due to </span>
                <span class='font-weight-bold'><?php echo $Document->reason ?></span>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <table class='table table-bordered2 table-sm'>
                <tr>
                    <td class='bg-gray' style='width:10%;'>
                    </td>
                    <td class='text-center bg-gray' style='width:45%;'>
                        Thai
                    </td>
                    <td class='text-center bg-gray' style='width:45%;'>
                        English
                    </td>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <?php echo $Document->newthname ?>
                    </td>
                    <td>
                        <?php echo $Document->newengname ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Surname
                    </td>
                    <td>
                        <?php echo $Document->newthsname ?>
                    </td>
                    <td>
                        <?php echo $Document->newengsname ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class='row pt-5'>
        <div class='col-md'>
            <div>
                <span class='font-weight-bold'>Attachment</span>
            </div>
            <div>
                <a style='text-decoration: none; color:black' target="_blank" href='<?php echo base_url() . 'uploads/' . $Document->stdFile1 ?>'>1. Copy of National ID Card : </a><?php echo ($Document->stdFile1 != "") ? "<span class='text-success'>YES</span>" : "<span class='text-danger'>NO</span>" ?>
            </div>
            <div>
                <a style='text-decoration: none; color:black' target="_blank" href='<?php echo base_url() . 'uploads/' . $Document->stdFile2 ?>'>2. Copy of change of name form : </a><?php echo ($Document->stdFile2 != "") ? "<span class='text-success'>YES</span>" : "<span class='text-danger'>NO</span>" ?>
            </div>
            <div>
                <a style=' text-decoration: none; color:black' target="_blank" href='<?php echo base_url() . 'uploads/' . $Document->stdFile3 ?>'>3. Copy of Passport : </a><?php echo ($Document->stdFile3 != "") ? "<span class='text-success'>YES</span>" : "<span class='text-danger'>NO</span>" ?>
            </div>
        </div>
    </div>
    <div class=' row pt-5'>
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
    $(document).ready(function() {
        moment.locale('en');
        $('#divCreatedDate').text(moment($('#CreatedDate').val()).format('DD MMMM YYYY'))
        $('#divOfficerCommentedDate').text(moment($('#inputOfficerCommentedDate').val()).format('DD MMMM YYYY h:mm:ss A'))
    })
</script>