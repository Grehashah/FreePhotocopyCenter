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
$aid=$_SESSION["XeroxshopId"];
$str="select * from xeroxshop where XId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();

$pic=$row["Pic"];
$xsname=$row["XName"];
$uname=$row["XUname"];
$pwd=$row["XPwd"];
$fname=$row["XFname"];
$lname=$row["XLname"];
$doj=$row["DOJ"];
$cno=$row["ContactNo"];
$email=$row["Email"];
$lseen=$row["Lseen"];
$isauth=$row["IsAuth"];
$address=$row["Address"];
$areaid1=$row["AreaId"];

$str3="select * from area where AreaId='$areaid1'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$a=$row3["AreaName"];

if(isset($_POST["btnupdate"]))
{

//$pic=$row["txtpic"];
$xsname1=$_POST["txtxsname"];
//$uname1=$_POST["txtuname"];
$pwd1=$_POST["txtpwd"];
$fname1=$_POST["txtfname"];
$lname1=$_POST["txtlname"];
$cno1=$_POST["txtcno"];
//$email1=$_POST["txtemail"];
$address1=$_POST["txtaddress"];
$areaid=$_POST["cmbarea"];



if(empty($xsname1))
{
  $xsname1=$row["XName"]; 
}
if(empty($uname1))
{
    $uname1=$row["XUname"]; 
}
if(empty($pwd1))
{
  $pwd1=$row["XPwd"];
}
if(empty($fname1))
{
  $fname1=$row["XFname"];
}
if(empty($lname1))
{
  $lname1=$row["XLname"];
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
  
$_SESSION["XeroxshopUname"]=$uname1;

 if(strlen($pwd1)!=8)
  {
      $mpwderr1="Password Must be of 8 Characters.";  
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
                     $fileNameNew = "x".mt_rand(100000,999999).".".$fileActualExt;
                  $fileDestination="img/user-photos/xeroxshop/".$fileNameNew;
     $fileDestination1="../admin/img/user-photos/xeroxshop/".$fileNameNew;
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
        
$str4="update xeroxshop set XName='$xsname1', XUname='$uname1', XPwd='$pwd1', XFname='$fname1', XLname='$lname1',Pic='$fileNameNew' ,ContactNo='$cno1', Email='$email1',Address='$address1', AreaId='$areaid' where XId='$aid'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);

 echo "<script>location.href='profile.php'</script>";
         }
            else
            {
                          
             
$str4="update xeroxshop set XName='$xsname1', XUname='$uname1', XPwd='$pwd1', XFname='$fname1', XLname='$lname1',Pic='$pic' ,ContactNo='$cno1', Email='$email1',Address='$address1', AreaId='$areaid' where XId='$aid'";
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/user-photos/xeroxshop/<?php echo $pic; ?>" class="img-square" width="100"> 
            
            
          </div>
            <br>


            <div class="group-rom">

              <div class="first-part odd"><b>Xerox-Shop Name : </b></div>
              <div class="second-part"><input type='text' name='txtxsname' size='50' value='<?php  echo $xsname; ?>'  maxlength='20'></div>
            </div>
            <div class="group-rom">

              <div class="first-part"><b>UserName : </b></div>
              <div class="second-part"><input type='text' name='txtuname' size='50' value='<?php  echo $uname; ?>'  maxlength='20' disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd"><b>Password : </b></div>
              <div class="second-part"><input type='text' name='txtpwd' size='50' value='<?php  echo $pwd; ?>'  maxlength='8'>       <br>
                <font color="red"><?php echo $mpwderr1; ?></font>
              </div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>FirstName : </b></div>
              <div class="second-part"><input type='text' name='txtfname' size='50' value='<?php  echo $fname; ?>'  maxlength='20'  onkeypress="return charactersonly();"></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd"><b>LastName : </b></div>
              <div class="second-part"><input type='text' name='txtlname' size='50' value='<?php  echo $lname; ?>'  maxlength='20' onkeypress="return charactersonly();"></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Contact No : </b></div>
              <div class="second-part"><input type='text' name='txtcno' size='50' value='<?php  echo $cno; ?>' maxlength='10' onkeypress="return numbersonly();"></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd"><b>Email : </b></div>
              <div class="second-part"><input type='text' name='txtemail' size='50' value='<?php  echo $email; ?>' disabled></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Address : </b></div>
              <div class="second-part"><textarea name='txtaddress' rows='5' cols='52'  maxlength='300'><?php  echo $address; ?></textarea></div>
            </div>

            <div class="group-rom">
              <div class="first-part"><b>Date Of Join : </b></div>
              <div class="second-part"><input  type="text" placeholder="<?php  echo $doj; ?>" disabled="">
              </div>
            </div>

            <div class="group-rom">
              <div class="first-part odd">LastSeen : </div>
              <div class="second-part">
              <input  type="text" placeholder="<?php  echo $lseen; ?>" disabled=""></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Is Auth : </b></div>
              <div class="second-part">
              <input  type="text" placeholder="<?php  echo $isauth; ?>" disabled=""></div>
            </div>           
             <div class="group-rom">
                    <div class="first-part"><b>Office Area : </b></div>
                      <div class="second-part">
                        <input  type="text" placeholder="<?php  echo $a; ?>" disabled><br><br>
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