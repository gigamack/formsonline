<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PSU Phuket Online Forms</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card mt-4">
                    <h6 class="card-header bg-success Stidti">Add new request</h6>
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>dashboard" method="post">
                            <div class="row mx-auto">
                                <div class="col-md">
                                    <div class="form-group">
                                        <select class="form-control" name="selectDocumentType" id="selectDocumentType">
                                            <option value="">Choose the form ...</option>
                                            <?php
                                            foreach ($DocumentType as $row) {
                                                if($row->DoctypeID===$selectDocumentType){
                                                    echo "<option value='$row->DoctypeID' selected>$row->DoctypeNameEng</option>";
                                                }else{
                                                    echo "<option value='$row->DoctypeID'>$row->DoctypeNameEng</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success col-md">Select</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>