<?php
include_once("header1.php");
?>

<script>

function charactersonly()
{
  if((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<=122))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function numsonly()
{
  if((event.keyCode>=48 && event.keyCode<=59))
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

$no=0;
$admincnt1=0;
$xeroxshopcnt1=0;
$advcnt1=0;
$membercnt1=0;
$muname="";
$mfname="";
$mlname="";
$mpwd="";
$gender="";
$address="";
$contactno="";
$email="";
$dob="";
$doj="";
$pic="";
$lastseen="";
$isauth="";
$officename="";
$address="";
$areaid="";
$collegeid="";
$streamid="";
$collegename="";
$streamname="";
$areaname="";
$str="";
$result="";
$conn="";
$doberr="";
$confirmpwd="";
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$s6="";
$s7="";
$s8="";
$s9="";
$s10="";
$s11="";
$c1="";
$c2="";
$c3="";
$c4="";
$c5="";
$c6="";
$c7="";
$c8="";
$c9="";
$c10="";
$c11="";
$ss1="";
$ss2="";
$ss3="";
$ss4="";
$ss5="";
$ss6="";
$ss7="";
$ss8="";
$ss9="";
$ss10="";
$ss11="";
$ss12="";
$r1="";
$r2="";
$munameerr="";
$mpwderr="";
$confirmpwderr="";
$confirmpwderr1="";
$contactnoerr="";
$contactnoerr1="";
$emailerr="";
$areaiderr="";
$collegeiderr="";
$streamiderr="";
$addresserr="";
$mfnameerr="";
$mlnameerr="";
$mgendererr="";
$doberr="";
$mstreamerr="";
$mcollgeerr="";
$mpwderr="";
$mpwderr1="";
$mareaerr="";
$mpicerr="";
$mpicerr1="";
$mpicerr2="";
$mpicerr3="";
$flag=0;
$fileNameNew="";
$fileActualExt="";
$fileTmpName="";
$fileDestination="";
$fileSize="";
$fileName="";
$fileError="";
$fileType="";
$fileExt="";
$file="";


if(isset($_POST["btnsubmit"]))
{
    $dob=$_POST['txtdob'];
    $muname=$_POST['txtusername'];
    $areaid=$_POST["cmbarea"];
    $streamid=$_POST["cmbstream"];
    $collegeid=$_POST["cmbcollege"];
    $email=$_POST["txtemail"];
    $contactno=$_POST["txtcontactno"];
    $confirmpwd=$_POST["txtconfirm_password"];
    $mpwd=$_POST["txtpassword"];
    $mlname=$_POST["txtlastname"];
    $mfname=$_POST["txtfirstname"];
    $address=$_POST["txtaddress"];
    if(!empty($_POST["rdbgender"]))
  {
  $gender=$_POST["rdbgender"];  
    if($gender=="male")
  {
    $r1="checked";
  }
  if($gender=="female")
  {
    $r2="checked";
  }
  
  }


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

    
  //validations

  if(empty($mfname))
  {
      $mfnameerr="Must be filled.";
  }
  else if(empty($mlname))
  {
      $mlnameerr="Must be filled.";
  } 
  else if(empty($muname))
  {
      $munameerr="Must be filled.";
  }
  else if(empty($gender))
  {
    $mgendererr="Must be Selected.";
  }
  else if(empty($mpwd))
  {
      $mpwderr="Must be filled.";
  }
  else if(strlen($mpwd)!=8)
  {
      $mpwderr1="Password Must be of 8 Characters.";  
  }
  else if(empty($confirmpwd))
  {
      $confirmpwderr="Must be filled.";
  }
  else if($confirmpwd!=$mpwd)
  {
    $confirmpwderr1="Password did not Match."; 
  }
  else if(empty($contactno))
  {
      $contactnoerr="Must be filled.";
  }
  else if(strlen($contactno)!=10)
  {
      $contactnoerr1="Contact No. Must be of 10 Numbers.";
  }
  else if(empty($email))
  {
      $emailerr="Must be filled.";
  }
  else if(!$_POST["cmbcollege"])
  {
      $mcollgeerr="Any one of them must be chosen.";
  }
  else if(!$_POST["cmbstream"])
  {
      $mstreamerr="Any one of them must be chosen.";
  }
  else if(empty($address))
  {
      $addresserr="Must be filled.";
  }
  else if(!$_POST["cmbarea"])
  {
      $mareaerr="Any one of them must be chosen.";
  }
  else if($fileName=="")
  {
    $mpicerr="Pic must be uploaded.";
  }
  else if(!in_array($fileActualExt, $allowed))
  { 
   $mpicerr1="Only jpg , jpeg or png image are allowed.";
  }
  else if($fileError != 0)
  {
    $mpicerr2="There was an error while uploading your Image.";
  }
  else if($fileSize > 1000000)
  { 
   $mpicerr3="Your Image size must be within 10MB.";
  }
  else
  {
        //main coding

  $isauth="yes";

  


  date_default_timezone_set('Asia/Kolkata');
  $doj=date("Y-m-d h-i-s");

  date_default_timezone_set('Asia/Kolkata');
  $lastseen=date("Y-m-d h-i-s");

//unique id and email required
      $stradmin="select * from admin where AdminUname='$muname'";
        $strmember="select * from member where MUname='$muname'";
        $strxeroxshop="select * from xeroxshop where XUname='$muname'";
        $stradvertiser="select * from advertiser where AUname='$muname'";
      
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
        $adminresult1=$conn1->query($stradmin);
        $admincnt1=mysqli_num_rows($adminresult1);
       
        $xeroxshopresult1=$conn1->query($strxeroxshop);
        $xeroxshopcnt1=mysqli_num_rows($xeroxshopresult1);
       
        $advresult1=$conn1->query($stradvertiser);
        $advcnt1=mysqli_num_rows($advresult1);
       
        $memberresult1=$conn1->query($strmember);
        $membercnt1=mysqli_num_rows($memberresult1);

 if($admincnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";
 }
 if($xeroxshopcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";

 }
 if($advcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";

 }
 if($membercnt1!=0)
 {

  $flag=1;  
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";
 }



        $stradmin="select * from admin where Email='$email'";
        $strmember="select * from member where Email='$email'";
        $strxeroxshop="select * from xeroxshop where Email='$email'";
        $stradvertiser="select * from advertiser where Email='$email'";
      
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
        $adminresult1=$conn1->query($stradmin);
        $admincnt1=mysqli_num_rows($adminresult1);
       
        $xeroxshopresult1=$conn1->query($strxeroxshop);
        $xeroxshopcnt1=mysqli_num_rows($xeroxshopresult1);
       
        $advresult1=$conn1->query($stradvertiser);
        $advcnt1=mysqli_num_rows($advresult1);
       
        $memberresult1=$conn1->query($strmember);
        $membercnt1=mysqli_num_rows($memberresult1);

 if($admincnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";
}
 if($xeroxshopcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";

 }
 if($advcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";
}
 if($membercnt1!=0)
 {
  $flag=1;
   echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";
 }


 if($flag==0)
 {
                  $strr="select * from member";
                  $connn=mysqli_connect("localhost","root","","freephotocopycenter");
                  $resultt=$connn->query($strr);
                  while($roww=$resultt->fetch_assoc())
                  {
                    $no++;
                  }
                  $no++;
                    $fileNameNew = "m".mt_rand(100000,999999).$no.".".$fileActualExt;
                    $fileDestination="member/template/img/user-photos/member/".$fileNameNew;
                    $fileDestination1="admin/img/user-photos/member/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                     copy($fileDestination,$fileDestination1);

                $str="insert into member values('','$muname','$mpwd','$mfname','$mlname','$gender','$fileNameNew','$doj','$dob','$contactno','$email','$lastseen','$isauth','$collegeid','$streamid','$address','$areaid')";

                 $conn=mysqli_connect("localhost","root","","freephotocopycenter");
                 $result=$conn->query($str);

                echo("<script>location.href='http://localhost/freephotocopycenter/login.php'</script>");
               
 } 
 }         
}


if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='login.php'</script>");
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
                    
                    <h1>Registration Form</h1>
                    <p><span class="bread-ntd"></span>Do registration to be a member of Free Photocopy Center.</p> 
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
                       


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Firstname<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                           <input class="form-control input-sm" id="firstname" name="txtfirstname" type="text" value="<?php echo $mfname; ?>" onkeypress="return charactersonly();" maxlength='20'><font color="red"><?php echo $mfnameerr; ?></font>
                   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Lastname<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                             <input class="form-control input-sm" id="lastname" name="txtlastname" type="text" onkeypress="return charactersonly();" value="<?php echo $mlname; ?>" maxlength='20'><font color="red"><?php echo $mlnameerr; ?></font>   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Username<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                        <input class="form-control input-sm" id="username" name="txtusername" type="text" value="<?php echo $muname; ?>" maxlength='20'><font color="red" maxlength='20'><?php echo $munameerr; ?></font>
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
                             <input type="radio" value="male" name="rdbgender" <?php echo $r1; ?>> Male </input>&nbsp;
                    <input type="radio" value="female" name="rdbgender" <?php echo $r2; ?>> Female </input>&nbsp;&nbsp;<font color="red"><?php echo $mgendererr; ?></font>
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
                                        <label class="hrzn-fm"><font size="3"><b>Password<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                         <input class="form-control input-sm" id="password" name="txtpassword" type="password" maxlength='8' value="<?php echo $mpwd; ?>"><font color="red"><?php echo $mpwderr; echo $mpwderr1; ?></font>
                   </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Confirm Password<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                           <input class="form-control input-sm" id="confirm_password" name="txtconfirm_password" maxlength="8" type="password" value="<?php echo $confirmpwd; ?>"><font color="red"><?php echo $confirmpwderr; ?><?php echo $confirmpwderr1; ?></font>
                   </div>
                                    </div>
                                </div>
                            </div>
                        </div>


          <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Date of Birth :</b></font></label>
                                    </div>
                                   
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input class="form-control input-sm" id="dob" name="txtdob" type="date" value="<?php echo $dob; ?>">
                    </div>
                                    </div>
                                   </div>
                                 </div>
                               </div>


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Contact No.<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                          <input class="form-control input-sm" id="contactno" name="txtcontactno" type="text" maxlength='10' onkeypress="return numsonly();" value="<?php echo $contactno; ?>"><font color="red"><?php echo $contactnoerr; echo $contactnoerr1; ?></font>
                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Email Address<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                                <input class="form-control input-sm" id="email" name="txtemail" type="email" value="<?php echo $email; ?>"><font color="red"><?php echo $emailerr; ?></font>
                
                  </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>College<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        

                                      <select name="cmbcollege">

                            <option value='0'>Select College </option>
                       <?php
    $str="select * from college";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["CollegeId"].">".$row["CollegeName"]."</option>";
                            } 
                          ?>
                      </select>&nbsp;&nbsp;
                      <font color="red"><?php echo $mcollgeerr; ?></font>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Stream<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                       
                                          <select name="cmbstream">      <option value='0'>Select Stream </option>
                     
                        <?php
    $str="select * from stream";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["StreamId"].">".$row["StreamName"]."</option>";
                            } 
                          ?>
                      </select>&nbsp;&nbsp;
                      <font color="red"><?php echo $mstreamerr; ?></font>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Address<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                           <textarea class="form-control input-sm" id="address" name="txtaddress" rows="5" cols="10" maxlength="300"><?php echo $address; ?></textarea><font color="red"><?php echo $addresserr; ?></font>
                   </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Area<sup><font color='red'>*</font></sup><br><sub>(Area where you live)</sub>  :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                       <select name="cmbarea">      <option value='0'>Select Area </option>
                     
                          <?php
    $str="select * from area";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["AreaId"].">".$row["AreaName"]."</option>";
                            } 
                          ?>
                          </select>&nbsp;&nbsp;
                        	<font color="red"><?php echo $mareaerr; ?></font>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                       <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><font size="3"><b>Image Upload<sup><font color='red'>*</font></sup> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="hidden" name="size" value="1000000">
                      <input type="file" name="image" style="font-size: 15px;"> 
                      	<font color="red"><?php echo $mpicerr; echo $mpicerr1; echo $mpicerr2; echo $mpicerr3; ?></font>
                          
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
                                    <button class="btn btn-success notika-btn-success waves-effect" name="btnsubmit" type='submit'>Submit</button>
                                     <button class="btn btn-danger notika-btn-success waves-effect" name="btncancel" type='submit'>Cancel</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>


<?php
include_once("footer1.php");
?>