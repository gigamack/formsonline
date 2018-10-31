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
?>
<div class="container Chuanpim" >
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/formControl/insertDocNextState") ?>" method="post">
      <input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>"/>
      <input type="hidden" id="userID" name="userID" value="iesorn.c"/>
      <input type="hidden" id="stateID" name="stateID" value="s01t02"/>
      <input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>"/>
      <div class="card text-black bg-light">
        <div class="card-header Stidti"><h2>คำร้องขอทำบัตรนักศึกษาชั่วคราว</h2></div>
        <div class="input-group">
          <div class="container">
            <div class="row">
            <div class="col"></div> 
            </div>
            <div class="row">    
              <div class="col-md-4">
                <div class="form-group">
                  <label for="stdid">รหัสนักศึกษา:</label>
                  <label for="stdid" id="stdid" name="stdid"><?php echo $getDocInfo['StudentID'];?></label>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="stdfullname">ชื่อ-สกุล:</label>
                <label for="stdfullname" id="stdfullname"></label>      
              </div>  
            </div> 
          </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">     
                <label for="fac">คณะ:</label>
                <label for="fac" id="fac"></label>
                </div>
              </div>
              <div class="col-md-4">    
                <div class="form-group">
                <label for="major">สาขาวิชา:</label>
                <input for="major" id="major"></label>      
              </div>
            </div>    
          </div>
      <label class="form-check-label">มีความประสงค์ขอบัตรประจำตัวนักศึกษาชั่วคราวเนื่องจาก/I would like to request a PSU Student identification card due to:</label>					
      
      <div class="input-group mb-3">  
          <select class="custom-select" id="reason" name="reason" onchange="if (this.value=='5'){this.form['other'].style.visibility='visible'}else {this.form['other'].style.visibility='hidden'};">
            <option value="1"<?php if($getDocInfo['ReasonID'] == '1'){ echo ' selected="selected"'; } ?>>บัตรสูญหาย/ loss of the previous card (แนบใบแจ้งความจากสถานีตำรวจ/the notice from police station is enclosed)</option>
            <option value="2"<?php if($getDocInfo['ReasonID'] == '2'){ echo ' selected="selected"'; } ?>>บัตรชำรุด/ damaged card</option>
            <option value="3"<?php if($getDocInfo['ReasonID'] == '3'){ echo ' selected="selected"'; } ?>>บัตรหมดอายุ/ an expired card.</option>
            <option value="4"<?php if($getDocInfo['ReasonID'] == '4'){ echo ' selected="selected"'; } ?>>เปลี่ยนรหัสนักศึกษา,คำนำหน้า,ชื่อ-สกุล/ Change of ID No.,Title,Full Name.</option>
            <option value="5"<?php if($getDocInfo['ReasonID'] == '5'){ echo ' selected="selected"'; } ?>>อื่นๆ /Other</option>
          </select>
        </div>
          <div class="input-group">            
            <!-- <input type="text" class="form-control" aria-label="Text input with radio button"> -->
            <input type="text" class="form-control" id="other" name="other" placeholder="ระบุ /Other" style="visibility:hidden;" value="<?php echo (isset($getDocInfo['ReasonOther'])?$getDocInfo['ReasonOther']:"") ?>"/>
          </div> 
          <div class="form-group" style="margin: 20px auto auto auto">
              <label for="stdPicFile">แนบไฟล์รูปภาพใบแจ้งความจากสถานีตำรวจ กรณีบัตรสูญหาย</label>
              <img src="../assets/images/BNKLogo.jpg" alt="ภาพใบแจ้งความ" class="img-thumbnail">
          </div>
          <div class="form-group" style="margin: 20px auto auto auto">
              <label class="text-danger">ในการติดต่อรับบัตรนักศึกษาชั่วคราว กรุณานำรูปถ่ายหน้าตรงขนาด1นิ้ว 1รูปมาด้วย </label>
          </div>
          <div class="card text-black bg-light text-center" style="margin: auto 20px auto auto">
          <label class="form-check-label">ความเห็นเจ้าหน้าที่ทะเบียนกลาง Register's Commentd :</label>
          <div class="radio">
              <input type="radio" id="agree" name="commentid" value="1">
              <label for="agree">Agree</label>
              <input type="radio" id="disagree" name="commentid" value="2">
              <label for="disagree">Disagree</label>              
          </div>
          <div class="form-group purple-border">
            <textarea class="form-control" id="commentText" rows="3" name="commentText" placeholder="เหตุผล:"></textarea>
          </div>
          <div>
          <button type="submit" class="btn-sm btn-primary Chuanpim"><h3>Submit</h3></button>          
          </div>
          </div>
        </div>
        </div>
        </div>
      </form>      
</div>
</body>
</html>