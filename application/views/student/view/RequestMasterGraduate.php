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
                <span>Telephone</span>
                <span class='font-weight-bold'><?php echo $Document->tel ?></span>
            </div>
            <div class='tab'>
                <span>I would like to request for graduate approval that i am going to graduate</span>
                <span>in semester</span>
                <span class='font-weight-bold'><?php echo $Document->termEnd ?></span>,
                <span>year </span>
                <span class='font-weight-bold'><?php echo $Document->yearEnd ?></span>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md'>
            <div class='tab'>
                <div>
                    <span> Current Address :</span>
                </div>
                <div class='tab2'>
                    <div>
                        <span>House no : </span>
                        <span class='font-weight-bold'><?php echo $Document->houseNumber ?></span>
                        <span>Lane : </span>
                        <span class='font-weight-bold'><?php echo $Document->soi ?></span>
                    </div>
                    <div>
                        <span>Street : </span>
                        <span class='font-weight-bold'><?php echo $Document->street ?></span>
                    </div>
                    <div>
                        <span>Sub-district : </span>
                        <span class='font-weight-bold'><?php echo $Document->sub_district ?></span>
                        <span>District : </span>
                        <span class='font-weight-bold'><?php echo $Document->district ?></span>
                    </div>
                    <div>
                        <span>Province : </span>
                        <span class='font-weight-bold'><?php echo $Document->province ?></span>
                        <span>Postal Code : </span>
                        <span class='font-weight-bold'><?php echo $Document->zipcode ?></span>
                    </div>
                    <div>
                        <span>Tel : </span>
                        <span class='font-weight-bold'><?php echo $Document->tel ?></span>
                    </div>
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
    $(document).ready(function() {
        moment.locale('en');
        $('#divCreatedDate').text(moment($('#CreatedDate').val()).format('DD MMMM YYYY'))
        $('#divOfficerCommentedDate').text(moment($('#inputOfficerCommentedDate').val()).format('DD MMMM YYYY h:mm:ss A'))
    })
</script>