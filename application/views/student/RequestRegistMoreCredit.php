<?php
$studentid = $UserInfo->ID;
$fullname = $UserInfo->Fullname;
$fullnameeng = $UserInfo->FullnameEng;
$faculty = $UserInfo->Faculty;
$majorname = $UserInfo->Major;
$dob = $UserInfo->BirthDate;
$citizenid = $UserInfo->CardID;
$status = "";
if ($gpa[0]["STATUS"] == "03") {
    $status = "Normal";
} else if ($gpa[0]["STATUS"] == "04") {
    $status = "Probation No.1";
} else if ($gpa[0]["STATUS"] == "05") {
    $status = "Probation No.2";
} else if ($gpa[0]["STATUS"] == "06") {
    $status = "Probation No.3";
}
$edu_year = $gpa[0]["EDU_YEAR"];
$edu_term = $gpa[0]["EDU_TERM"];
?>
<div class="container">
    <div class="row">
        <div class="col-md">
            <form style="margin: 20px auto auto auto" action="<?php echo base_url() ?>form/requestmorecredits" method="post">
                <div class="card">
                    <div class="card-header bg-success text-light">
                        <h5>Request form for register more/less credits than those stipulated</h5>
                        <h6 class="text-minor">คำร้องขอลงทะเบียนเรียนโดยหน่วยกิตเกิน/น้อยกว่าระเบียบฯ มหาวิทยาลัย</h6>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Student ID:</label>
                                </div>
                                <div class="col-md-2">
                                    <label id="std_id" name="std_id"><?php echo $studentid ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Fullname:</label>
                                </div>
                                <div class="col-md-2">
                                    <label id="fullname" name="fullname"><?php echo $fullnameeng ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Faculty:</label>
                                </div>
                                <div class="col-md-2">
                                    <label id="faculty" name="faculty"> <?php echo strtoupper($faculty) ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Major:</label>
                                </div>
                                <div class="col-md-2">
                                    <label id="major" name="major"> <?php echo $majorname ?> </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="tel">Telephone:</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="textbox" id="tel" name="tel" size="15" maxlength="10" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <label for="gpax">GPAX: <?php echo $gpa[0]["CUM_GPA"] ?> Student Status:<?php echo $status ?> for semester/year <?php echo $edu_term . "/" . $edu_year ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="registedCredit">Total of credits registered :</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="textbox" id="registedCredit" name="registedCredit" size="3" maxlength="3" />
                                </div>
                                <div class="col-md-2">
                                    <label>Alter the credits to :</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="textbox" id="wanttoCredit" name="wanttoCredit" size="3" maxlength="3" />
                                </div>
                            </div>
                            <?php $creditStat = 'l';
                            $creditaffect = 0;
                            ?>
                            <div class="row">
                                <div class="col-md">
                                    <label for="registedCredit">Therefore, The total of credits registred<?php echo ($creditStat == 'l') ? " <u>less than</u> " : " <u>more than</u> "; ?> the specified-regulation for <?php echo "<u>" . $creditaffect . "</u>" ?> credit(s)</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="registedCredit"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="registedCredit">Reason for request :</label>
                                </div>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="reason" rows="3" name="reason" placeholder="เหตุผล:"></textarea>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <input type="hidden" id="DocType" name="DocType" value="7">
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>