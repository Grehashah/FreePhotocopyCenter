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
$currqty1=0;
$str1="select * from stock";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
  $no=$row1["StockId"];
}

$str2="select * from stock where StockId='$no'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$currqty=$row2["CurrQty"];

if(isset($_POST["btnsubmit"]))
{

  $str3="select * from stock";
  $conn3=mysqli_connect("localhost","root","","freephotocopycenter");
  $result3=$conn3->query($str3);

  while($row3=$result3->fetch_assoc())
  {
    $no1=$row3["StockId"];
  } 
  
  $assignstock=$_POST["txtassignstock"]; 

  if(empty($assignstock))
  {
    echo "<script>alert('Field Must be Filled.');</script>"; 
  }
  else
  {

  $currqty1=$currqty+$assignstock;
  $str4="update stock set CurrQty='$currqty1' where StockId='$no1'";
  $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
  $result4=$conn4->query($str4);

  echo("<script>location.href='stockdetails.php'</script>");   
}
}

?>

<section class="wrapper site-min-height">
  <form method="post">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Current Stock Details</b></font><a data-toggle="modal" class='btn btn-round btn-primary' href="stockdetails.php#myModal" style='margin-left: 68%;'>Assign More Stock</a><hr>
                    
                <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Total Quantity</font></h5>
                  </div>
  <img src='img/icons/total.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b><?php echo $currqty ?></b></font> 
                </div>
                <!-- /grey-panel -->
              </div>


          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Assigning Stock</h4>
                </div>
                <div class="modal-body">
                  <input type="text" value="" name="txtassignstock" placeholder="Enter Quantity of stock you want to add " autocomplete="off" class="form-control placeholder-no-fix" onkeypress="return numsonly();">
                </div>
                <div class="modal-footer">
                  <input data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel' value='Cancel'>
                  <input class="btn btn-theme" type="submit" name='btnsubmit' value='Submit'>              
                </div>
              </div>
            </div>
          </div>
              </div>
          </div>
        </div>
      </form>
</section>

<?php
include_once("footer.php");
?>