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
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/formControl/updateReq") ?>" method="post">
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
                  <input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>"/>
                  <input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>"/>
                  <label for="stdid">รหัสนักศึกษา:</label>
                  <label for="stdid" id="stdid" name="stdid"><?php echo $getDocInfo['StudentID'];?></label>
                  <!-- <input type="text" class="form-control" id="stdid" placeholder="รหัสนักศึกษา"> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                <label for="stdfullname">ชื่อ-สกุล:</label>
                <label id="stdfullname"></label>
                <!-- <input type="label" class="form-control" id="stdfullname" placeholder="ชื่อ-สกุล" readonly>       -->
              </div>  
            </div> 
          </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">     
                <label for="fac">คณะ:</label>
                <label id="fac"></label>
                <!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
                </div>
              </div>
              <div class="col-md-4">    
                <div class="form-group">
                <label for="major">สาขาวิชา:</label>
                <label id="major"></label>
                <!-- <input type="text" class="form-control" id="major" placeholder="สาขาวิชา" readonly>       -->
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
              <input type="file" class="form-control-file" id="stdPicFile" name="stdPicFile" value="<?php echo (isset($getDocInfo['PoliceNoticePath'])?$getDocInfo['PoliceNoticePath']:"") ?>">
          </div>
          <div class="form-group" style="margin: 20px auto auto auto">
              <label class="text-danger">ในการติดต่อรับบัตรนักศึกษาชั่วคราว กรุณานำรูปถ่ายหน้าตรงขนาด1นิ้ว 1รูปมาด้วย </label>
          </div>
          <input type="hidden" id="DocTypeID" name="DocTypeID" value="1"/>
          <input type="hidden" id="stateID" name="stateID" value="t01s01" />
          <button type="submit" class="btn btn-primary Chuanpim"><h3>Update</h3></button>
        </div>
        </div>
        </div>
      </form>  

      <!-- <script>
        function showTextField() 
        {
          if (document.getElementsById("other").value = "5")
          {            
            document.getElementsById("other").show();         
          }
          else
          {
            document.getElementsById("other").hide();     
          }
        }
      </script>   -->
</div>
</body>
</html>