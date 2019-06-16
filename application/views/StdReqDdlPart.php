<!DOCTYPE html>
<html lang="en">
<script>
    $(document).ready(function() {
        $("#formselect").change(function() {
            var baseUrl = "form"
            var optionValue = this.value
            var finalUrl = baseUrl + "/" + optionValue
            $("#frmFromCaller").attr("action", finalUrl)
        })
    })
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- <?php
            $GetDocID = $docList;
            $DocTypeList = $doctypeList;
            ?>
    <div class="container Chuanpim" id="ResultList">
        <form action="<?php echo base_url("student/form") ?>" id="frmFromCaller" method="post">
            <div class="card" style="margin: 20px auto auto auto">
                <h6 class="card-header bg-success Stidti">Add new request</h6>
                <div class="row" style="margin: 20px auto auto auto">
                    <div class="col-mb-6 pb-3">
                        <select class="custom-select" id="formselect" name="formselect">
                            <option value="#">Choose the form ...</option>
                            <?php for ($i = 0; $i < sizeof($DocTypeList); $i++) { ?>
                                            <?php if (($DocTypeList[$i]['DoctypeID'] == '4') or ($DocTypeList[$i]['DoctypeID'] == '5')) {
                                                if ($_SESSION['userSession']['StudentInfo']['STUDY_LEVEL_ID'] != '06') {
                                                    ?><option value="<?php echo $DocTypeList[$i]['DoctypeID']; ?>" <?php if ($_SESSION["ddlchosen"] == $DocTypeList[$i]['DoctypeID']) echo 'selected="selected"'; ?>><?php echo $DocTypeList[$i]['DoctypeNameEng']; ?></option>
                                                            <?php
                                                        }
                                                    } else if ($DocTypeList[$i]['DoctypeID'] == '3') {
                                                        if ($_SESSION['userSession']['StudentInfo']['STUDY_LEVEL_ID'] != '04') {
                                                            ?><option value="<?php echo $DocTypeList[$i]['DoctypeID']; ?>" <?php if ($_SESSION["ddlchosen"] == $DocTypeList[$i]['DoctypeID']) echo 'selected="selected"'; ?>><?php echo $DocTypeList[$i]['DoctypeNameEng']; ?></option>
                                                            <?php
                                                        }
                                                    } else { ?>
                                                            <option value="<?php echo $DocTypeList[$i]['DoctypeID']; ?>" <?php if ($_SESSION["ddlchosen"] == $DocTypeList[$i]['DoctypeID']) echo 'selected="selected"'; ?>><?php echo $DocTypeList[$i]['DoctypeNameEng']; ?></option>
                                            <?php }
                                        ?>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-mb-2">
                        <button type="submit" class="btn btn-success">Select</button>
                    </div>
                </div>
            </div>
        </form> -->
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <h6 class="card-header bg-success Stidti">Add new request</h6>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <select class="form-control col-md-6 mx-auto mt-3" name="" id="">
                                    <option value="">Choose the form ...</option>

                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>