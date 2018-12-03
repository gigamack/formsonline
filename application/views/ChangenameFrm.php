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
    $studentid=$_SESSION['userSession']['StudentInfo']['STUDENT_ID'];
    $fullname=$_SESSION['userSession']['StudentInfo']['STUD_NAME_THAI'].' '.$_SESSION['userSession']['StudentInfo']['STUD_SNAME_THAI'];
    $faculty=$_SESSION['userSession']['StudentInfo']['FAC_NAME_THAI'];
    $majorname=$_SESSION['userSession']['StudentInfo']['MAJOR_NAME_THAI'];  
?>
<div class="container Chuanpim" >
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/insertReq") ?>" method="post" enctype="multipart/form-data">
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
                <input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์มือถือ" />
                <!-- <input type="text" class="form-control" id="fac" placeholder="คณะ" readonly>       -->
                </div>
              </div>                
          </div>
        <label class="form-check-label">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</label>	
        <div class="input-group mb-3">
            <label for="newthName">ภาษาไทย:</label>
            <input type="text" class="form-control" id="newthName" name="newthName" placeholder="ชื่อ" />
            <input type="text" class="form-control" id="newthSname" name="newthSname" placeholder="สกุล" />
        </div>
        <div class="input-group mb-3">
            <label for="newthName">ภาษาอังกฤษ:</label>
            <input type="text" class="form-control" id="newengName" name="newengName" placeholder="ชื่อ" />
            <input type="text" class="form-control" id="newengSname" name="newengSname" placeholder="สกุล" />
        </div>
        <div class="input-group">            
          <label for="reason">เหตุผลเนื่องจาก:</label>
          <input type="text" class="form-control" id="reason" name="reason" placeholder="ระบุ /Other" style="visibility:hidden;"/>
        </div> 
        <div class="form-group" style="margin: 20px auto auto auto">
              <label>โดยได้แนบเอกสารประกอบคำร้องขอแจ้งเปลี่ยนชื่อ-สกุลดังนี้</label>
              <label for="stdPicFile1">1.สำเนาบัตรประจำตัวประชาชน</label>
              <input type="file" class="form-control-file" id="stdPicFile1" name="stdPicFile1">
              <label for="stdPicFile2">2.สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</label>
              <input type="file" class="form-control-file" id="stdPicFile2" name="stdPicFile2">
              <label for="stdPicFile3">3.สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</label>
              <input type="file" class="form-control-file" id="stdPicFile3" name="stdPicFile3">
        </div>
          <input type="hidden" id="DocTypeID" name="DocTypeID" value="2"/>
          <input type="hidden" id="stateID" name="stateID" value="t02s01" />
          <div style="margin:  auto auto 20px auto">
          <button type="submit" class="btn btn-primary Chuanpim">Submit</button>
          </div>
        </div>
        </div>
        </div>
      </form>  

      <script>
        var uploadField = document.getElementById("stdPicFile");
        uploadField.onchange = function() {
        if(this.files[0].size > 10485760){
        alert("File is too big!");
        this.value = "";
        };
        };

      </script>
</div>
</body>
</html>