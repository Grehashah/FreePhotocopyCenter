<?php
include_once("header.php");
?>
<script>

function charnumonly()
  {
    if((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<122) || (event.keyCode>=48 && event.keyCode<=57) || event.keyCode==32)
    {
      return true;
    }
    else
    {
      return false;
    }
  }

function charactersonly()
{
  if((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<122))
  {
    return true;
  }
  else
  {
    return false;
  }
}

function numbersonly()
{
  if(event.keyCode>=48 && event.keyCode<=57)
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>

<?php

$mpwderr1="";
$gendererr1="";
$str="select * from member where MId='$mid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();

$fileNameNew="";
$pic=$row["Pic"];
$uname=$row["MUname"];
$pwd=$row["MPwd"];
$fname=$row["MFname"];
$lname=$row["MLname"];
$gender=$row["Gender"];
$doj=$row["DOJ"];
$dob=$row["DOB"];
$cno=$row["ContactNo"];
$email=$row["Email"];
$lseen=$row["Lseen"];
$isauth=$row["IsAuth"];
$collegeid1=$row["CollegeId"];
$streamid1=$row["StreamId"];
$address=$row["Address"];
$areaid1=$row["AreaId"];

$str_1="select * from stream where StreamId='$streamid1'";
$conn_1=mysqli_connect("localhost","root","","freephotocopycenter");
$result_1=$conn_1->query($str_1);
$row_1=$result_1->fetch_assoc();
$Streamname=$row_1["StreamName"];

$str_1="select * from college where CollegeId='$collegeid1'";
$conn_1=mysqli_connect("localhost","root","","freephotocopycenter");
$result_1=$conn_1->query($str_1);
$row_1=$result_1->fetch_assoc();
$collegename=$row_1["CollegeName"];

$str_1="select * from area where AreaId='$areaid1'";
$conn_1=mysqli_connect("localhost","root","","freephotocopycenter");
$result_1=$conn_1->query($str_1);
$row_1=$result_1->fetch_assoc();
$areaname=$row_1["AreaName"];


if(isset($_POST["btnupdate"]))
{
//$uname1=$_POST["txtuname"];
$pwd1=$_POST["txtpwd"];
$fname1=$_POST["txtfname"];
$lname1=$_POST["txtlname"];
$gender1=$_POST["txtgender"];
$dob1=$_POST["txtdob"];
$cno1=$_POST["txtcno"];
//$email1=$_POST["txtemail"];
$address1=$_POST["txtaddress"];
$areaid=$_POST["cmbarea"];
$collegeid=$_POST["cmbcollege"];
$streamid=$_POST["cmbstream"];

if(empty($uname1))
{
    $uname1=$row["MUname"]; 
}
if(empty($pwd1))
{
  $pwd1=$row["MPwd"];
}
if(empty($fname1))
{
  $fname1=$row["MFname"];
}
if(empty($lname1))
{
  $lname1=$row["MLname"];
}

if(empty($gender1))
{
 $gender1=$row["Gender"];
}
if(empty($cno1))
{
  $cno1=$row["ContactNo"];
}
if(empty($email1))
{
  $email1=$row["Email"];
}
if(empty($address1))
{
  $address1=$row["Address"];
}
if(!$_POST['cmbarea'])
  {
    $areaid=$areaid1;
  }
if(!$_POST['cmbcollege'])
  {
    $collegeid=$collegeid1;
  }
if(!$_POST['cmbstream'])
  {
    $streamid=$streamid1;
  }


$_SESSION["MemberUname"]=$uname1;

if(strlen($pwd1)!=8)
  {
      $mpwderr1="Password Must be of 8 Characters.";  
  } 
  else if($gender1!="male" && $gender1!="female")
  {
      $gendererr1="Gender must be either male or female";  
  }
  else
  {
              //Image Upload 

              $file=$_FILES['image'];
              $fileName=$_FILES['image']['name'];
              $fileTmpName=$_FILES['image']['tmp_name'];
              $fileSize=$_FILES['image']['size'];
              $fileError=$_FILES['image']['error'];
              $fileType=$_FILES['image']['type'];

              $fileExt=explode('.', $fileName);
              $fileActualExt=strtolower(end($fileExt));

              $allowed=array('jpg','jpeg','png');


            if($fileName!="")
              {
                if(in_array($fileActualExt, $allowed))
                {
                  if($fileError === 0)
                  {
                      if($fileSize < 1000000) // 5 MB
                      {
                            $fileNameNew = "m".mt_rand(100000,999999).".".$fileActualExt;
              $fileDestination="img/user-photos/member/".$fileNameNew;
$fileDestination1="../../admin/img/user-photos/member/".$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
           copy($fileDestination,$fileDestination1);
             
                      }
                      else
                      {
                        echo "<script> alert('Your Image is too big!') </script>";
                      }
                  } 
                  else
                  {
                      echo "<script> alert('There was an error uploading your Image!') </script>";
                  }
                }
                else
                {
                    echo "<script> alert('Only jpg , jpeg or png image are allowed!') </script>";     
                }
            }

               if($fileNameNew != "")
              {                    
                    $str4="update member set MUname='$uname1', MPwd='$pwd1', MFname='$fname1', MLname='$lname1', Gender='$gender1',Pic='$fileNameNew' , DOB='$dob1', ContactNo='$cno1', Email='$email1',CollegeId='$collegeid', StreamId='$streamid', Address='$address1', AreaId='$areaid' where MId='$mid' ";
                    
                    $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
                    $result4=$conn4->query($str4);

                     echo "<script>location.href='profile.php'</script>";
            }
            else
            {
                          
                     $str4="update member set MUname='$uname1', MPwd='$pwd1', MFname='$fname1', MLname='$lname1', Gender='$gender1',Pic='$pic' , DOB='$dob1', ContactNo='$cno1', Email='$email1',CollegeId='$collegeid', StreamId='$streamid', Address='$address1', AreaId='$areaid' where MId='$mid' ";
                    
                    $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
                    $result4=$conn4->query($str4);

                     echo "<script>location.href='profile.php'</script>";
              }
          
}
}
?>


        <div class="breadcomb-area">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <i class="notika-icon notika-edit"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    
                    <h1>Profile Details</h1>
                    <p><span class="bread-ntd"></span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="row">
  <form name="frm1" method="post" enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-29">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <center><h2><font size="5"><?php echo $uname; ?>'s Details</font></h2></center>
                        </div>

                        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><img src="img/user-photos/member/<?php echo "$pic"; ?>" class="img-square" width="150" height='150'></center> 
          </div><br><br>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Username :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" name="txtuname" class="form-control input-sm" placeholder="" maxlength='20' disabled value="<?php echo $uname; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Password :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtpwd" maxlength='8' value="<?php echo $pwd; ?>">

                <font color="red"><?php echo $mpwderr1; ?></font>
         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Firstname :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtfname" maxlength='20' value="<?php echo $fname; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Lastname :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtlname" maxlength='20' value="<?php echo $lname; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Gender :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtgender" maxlength='20' value="<?php echo $gender; ?>" onkeypress="return charactersonly();"><font color="red"><?php echo $gendererr1; ?></font>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Date Of Birth :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="date" class="form-control input-sm" placeholder="" name="txtdob" value="<?php echo $dob; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Contact No. :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtcno" maxlength="10" onkeypress="return numbersonly();" value="<?php echo $cno; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Email Address :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" name="txtemail" disabled value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>College :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st"><input type="text" class="form-control input-sm" placeholder="" value="<?php echo $collegename; ?>" disabled=""><br>
                                          <select name="cmbcollege">
                                                                  <option value='0'>Select College</option>
   
                          <?php
    $str="select * from college";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["CollegeId"].">".$row["CollegeName"]."</option>";
                            } 
                          ?>
                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Stream :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input type="text" class="form-control input-sm" placeholder="" value="<?php echo $Streamname; ?>" disabled=""><br><select name="cmbstream">
                                                                  <option value='0'>Select stream</option>
   
                          <?php
    $str="select * from stream";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["StreamId"].">".$row["StreamName"]."</option>";
                            } 
                          ?>
                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Date Of Join :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" disabled="" value="<?php echo $doj; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>LastSeen :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" disabled="" value="<?php echo $lseen; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Is Auth :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" placeholder="" disabled="" value="<?php echo $isauth; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Address :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <textarea rows="5" cols="10" class="form-control input-sm" placeholder="" maxlength="300" name="txtaddress"><?php echo $address; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Area :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st"><input type="text" class="form-control input-sm" placeholder="" value="<?php echo $areaname; ?>" disabled=""><br><select name="cmbarea">
                                                                <option value='0'>Select Area</option>
   
                          <?php
    $str="select * from area";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["AreaId"].">".$row["AreaName"]."</option>";
                            } 
                          ?>
                          </select>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Change Profile Picture :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <br>
                      <input type="hidden" name="size" value="1000000">
                      <input type="file" name="image" style="font-size: 15px;">  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-success notika-btn-success waves-effect" name="btnupdate">Update</button>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>


<?php
include_once("footer.php");
?>