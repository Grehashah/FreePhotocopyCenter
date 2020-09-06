<?php
include_once("header.php");
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
                    
                    <h1>Select Shop</h1>
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
	          <div class="col-lg-6 col-md-6 col-sm-6">

	      <p><iframe src="https://www.google.com/maps/d/u/0/embed?mid=1bikGNmjASshBRCy0EbDZaBgd9iKJzY0O"width="1140" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
        </p>
        <br>
</div>
</div>
<div class='row'>
   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="inbox-left-sd">
						<div class="compose-ml">
                            <a class="btn waves-effect" href="#tab1">Full ShopList</a>
                            <a class="btn waves-effect" href="nlist.php#tab2">Nearby Shops</a>
                      
                        </div>
                      
                    </div>
                </div>
                  <div id='tab1'>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="inbox-text-list sm-res-mg-t-30">
                        <div class="form-group">
                            <div class="alert-list">
                            <div class="alert alert-success" role="alert" align='center'>
                              <font size='4' >ShopList&nbsp;</font>
                            </div>
                            </div>
                          </div>
                        </div>

                               
                                   <div class="normal-table-list" style='margin-top: -40px;'>
                        <div class="basic-tb-hd">
                            

								<?php

								$str="select * from Xeroxshop";
								$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
								$result1=$conn1->query($str);
								$str1="<table class='table table-hover'>";
								$str1.="<thead>
								            <tr> 
								                    <th> <font size='3'>Sr. No</font></th>
								                    <th> <font size='3'>Xeroxshop</font></th>
								                    <th> <font size='3'>Area</font></th>
								                   
								        </thead>";
								$no=1;

								while($row1=$result1->fetch_assoc())
								{
									$xname=$row1["XName"];
									$areaid=$row1["AreaId"];

								$str="select * from area where AreaId='$areaid'";
								$conn=mysqli_connect("localhost","root","","freephotocopycenter");
								$result=$conn->query($str);
								$row=$result->fetch_assoc();
								$aname=$row["AreaName"];


								      $str1.="<tr><td><a href='shop.php?ID=".$row1['XId']."'><font color='black'>".$no."</font></a></td><td><a href='shop.php?ID=".$row1['XId']."'><font color='black'>".$xname."</font></a></td><td><a href='shop.php?ID=".$row1['XId']."'><font color='black'>".$aname."</font></a></td></tr>";								      $no++;
								  
								}

								$str1.="</table>";
								echo $str1;

								?>
                            
                            </div>
                        </div>
                    </div>
                  </div>
          </div>
      </div>


<?php
include_once("footer.php");
?>
