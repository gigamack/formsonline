<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
            $getDocInfo = $docInfo[0];
            $commented_id = $docCommented;
            $getStdInfo = $stdinfo;
?>
<script>
$('html, body').animate({
    scrollTop: $("#form").offset().top
}, 2000);
</script>
<div id="form">
    <h1>test</h1>
</div>
<div class="container Chuanpim" >
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/stdMain") ?>">
      <input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>"/>
      <input type="hidden" id="doctypeID" name="doctypeID" value="<?php echo $getDocInfo['DocTypeID']; ?>"/>
      <input type="hidden" id="userID" name="userID" value="iesorn.c"/>
      <input type="hidden" id="stateID" name="stateID" value="t01s02"/>
      <input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>"/>
      <div class="card">
      <h5 class="card-header bg-success text-light">คำร้องขอทำบัตรนักศึกษาชั่วคราว</h5>
      <div class="card-body">
            <div class="row">
              <div class="col">          
                    <label for="stdid" class="font-weight-bold" autofocus>รหัสนักศึกษา:</label>
                    <label for="stdid" id="stdid" name="stdid"><?php echo $getDocInfo['StudentID'];?></label>
              </div>
              <div class="col">            
                  <label for="stdfullname" class="font-weight-bold">ชื่อ-สกุล:</label>
                  <label for="stdfullname" id="stdfullname"><?php echo $getStdInfo['TITLE_NAME_THAI'].$getStdInfo['STUD_NAME_THAI'].' '.$getStdInfo['STUD_SNAME_THAI'];?></label>      
              </div>  
            </div> 
            <div class="row">
              <div class="col">                  
                <label for="fac" class="font-weight-bold">คณะ:</label>
                <label for="fac" id="fac"><?php echo $getStdInfo['FAC_NAME_THAI']?></label>
              </div>
              <div class="col">    
                <label for="major" class="font-weight-bold">สาขาวิชา:</label>
                <label for="major" id="major"><?php echo $getStdInfo['MAJOR_NAME_THAI']?></label>      
              </div>
            </div>    
            <div class="row">
                <div class="col">
                  <label class="font-weight-bold">มีความประสงค์ขอบัตรประจำตัวนักศึกษาชั่วคราวเนื่องจาก/I would like to request a PSU Student identification card due to:</label>
                </div>
					  </div>				
      
            <div class="row">
              <div class="col">  
              <div class="form-group">
                <select disabled class="custom-select" id="reason" name="reason" onchange="if (this.value=='5'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
                  <option value="1"<?php if($getDocInfo['ReasonID'] == '1'){ echo ' selected="selected"'; } ?>>บัตรสูญหาย/ loss of the previous card (แนบใบแจ้งความจากสถานีตำรวจ/the notice from police station is enclosed)</option>
                  <option value="2"<?php if($getDocInfo['ReasonID'] == '2'){ echo ' selected="selected"'; } ?>>บัตรชำรุด/ damaged card</option>
                  <option value="3"<?php if($getDocInfo['ReasonID'] == '3'){ echo ' selected="selected"'; } ?>>บัตรหมดอายุ/ an expired card.</option>
                  <option value="4"<?php if($getDocInfo['ReasonID'] == '4'){ echo ' selected="selected"'; } ?>>เปลี่ยนรหัสนักศึกษา,คำนำหน้า,ชื่อ-สกุล/ Change of ID No.,Title,Full Name.</option>
                  <option value="5"<?php if($getDocInfo['ReasonID'] == '5'){ echo ' selected="selected"'; } ?>>อื่นๆ /Other</option>
                </select>
                </div>
              </div>
            </div>        
            <!-- <input type="text" class="form-control" aria-label="Text input with radio button"> -->
             <?php 
            if($getDocInfo['ReasonOther']=="")
            {
              $showtextbox="visibility:hidden;";
            }
            else
            {
              $showtextbox="visibility: visible;";
            }           
            ?>
            <div class="row">  
              <div class="col"> 
              <div class="form-group"> 
                <input type="text" class="form-control" id="other" name="other" placeholder="ระบุ /Other" style="<?php echo $showtextbox;?>" value="<?php echo (isset($getDocInfo['ReasonOther'])?$getDocInfo['ReasonOther']:"") ?>"disabled/>
              </div>
              </div>
            </div>
          <?php 
            if($getDocInfo['PoliceNoticePath']=="")
            {
              $showattachedbutton="visibility:hidden;";
            }
            else
            {
              $showattachedbutton="visibility:visible;";
            }           
            ?> 
            <div class="row">  
              <div class="col">    
                <div class="form-group">                          
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" style="<?php echo $showattachedbutton;?>">Attached file</button>
                </div>
              </div>
            </div>
          <div class="form-group" style="margin: 20px auto auto auto">
              <label class="text-danger">ในการติดต่อรับบัตรนักศึกษาชั่วคราว กรุณานำรูปถ่ายหน้าตรงขนาด1นิ้ว 1รูปมาด้วย </label>
          </div>
          <div class="card text-black bg-light text-center" style="margin: auto 20px auto auto">
          <label class="form-check-label">ความเห็นเจ้าหน้าที่ทะเบียนกลาง Register's Commentd :</label>
          <div class="radio">
              <input type="radio" id="agree" name="commentid" value="1" <?php if($commented_id[0]->OfficerCommentID == 1){ echo ' checked="checked"'; } ?> disabled>
              <label for="agree">Approved</label>
              <input type="radio" id="disagree" name="commentid" value="2" <?php if($commented_id[0]->OfficerCommentID == 2){ echo ' checked="checked"'; } ?> disabled>
              <label for="disagree">Disapproved</label>              
          </div>
          <div class="form-group purple-border">
            <textarea class="form-control" id="commentText" rows="3" name="commentText" placeholder="เหตุผล:" disabled><?php echo $commented_id[0]->OfficerCommentText; ?></textarea>
          </div>
          <div class="row">
						<div class="col">
							<div class="form-group">
              <button type="submit" class="btn btn-success">Back</button>
            </div>
          </div>
        </div>
        </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attached file.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <?php $fileurl= $getDocInfo['PoliceNoticePath']!=""?"../uploads/".$getDocInfo['PoliceNoticePath']:"#"; ?>
        <a class="btn btn-danger" href="<?php echo $fileurl; ?>" role="button">Download</a>
        <?php
        $fileextension = array(".pdf", ".doc", "docx", ".xls","xlsx");
        $uploadedextension = substr($getDocInfo['PoliceNoticePath'],-4);
        $showmodalpic= in_array($uploadedextension,$fileextension)?"visibility: hidden;":"visibility: visible;"; ?>
        <img src="../uploads/<?php echo $getDocInfo['PoliceNoticePath']; ?>" alt="ไฟล์ประกอบคำร้อง" class="img-thumbnail" style="<?php echo $showmodalpic;?>">
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