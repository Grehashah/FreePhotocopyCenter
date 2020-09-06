<?php
include_once("header.php");
?>

<script>

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
$perr="";
$derr="";
$aaid=$_GET["ID"];
$str="select * from advertisetype where AdtypeId='$aaid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);

$row=$result->fetch_assoc();
$name=$row["AdtypeName"];
$price=$row["Price"];
$duration=$row["Duration"];


if(isset($_POST["btnsave"]))
{
   $price1=$_POST["txtprice"];
  $duration1=$_POST["txtduration"];
  
  if(empty($price1))
  {
    $perr="Must be filled.";
  }
  else if(empty($duration1))
  {
    $derr="Must be filled";
  }
  else
  {

    $str4="update advertisetype set Price='$price1', Duration='$duration1' where AdtypeId='$aaid'";
    $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
    $result4=$conn4->query($str4);

      echo "<script>location.href='listadvtype.php'</script>";
    }
}

if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='listadvtype.php'</script>");
}

?>
<section class="wrapper site-min-height">
        <!-- page start-->
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><?php echo $name; ?> Package details</h3>
            </div>
            <br>
            <br>
              <form name="myfrm" method="post">
            <div class="group-rom">

              <div class="first-part odd">Package-Name : </div>
              <div class="second-part">
                <b><?php  echo $name; ?></b>
            </div>
            <div class="group-rom">
              <div class="first-part"><b>Price<font color='red'><sup>*</sup></font> : </b></div>
              <div class="second-part">
                <input type="text" maxlength="30" size="30" name="txtprice" value="<?php  echo $price; ?>" onkeypress="return numsonly();">    <font size='2' color="red"><?php echo $perr; ?></font>
                 </div>  
                 
            </div>
            <div class="group-rom">
              <div class="first-part odd">Duration<font color='red'><sup>*</sup></font> : </div>
              <div class="second-part">
                <input type="text" maxlength="30" size="30" name="txtduration" value="<?php  echo $duration; ?>  " onkeypress="return numsonly();">      <font size='2' color="red"><?php echo $derr; ?></font>
                 
                 
              </div>
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