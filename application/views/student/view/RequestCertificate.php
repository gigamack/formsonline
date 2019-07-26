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
                <span class='font-weight-bold'><?php echo ($Document->tel != "") ? $Document->tel : '-' ?></span>
            </div>
            <div class='tab'>
                <span>I would like to request for application of a certificate by the following detail : </span>
            </div>
        </div>
    </div>
    <div class='row pl-5 pr-5'>
        <div class='col-md'>
            <?php
            $TotalCost = 0;
            foreach ($Certs as $Cert) { ?>
                <div class='row border-bottom'>
                    <div class='col-md-8'>
                        <span>-</span>
                        <span><?php echo $Cert->certNameTH ?></span>
                    </div>
                    <div class='col-md-4'>
                        <div class='float-right'>
                            <div class="blockquote">
                                <p class="mb-0">
                                    <span>Eng</span>
                                    <span><?php echo $Cert->engAmount ?></span>
                                    <span>Copy</span>
                                    <span>/</span>
                                    <span>Thai</span>
                                    <span><?php echo $Cert->thAmount ?></span>
                                    <span>Copy</span>
                                </p>
                                <footer class="blockquote-footer">
                                    <span>Cost</span>
                                    <span><?php echo $Cert->totalcertPrice ?></span>
                                    <span>Baht</span>
                                </footer>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
                $TotalCost += $Cert->totalcertPrice;
            } ?>
            <div class='row'>
                <div class='col-md-9'>

                </div>
                <div class='col-md border-bottom pt-3 pb-3'>
                    <div class='float-right'>
                        <span>Total Cost</span>
                        <span class='font-weight-bold'><?php echo number_format($TotalCost) ?></span>
                        <span>Baht</span>
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
                                </span>) : <?php echo 'Receipt No : ' . $Document->OfficerCommentText ?>
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