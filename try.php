<?php
session_start();
 ?>
<div class="container">
            <form class="form-horizontal" role="form" method="post" action="try.php" enctype="multipart/form-data">
                <div class="form-group">
                       <label  class="col-sm-3 control-label">Upload resume* </label>
                   <div class="col-sm-9">
                       <input type="file" name="resume"  class="form-control" required>
                   </div>
                
              </div>
              <input type="submit" class="btn btn-success btn-lg btn-block" name="submit" value="Submit">
            </form>
</div>
        <?php
        //include('../dbcon.php');
        $con=mysqli_connect('localhost','root','Lucky@123','pms1');
        if($con)
        {
            echo "connected";
        }
        else
        {
            echo "not connected";
        }
        if(isset($_POST['submit']))
        {
          
          $filename=$_FILES['resume']['name'];
          $target_path = "/var/www/lucky/pms/images/";
          $target_path = $target_path.basename( $_FILES['resume']['name']);
          if(1 && move_uploaded_file($_FILES['resume']['tmp_name'], $target_path){
          ?>
            <script>
                    window.alert("data inserted successfully!!");
                    window.open('form1.php','_self');
            </script>
                    <?php
            }
            else
            {
                ?>
                <script>
                window.alert("Opps something wrong!!");
                window.open('form1.php','_self');
                </script>
                <?php
            }
}
         ?>
