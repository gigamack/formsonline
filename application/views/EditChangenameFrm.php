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
    $getDocInfo = $docInfo[0];
?>
<div class="container mt-3 mb-3" >
      <form style="margin: 20px auto auto auto" action="<?php echo base_url("/FormControl/updateChangeNameReq") ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" id="docID" name="docID" value="<?php echo $getDocInfo['DocID']; ?>"/>
      <input type="hidden" name="stdid" value="<?php echo $getDocInfo['StudentID']; ?>"/>
      <div class="card text-black bg-light">
      <h5 class="card-header bg-primary text-light">
					คำร้องขอแจ้งการเปลี่ยนชื่อ-สกุล
				</h5>
        <div class="card-body">
					<div class="form-group">
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="stdfullname">ข้าพเจ้า(ชื่อ-สกุลเดิม):</label>
								<label id="stdfullname">
									<?php echo $fullname; ?></label>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="stdid">รหัสนักศึกษา:</label>
								<label>
									<?php echo $studentid; ?></label>
								<input type="hidden" id="stdid" name="stdid" value="<?php echo $studentid ?>" />
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="font-weight-bold" for="fac">คณะ:</label>
								<label id="fac">
									<?php echo $faculty; ?></label>
							</div>
							<div class="col">
								<label class="font-weight-bold" for="major">สาขาวิชา:</label>
								<label id="major">
									<?php echo $majorname; ?></label>
							</div>
						</div>
					</div>
          <div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="tel">หมายเลขโทรศัพท์มือถือ:</label>
							</div>
							<div class="col-md-5">
              <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $getDocInfo['tel'];?>" />
							</div>
						</div>
					</div>
          <div class="form-group">
          <div class="row">
							<div class="col">
								<label class="font-weight-bold" class="form-check-label">มีความประสงค์จะขอเปลี่ยนชื่อ-สกุล(ไทย/อังกฤษ)(กรุณาระบุเฉพาะชื่อ-สกุลที่เปลี่ยน)เป็น</label>
							</div>
						</div> 
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="newthName">ภาษาไทย:</label>
							</div>
							<div class="col-md">
              <input type="text" class="form-control" id="newthName" name="newthName" value="<?php echo $getDocInfo['newthname'];?>" />
							</div>
							<div class="col-md">
              <input type="text" class="form-control" id="newthSname" name="newthSname" value="<?php echo $getDocInfo['newthsname'];?>" />
							</div>
						</div>
					</div> 
          <div class="form-group">
						<div class="row">
							<div class="col-md-2">
								<label class="font-weight-bold" for="newthName">ภาษาอังกฤษ:</label>
							</div>
							<div class="col-md">
              <input type="text" class="form-control" id="newengName" name="newengName" value="<?php echo $getDocInfo['newengname'];?>" style="text-transform:uppercase"/>
							</div>
							<div class="col-md">
              <input type="text" class="form-control" id="newengSname" name="newengSname" value="<?php echo $getDocInfo['newengsname'];?>" style="text-transform:uppercase"/>
							</div>
					</div>
        <div class="form-group">
        <div class="row">
        <div class="col">          
          <label for="reason">เหตุผลเนื่องจาก:</label>
          <input type="text" class="form-control" id="reason" name="reason" value="<?php echo $getDocInfo['reason'];?>" />
        </div> 
        </div>
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
              <input type="file" class="form-control-file" id="stdFile1" name="stdFile1">
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal1" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
              <label for="stdPicFile2">2.สำเนาหนังสือสำคัญแสดงการเปลี่ยนชื่อ-สกุล</label>
              <input type="file" class="form-control-file" id="stdFile2" name="stdFile2">
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
              <label for="stdPicFile3">3.สำเนาหนังสือเดินทาง(กรณีเปลี่ยนชื่อ-สกุลภาษาอังกฤษตามหนังสือเดินทาง)</label>
              <input type="file" class="form-control-file" id="stdFile3" name="stdFile3">
              <div class="form-group" style="margin: 20px auto auto auto">             
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3" style="<?php echo $showattachedbutton;?>">Attached file</button>
              </div>
        </div>
          <input type="hidden" name="currentimageValue1" value="<?php echo $getDocInfo['stdFile1']; ?>"/>
          <input type="hidden" name="currentimageValue2" value="<?php echo $getDocInfo['stdFile2']; ?>"/>
          <input type="hidden" name="currentimageValue3" value="<?php echo $getDocInfo['stdFile3']; ?>"/>
          <input type="hidden" id="DocTypeID" name="DocTypeID" value="2"/>
          <input type="hidden" id="stateID" name="stateID" value="t02s01" />
          <div style="margin:  auto auto 20px auto">
          
          </div>
          <button style="margin: auto auto 20px auto" type="submit" class="btn btn-success btn-block">Update</button>
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