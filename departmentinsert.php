<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php
  
  if(isset($_POST['save'])){

  $con=mysqli_connect("localhost","root","","employees") or die ("could not connect " . mysqli_error($con));

  mysqli_select_db($con,'employees')or die ("could not connect " . mysqli_error($con));

  $dept_no = mysqli_real_escape_string($con, $_REQUEST['dept_no']);

  $dept_name = mysqli_real_escape_string($con, $_REQUEST['dept_name']);

  

  $sql = "INSERT INTO departments (dept_no,dept_name) VALUES ('$dept_no', '$dept_name')";
  if(mysqli_query($con, $sql)){
    echo '<script>alert("New Department Added Successfully.")</script>'; 

  } else{
      echo "ERROR: Could not able to execute";
  }
  mysqli_close($con);


}

  ?>
<!DOCTYPE html>
<html>
<head>
<title>Department Insert </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/insertstyle.css" rel="stylesheet" type="text/css" media="all" />
</head>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                       <!-- <img src="\images\smile.jpg" alt=""/>-->
                        <h1>Welcome <?php echo  $_SESSION['uname'] ; ?>  </h1>
                        <a href="mainpage.php"><input type="submit" name="" value="Back Home"/><br/></a>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="home-tab" data-toggle="tab" href="InsertPage.php" role="tab" aria-controls="home" >Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active"  data-toggle="tab" href="#profile" role="tab" aria-controls="profile" >Department</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply New Department</h3>
                                <form method="post" action=""> 
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Department  Name *" value="" name="dept_name" />
                                        </div>

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Department Number *" value="" name="dept_no" />
                                        </div>
        
                                        
                                    </div>
                                    <div class="col-md-6">
                                
                                        <input  type="submit" class="btnRegister"  value="Register" name="save"/>
                                    </div>
                                </div>
</form>
                            </div>


                            
                        </div>
                    </div>
                </div>

            </div>
    
        
    </body>
</html>