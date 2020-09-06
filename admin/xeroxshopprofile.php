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

$xid=$_GET["ID"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();

$pic=$row["Pic"];
$uname=$row["XUname"];
$sname=$row["XName"];
$pwd=$row["XPwd"];
$fname=$row["XFname"];
$lname=$row["XLname"];
$doj=$row["DOJ"];
$cno=$row["ContactNo"];
$email=$row["Email"];
$lseen=$row["Lseen"];
$isauth=$row["IsAuth"];

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
 $str4="update xeroxshop set IsAuth='$auth' where XId='$xid'";
  $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
  $result4=$conn4->query($str4);

      echo "<script>location.href='xeroxshop.php'</script>";
 
  }
  else
  {
  if($auth=="yes" || $auth=="no" || $auth=="YES" || $auth=="NO")
  {
  $str4="update xeroxshop set IsAuth='$auth' where XId='$xid'";
  $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
  $result4=$conn4->query($str4);

      echo "<script>location.href='xeroxshop.php'</script>";
  }
  else
  {
      echo "<script> alert('It must be either yes or no'); </script>";
  }
}
}

if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='xeroxshop.php'</script>");
}

if(isset($_POST["btnstock"]))
{
  echo("<script>location.href='xeroxshopstock.php?ID=$xid'</script>");
}

if(isset($_POST["btnorder"]))
{
  echo("<script>location.href='xeroxshoporder.php?ID=$xid'</script>");
}

if(isset($_POST["btnperformance"]))
{
  echo("<script>location.href='xperformance.php?ID=$xid'</script>");
}

?>

<section class="wrapper site-min-height">
        <!-- page start-->
        <form name="myfrm" method="post">
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><?php echo $uname; ?></h3>
            </div>
            <br>
   
            <div>
            <img src="img/user-photos/xeroxshop/<?php echo "$pic"; ?>" class="img-square" width="100" style="margin-left: 2.5%;">
          </div>
            <br>
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
             <input type="submit" class="btn btn-primary" name="btnstock" value="Stock">      </div>
                <div class="btn-group">
                <input type="submit" class="btn btn-primary" name="btnorder" value="Order">   </div>
                <div class="btn-group">
                  <input type="submit" class="btn btn-primary" name="btnperformance" value="Performance">
           </div>
              </div>
              <br>
            <div class="group-rom">

              <div class="first-part odd">ShopName : </div>
              <div class="second-part"><?php  echo $sname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>UserName : </b></div>
              <div class="second-part"><?php  echo $uname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Password : </div>
              <div class="second-part"><?php  echo $pwd; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>FirstName : </b></div>
              <div class="second-part"><?php  echo $fname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">LastName : </div>
              <div class="second-part"><?php  echo $lname; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Contact No : </b></div>
              <div class="second-part"><?php  echo $cno; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Email : </div>
              <div class="second-part"><?php  echo $email; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Address : </b></div>
              <div class="second-part"><?php  echo $address; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Date Of Join : </div>
              <div class="second-part"><?php  echo $doj; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>LastSeen : </b></div>
              <div class="second-part"><?php  echo $lseen; ?></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd">Is Auth : </div>
              <div class="second-part"><input type="text" size="30" value="<?php  echo $isauth; ?>" name="txtisauth" maxlength='10' onkeypress="return charactersonly();"></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Area : </b></div>
              <div class="second-part"><?php  echo $a; ?></div>
            </div>
            <div class="group-rom">
              <div class="second-part"><input class="btn btn-theme" type="submit" name="btnsave" value='Save'>
              <input class="btn btn-danger" type="submit" name="btncancel" value='Cancel'></div>
            </div>
          </aside>
        </div>
        <!-- page end-->
        </form>
      </section>
  
<?php
include_once("footer.php");
?>