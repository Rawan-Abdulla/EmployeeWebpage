<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php
   
    if(isset($_POST['save'])){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,'employees');
    $emp_no = mysqli_real_escape_string($con, $_REQUEST['emp_no']);
    $birth_date = mysqli_real_escape_string($con, $_REQUEST['birth_date']);
    $first_name = mysqli_real_escape_string($con, $_REQUEST['fname']);
    $last_name = mysqli_real_escape_string($con, $_REQUEST['lname']);
    $gender = mysqli_real_escape_string($con, $_REQUEST['gender']);
    $hire_date = mysqli_real_escape_string($con, $_REQUEST['hire_date']);
    $sql = "INSERT INTO employees (emp_no,birth_date,first_name, last_name, gender, hire_date) VALUES ('$emp_no', '$birth_date', '$first_name','$last_name','$gender','$hire_date')";
    if(mysqli_query($con, $sql)){
        echo '<script>alert("New Employee Added Successfully.")</script>'; 

    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($con);


}

    ?>

<!DOCTYPE html>
<html>
<head>
<title>Insert Page</title>
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
                       <a href="mainpage.php"> <input type="submit" name="" value="Back Home"/><br/></a>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="InsertPage.php" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="departmentinsert.php" role="tab" aria-controls="profile" aria-selected="false">Department</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Apply as a Employee</h3>
                                <form method="post"> 
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" name="fname" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" name="lname"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Employee Number *" value="" name="emp_no" />
                                        </div>
        
                                        <div class="form-group">
                                            <div class="maxl">
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="M" checked>
                                                    <span> Male </span> 
                                                </label>
                                                <label class="radio inline"> 
                                                    <input type="radio" name="gender" value="F">
                                                    <span>Female </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Your Birthdate " value="" name="birth_date" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" placeholder="HireDate *" value="" name="hire_date" />
                                        </div>
                                        
                                        
                                       
                                    </div>
                                    <input  type="submit" class="btnRegister"  value="Register" name="save"/>
                                </div>
                                </form>
                            </div>


                            
                        </div>
                    </div>
                </div>

            </div>
    
        
    </body>
</html>