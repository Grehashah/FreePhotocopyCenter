<?php
include_once("header.php");
?>

<?php
$dur="";
$packagename="";
$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);

while($row=$result->fetch_assoc())
{	
$advtypeid=$row["AdtypeId"];
}

$str1="select * from advertisetype where AdtypeId='$advtypeid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();

$packagename=$row1["AdtypeName"];
$price=$row1["Price"];
$dur=$row1["Duration"]; 

        $dos=date("Y-m-d", strtotime('+1 days'));
        $doe = date('Y-m-d', strtotime('+'.$dur.'days'));

?>

<section class="wrapper site-min-height"><div class="col-lg-12 mt">
<form  method="post" enctype="multipart/form-data" action=<?php echo "http://localhost/freephotocopycenter/paytm/PaytmKit/pgRedirect.php?type=$packagename&id=$aid" ?>>
                      <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>Free PhotoCopy Center</h1>
                  <address>
                <strong>Aakash Infotech</strong><br>
                795 Platinum Plaza,Memnagar<br>
                Ahemedabad, 380052<br>
                P : (+91) 8401529943
                    <br>
                    <br> 
              </address>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Sr.no</th>
                      <th class="text-left">Package Name</th>
                      <th style="width:150px" class="text-right">Date Of Start</th>
                      <th style="width:150px" class="text-right">Date Of End</th>
                      <th style="width:100px" class="text-right">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td><?php echo $packagename; ?></td>
                      <td class="text-right"><?php echo $dos; ?></td>
                      <td class="text-right"><?php echo $doe; ?></td>
                      <td class="text-right"><?php echo "₹ ".$price; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" rowspan="4">
                        </td>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo "₹ ".$price ?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>

               		<br>
         

                <div Align='Center'>
                <input class="btn btn-primary btn-lg" type="submit" name="btnmp" value="Make Payment" onclick="">
              </div>
            </div>
          
           </div>
         </div>
       </form>
     </div>
   </section>

</section>

<?php
include_once("footer.php");
?>