<?php
include_once("header.php");
?>


<script>

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
</script>

<?php
$err="";

$mid=$_GET["ID"];
$str="select * from member where MId='$mid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);

$row=$result->fetch_assoc();
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

$cid=$row["CollegeId"];
$str1="select * from college where CollegeId='$cid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();
$c=$row1["CollegeName"];

$sid=$row["StreamId"];
$str2="select * from stream where StreamId='$sid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$s=$row2["StreamName"];

$aid=$row["AreaId"];
$str3="select * from area where AreaId='$aid'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$a=$row3["AreaName"];

$address=$row["Address"];


if(isset($_POST["btnsave"]))
{

  $auth="";
  $auth=$_POST["txtisauth"];

  if(empty($auth))
  {
  	$auth=$isauth;
  	  $str4="update member set IsAuth='$auth' where MId='$mid'";
  $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
  $result4=$conn4->query($str4);

      echo "<script>location.href='member.php'</script>";
  
  }
  else
  {
  if($auth=="yes" || $auth=="no" || $auth=="YES" || $auth=="NO")
  {
  $str4="update member set IsAuth='$auth' where MId='$mid'";
  $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
  $result4=$conn4->query($str4);

      echo "<script>location.href='member.php'</script>";
  }
  else
  {
      echo "<script> alert('It must be either yes/YES or no/NO.'); </script>";
  }
}
}

if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='member.php'</script>");
}

?>
<section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><?php echo $uname; ?></h3>
            </div>
            <br>
            <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/user-photos/member/<?php echo "$pic"; ?>" class="img-square" width="100">
          </div>
            <br>
              <form name="myfrm" method="post">
            <div class="group-rom">

              <div class="first-part odd">UserName : </div>
              <div class="second-part"><?php  echo $uname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Password : </b></div>
              <div class="second-part"><?php  echo $pwd; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">FirstName : </div>
              <div class="second-part"><?php  echo $fname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>LastName : </b></div>
              <div class="second-part"><?php  echo $lname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Gender : </div>
              <div class="second-part"><?php  echo $gender; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Date Of Birth : </b></div>
              <div class="second-part"><?php  echo $dob; ?></div>
  	          </div>
            <div class="group-rom">
              <div class="first-part odd">Contact No : </div>
              <div class="second-part"><?php  echo $cno; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Email : </b></div>
              <div class="second-part"><?php  echo $email; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Address : </div>
              <div class="second-part"><?php  echo $address; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Date Of Join : </b></div>
              <div class="second-part"><?php  echo $doj; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">LastSeen : </div>
              <div class="second-part"><?php  echo $lseen; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Is Auth : </b></div>
              <div class="second-part"><input type="text" size="30" value="<?php  echo $isauth; ?>" name="txtisauth" maxlength='10' onkeypress="return charactersonly();">
                 </div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">College : </div>
              <div class="second-part"><?php  echo $c; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Stream : </b></div>
              <div class="second-part"><?php  echo $s; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Area : </div>
              <div class="second-part"><?php  echo $a; ?></div>
            </div>
            <div class="group-rom">
              <div class="second-part"><input class="btn btn-theme" type="submit" name="btnsave" value='Save'>
              <input class="btn btn-danger" type="submit" name="btncancel" value='Cancel'></div>
            </div>
            </form>
          </aside>
        </div>
        <!-- page end-->
      </section>
<?php
include_once("footer.php");
?>