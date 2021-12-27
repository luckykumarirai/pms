<?php
session_start();
include("head.php");

 ?>
<style>

body {
     background: url('https://static-communitytable.parade.com/wp-content/uploads/2014/03/rethink-target-heart-rate-number-ftr.jpg') fixed;
    background-size: cover;
}

*[role="form"] {
    max-width: 700px;
    padding: 15px;
    margin: 0 auto;
    border-radius: 0.3em;
    background-color: #f2f2f2;
}

*[role="form"] h2 {
    font-family: 'Open Sans' , sans-serif;
    font-size: 40px;
    font-weight: 600;
    color: #000000;
    margin-top: 5%;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 4px;
}



</style>


<div class="container">
            <form class="form-horizontal" role="form" method="post" action="form1.php" enctype="multipart/form-data">
                <h2>PERSONAL DETAILS</h2>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="fname" placeholder="First Name" class="form-control" autofocus  required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name*</label>
                    <div class="col-sm-9">
                        <input type="text" name="lname" placeholder="Last Name" class="form-control" autofocus required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email* </label>
                    <div class="col-sm-9">
                        <input type="email"   name="email" placeholder="Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Date of Birth*</label>
                    <div class="col-sm-9">
                        <input type="date"  name="dob" placeholder="Date of birth" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                    <div class="col-sm-9">
                        <input type="text" name="phonenumber" placeholder="Phone number" class="form-control">
                        <span class="help-block">Your phone number won't be disclosed anywhere </span>
                    </div>
                </div>

                <div class="form-group">
                    <label  class="col-sm-3 control-label">College Name </label>
                    <div class="col-sm-9">
                        <input type="text" name="cn" placeholder="Enter your college name" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Current Semester</label>
                    <div class="col-sm-9">
                        <input type="text" name="cs" class="form-control" placeholder="ENter your current semester">
                    </div>
                </div>
                <div class="form-group">
                        <label  class="col-sm-3 control-label">State* </label>
                    <div class="col-sm-9">
                        <input type="text" name="state" placeholder="Please enter your state Name" class="form-control" required>
                    </div>
                </div>
                 <div class="form-group">
                        <label  class="col-sm-3 control-label">City* </label>
                    <div class="col-sm-9">
                        <input type="text" name="city" placeholder="Please write your city Name" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gn" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" name="gn" value="Male">Male
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                       <label  class="col-sm-3 control-label">Upload resume* </label>
                   <div class="col-sm-9">
                       <input type="file" name="resume"  class="form-control" required>
                   </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
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
          $fn=$_POST['fname'];
          $ln=$_POST['lname'];
          $email=$_POST['email'];
          $dob=$_POST['dob'];
          $pn=$_POST['phonenumber'];
          $cn=$_POST['cn'];
          $cs=$_POST['cs'];
          $state=$_POST['state'];
          $city=$_POST['city'];
          $gn=$_POST['gn'];
          $filename=$_FILES['resume']['name'];
          $target_path = "/var/www/lucky/pms/images/";
          $target_path = $target_path.basename( $_FILES['resume']['name']);
          $qry="INSERT INTO `student` (`id`, `fname`, `lname`, `email`, `contact`, `dob`, `state`, `city`, `collagename`, `currentsem`, `gender`, `resume`) VALUES (NULL, '$fn', '$ln', '$email', '$pn', '$dob', '$state', '$city', '$cn', '$cs', '$gn', '$filename')";
          $run=mysqli_query($con,$qry);
            if($run && move_uploaded_file($_FILES['resume']['tmp_name'], $target_path))
            {
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
