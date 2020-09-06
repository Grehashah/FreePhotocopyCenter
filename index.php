<?php
include_once("header1.php");
?>
<?php
if(isset($_POST["btnyes"]))
{
  echo("<script>location.href='login.php'</script>");
}

if(isset($_POST["btnno"]))
{
  echo("<script>location.href='register.php'</script>");
}
?>


<div class="wizard-area">
  <form name="frm1" method="post">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wizard-wrap-int">
                        <div class="wizard-hd">
                          <h3><i class="fa fa-angle-right"></i> Home Page</h3>
                            
                            <br>
                            
                            
                            <center><img src="img/icons/free-photocopy.jpg" style="width:1200px;height:550px;"></center><br><br>

                  <div class="modals-default-cl" style='margin-top: 13px; margin-left: 300px;'>
                                <button type="button" class="btn nk-light-blue btn-info waves-effect" data-toggle="modal" data-target="#myModalone" style='width : 500px; height: 55px;'><font size="5">&nbsp;&nbsp;To Start Click here!&nbsp;&nbsp;</font>
                            </button>
                                <div class="modal fade" id="myModalone" role="dialog" style="display: none;">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h3>Information</h3>
                                                <p><font size='2'>Do you have registered yet ? If yes then please press "yes" and if no then press "no". If you have not registered yet then kindly registered first. Thank You !</font></p>
                                            </div>
                                            <br>
                                            <div class="modal-footer">
                                                <button  class="btn btn-default waves-effect" data-dismiss="" type="submit" name=
                                                "btnyes"  style="width:90px; height: 40px"><font size='3'>Yes</font></button>
                                                <button type="submit" class="btn btn-default waves-effect" data-dismiss="" name="btnno" style="width:90px; height: 40px"><font size='3'>No</font></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

