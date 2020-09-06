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

$flag=0;
$mpwderr1="";
$gendererr1="";
$str="select * from admin where AdminId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();

$flag=0;
$pic=$row["Pic"];
$uname=$row["AdminUname"];
$pwd=$row["AdminPwd"];
$fname=$row["AdminFname"];
$lname=$row["AdminLname"];
$gender=$row["Gender"];
$doj=$row["DOJ"];
$dob=$row["DOB"];
$cno=$row["ContactNo"];
$email=$row["Email"];
$lseen=$row["Lseen"];
$isauth=$row["IsAuth"];
$address=$row["Address"];
$officename=$row["OfficeName"];
$areaid1=$row["AreaId"];

$str1="select * from area where AreaId='$areaid1'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();
$officearea=$row1["AreaName"];

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
$officename1=$_POST["txtofficename"];
   $areaid=$_POST["cmbarea"];
 

if(empty($uname1))
{
    $uname1=$row["AdminUname"]; 
}
if(empty($pwd1))
{
  $pwd1=$row["AdminPwd"];
}
if(empty($fname1))
{
  $fname1=$row["AdminFname"];
}
if(empty($lname1))
{
  $lname1=$row["AdminLname"];
}
if(empty($gender1))
{
 $gender1=$row["Gender"];
}
if(empty($dob1))
{
  $dob1=$row["DOB"];
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
if(empty($officename1))
{
  $officename1=$row["OfficeName"];
}
if(!$_POST['cmbarea'])
  {
    $areaid=$areaid1;
  }

$_SESSION["AdminUname"]=$uname1;

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
                  if($fileSize < 1000000) // 10 MB
                  {
                     $fileNameNew = "a".mt_rand(100000,999999).".".$fileActualExt;
                  $fileDestination="img/user-photos/admin/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
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
                    $str4="update admin set AdminUname='$uname1', AdminPwd='$pwd1', AdminFname='$fname1', AdminLname='$lname1', Gender='$gender1',Pic='$fileNameNew' , DOB='$dob1', ContactNo='$cno1', Email='$email1',OfficeName='$officename1', Address='$address1', AreaId='$areaid' where AdminId='$aid' ";
                    
                    $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
                    $result4=$conn4->query($str4);

                     echo "<script>location.href='profile.php'</script>";
            }
            else
            {
                          
                    $str4="update admin set AdminUname='$uname1', AdminPwd='$pwd1', AdminFname='$fname1', AdminLname='$lname1', Gender='$gender1',Pic='$pic' , DOB='$dob1', ContactNo='$cno1', Email='$email1',OfficeName='$officename1', Address='$address1', AreaId='$areaid' where AdminId='$aid' ";
                    
                    $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
                    $result4=$conn4->query($str4);

                     echo "<script>location.href='profile.php'</script>";
              }

        }
      }
?>


<section class="wrapper site-min-height">
  <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="" enctype="multipart/form-data">               
        <!-- page start-->
       <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><?php echo $uname; ?></h3>
            </div>
            <br>
            
            <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/user-photos/admin/<?php echo "$pic"; ?>" class="img-square" width="100"> 
          </div>

            <br>
            <div class="group-rom">
              <div class="first-part odd">UserName : </div>
              <div class="second-part"><input type='text' name='txtuname' size='50' value='<?php  echo $uname; ?>' maxlength='20' disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Password : </b></div>
              <div class="second-part"><input type='text' name='txtpwd' size='50' value='<?php  echo $pwd; ?>' maxlength='8'>
                <br>
                <font color="red"><?php echo $mpwderr1; ?></font></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">FirstName : </div>
              <div class="second-part"><input type='text' name='txtfname' size='50' value='<?php  echo $fname; ?>' onkeypress="return charactersonly();" maxlength='20'></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>LastName : </b></div>
              <div class="second-part"><input type='text' name='txtlname' size='50' value='<?php  echo $lname; ?>' onkeypress="return charactersonly();" maxlength='20'></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Gender : </div>
              <div class="second-part"><input type='text' name='txtgender' size='50' value='<?php  echo $gender; ?>' maxlength='20' onkeypress="return charactersonly();">
                <br><font color="red"><?php echo $gendererr1; ?></font></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Date Of Birth : </b></div>
              <div class="second-part"><input type='date' name='txtdob' size='50' value='<?php  echo $dob; ?>'></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Contact No : </div>
              <div class="second-part"><input type='text' name='txtcno' size='50' value='<?php  echo $cno; ?>' onkeypress=" return numbersonly(); " maxlength='10'></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Email : </b></div>
              <div class="second-part"><input type='email' name='txtemail' size='50' value='<?php  echo $email; ?>'disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Address : </div>
              <div class="second-part"><textarea name='txtaddress' rows='5' cols='52' maxlength='300'><?php  echo $address; ?></textarea></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Date Of Join : </b></div>
              <div class="second-part"><input  type="text" placeholder="<?php  echo $doj; ?>" disabled>
              </div>
            </div>

            <div class="group-rom">
              <div class="first-part odd">LastSeen : </div>
              <div class="second-part">
              <input  type="text" placeholder="<?php  echo $lseen; ?>" disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Is Auth : </b></div>
              <div class="second-part">
  

              <input  type="text" placeholder="<?php  echo $isauth; ?>" disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Office Name : </div>
              <div class="second-part"><input type='text' name='txtofficename' size='50' value='<?php  echo $officename; ?>' onkeypress="return charactersonly();"></div>
            </div>
          <div class="group-rom">
                    <div class="first-part"><b>Office Area : </b></div>
                      <div class="second-part">
                        <input type='text' name='txtofficearea' value='<?php  echo $officearea; ?>' disabled><br><br>
                        <select name="cmbarea">
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
                
    
                  <div class="group-rom">
                    <div class="first-part odd"><b>Change Profile Picture : </b></div>
                  <div class="second-part">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      <input type="hidden" name="size" value="1000000">
                      <input type="file" name="image" style="font-size: 15px;">  
                     <br>
                 </div>
                </div>
                </div>

            <div class="group-rom">
              <div class="second-part">
              <input class="btn btn-theme" type="submit" name="btnupdate" value='Update'></div>
            </div>

            </aside>
        </div>
        <!-- page end-->
        </form>
          
      </section>
<?php
include_once("footer.php");
?>