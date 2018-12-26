<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล</title>
</head>
<body>
<?php
    // $getDocInfo = $docInfo[0];
    $getDocInfo = $docInfo[0];
    $getStdInfo = $stdinfo; 
    $studentid= $getDocInfo['StudentID'];
    $fullname= $getStdInfo['TITLE_NAME_THAI'].$getStdInfo['STUD_NAME_THAI'].' '.$getStdInfo['STUD_SNAME_THAI'];
    $faculty=$getStdInfo['FAC_NAME_THAI'];
    $majorname=$getStdInfo['MAJOR_NAME_THAI'];
    $staff_id=$_SESSION['userSession']['PSUPassport']['GetUserDetailsResult']['string'][0];
    $commented_id = $docCommented;
?>
<div class="container Chuanpim" >
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/stdCardMain") ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>"/>
      <input type="hidden" id="doctypeID" name="doctypeID" value="<?php echo $getDocInfo['DocTypeID']; ?>"/>
      <input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>"/>
      <input type="hidden" id="userID" name="userID" value="<?php echo $staff_id; ?>"/>
      <input type="hidden" id="stateID" name="stateID" value="t02s02"/>
      <div class="card text-black bg-light">
        <div class="card-header Stidti"><h2>คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล</h2></div>
        <div class="input-group">
          <div class="container">
            <div class="row">
            <div class="col"></div> 
            </div>
            <div class="row">                  
              <div class="col-md-4">
                <div class="form-group">
                <label for="stdfullname">ข้าพเจ้า(ชื่อ-สกุลเดิม):</label>
                <label id="stdfullname"><?php echo $fullname;?></label>
                <!-- <input type="label" class="form-control" id="stdfullname" placeholder="ชื่อ-สกุล" readonly>       -->
              </div>  
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                  <label for="stdid">รหัสนักศึกษา:</label>
                  <label><?php echo $studentid;?></label>
                  <input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid?>"/>
                  <!-- <input type="text" class="form-control" id="stdid" placeholder="รหัสนักศึกษา"> -->
                </div>
              </div>
          </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">     
                <label for="fac">คณะ:</label>
                <label id="fac"><?php echo $faculty;?></label>
                <!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
                </div>
              </div>
              <div class="col-md-4">    
                <div class="form-group">
                <label for="major">สาขาวิชา:</label>
                <label id="major"><?php echo $majorname;?></label>
                <!-- <input type="text" class="form-control" id="major" placeholder="สาขาวิชา" readonly>       -->
              </div>
            </div>    
          </div>
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">     
                <label for="tel">หมายเลขโทรศัพท์มือถือ:</label>
                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $getDocInfo['tel'];?>" disabled/>
                <!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
                </div>
              </div>                
          </div>
        <label class="form-check-label">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</label>	
        <div class="container">
            <div class="row">
                <div class="col">
                    <label for="newthName">ภาษาไทย:</label>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" id="newthName" name="newthName" value="<?php echo $getDocInfo['newthname'];?>" disabled/>
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" id="newthSname" name="newthSname" value="<?php echo $getDocInfo['newthsname'];?>" disabled/>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row"> 
                <div class="col">   
                    <label for="newthName">ภาษาอังกฤษ:</label>     
                </div>
                <div class="col-5">                    
                    <input type="text" class="form-control" id="newengName" name="newengName" value="<?php echo $getDocInfo['newengname'];?>" style="text-transform:uppercase" disabled/>
                </div>
                <!-- <div class="w-100"></div> -->
                <div class="col-5">
                    <input type="text" class="form-control" id="newengSname" name="newengSname" value="<?php echo $getDocInfo['newengsname'];?>" style="text-transform:uppercase" disabled/>
                </div>
            </div>
        </div>
        <div class="input-group">            
          <label for="reason">เหตุผลเนื่องจาก:</label>
          <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $getDocInfo['reason'];?>" disabled/>
        </div> 
        <?php 
            if($getDocInfo['stdFile1']=="")
            {
              $showattachedbutton="visibility:hidden;";
            }
            else
            {
              $showattachedbutton="visibility:visible;";
            }           
            ?>          
        <div class="form-group" style="margin: 20px auto auto auto">
              <label>โดยได้แนบเอกสารประกอบคำร้องขอแจ้งเปลี่ยนชื่อ-สกุลดังนี้</label><br/>
              <label for="stdPicFile1">1.สำเนาบัตรประจำตัวประชาชน</label>
              <!-- <input type="file" class="form-control-file" id="stdFile1" name="stdFile1"> -->
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
              <label for="stdPicFile2">2.สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</label>
              <!-- <input type="file" class="form-control-file" id="stdFile2" name="stdFile2"> -->
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
              <label for="stdPicFile3">3.สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</label>
              <!-- <input type="file" class="form-control-file" id="stdFile3" name="stdFile3"> -->
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
        </div>
          <!-- <input type="hidden" name="currentimageValue1" value="<?php echo $getDocInfo['stdFile1']; ?>"/>
          <input type="hidden" name="currentimageValue2" value="<?php echo $getDocInfo['stdFile2']; ?>"/>
          <input type="hidden" name="currentimageValue3" value="<?php echo $getDocInfo['stdFile3']; ?>"/> -->
          <input type="hidden" id="DocTypeID" name="DocTypeID" value="2"/>
          <div style="margin:  auto auto 20px auto">
          <div style="margin: 20px auto auto auto" class="card text-black bg-light text-center" style="margin: auto 20px auto auto">
          <label class="form-check-label">ความเห็นเจ้าหน้าที่ทะเบียนกลาง Register's Commentd :</label>
          <div class="radio">
              <input type="radio" id="agree" name="commentid" value="1" <?php if($commented_id[0]->OfficerCommentID == 1){ echo ' checked="checked"'; } ?> disabled>
              <label for="agree">Agree</label>
              <input type="radio" id="disagree" name="commentid" value="2" <?php if($commented_id[0]->OfficerCommentID == 2){ echo ' checked="checked"'; } ?> disabled>
              <label for="disagree">Disagree</label>              
          </div>
          <div class="form-group purple-border">
            <textarea class="form-control" id="commentText" rows="3" name="commentText" placeholder="เหตุผล:"><?php echo $commented_id[0]->OfficerCommentText; ?></textarea>
          </div>
          <button style="margin: auto auto 20px auto" type="submit" class="btn btn-primary text-center Chuanpim">Back</button>
          </div>      
        </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
        <?php $fileurl= $getDocInfo['stdFile1']!=""?"../uploads/".$getDocInfo['stdFile1']:"#"; ?>
        <a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php
        $fileextension = array(".pdf", ".doc", "docx", ".xls","xlsx");
        $uploadedextension = substr($getDocInfo['stdFile1'],-4);
        $showmodalpic= in_array($uploadedextension,$fileextension)?"visibility: hidden;":"visibility: visible;"; ?>
        <img src="../uploads/<?php echo $getDocInfo['stdFile1']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
        <?php $fileurl= $getDocInfo['stdFile2']!=""?"../uploads/".$getDocInfo['stdFile2']:"#"; ?>
        <a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php
        $fileextension = array(".pdf", ".doc", "docx", ".xls","xlsx");
        $uploadedextension = substr($getDocInfo['stdFile2'],-4);
        $showmodalpic= in_array($uploadedextension,$fileextension)?"visibility: hidden;":"visibility: visible;"; ?>
        <img src="../uploads/<?php echo $getDocInfo['stdFile2']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
        <?php $fileurl= $getDocInfo['stdFile3']!=""?"../uploads/".$getDocInfo['stdFile3']:"#"; ?>
        <a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php
        $fileextension = array(".pdf", ".doc", "docx", ".xls","xlsx");
        $uploadedextension = substr($getDocInfo['stdFile3'],-4);
        $showmodalpic= in_array($uploadedextension,$fileextension)?"visibility: hidden;":"visibility: visible;"; ?>
        <img src="../uploads/<?php echo $getDocInfo['stdFile3']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic;?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
        <!-- Modal -->
      </form>        
</div>
</body>
</html>