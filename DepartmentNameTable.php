<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,'employees');



if(isset($_POST['search'])){
    $f=$_POST['first_name'];
    $numOfRecords = $_POST['num'];
 $token = strtok($f, " ");

 $first= $token;
   $token = strtok(" ");

   $last=$token;
   
   
  

   $query2="SELECT * FROM employees  , dept_emp , departments  WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no AND employees.emp_no = dept_emp.emp_no";
  
      $query_run2=mysqli_query($con,$query2);
    $numOfRows = mysqli_num_rows($query_run2);
    if ($numOfRecords>$numOfRows) {

        $numOfRecords = $numOfRows;
    }

    for($i=1; $i<= $numOfRecords; $i++){
        $row2 = mysqli_fetch_array($query_run2);
       
           ?>
           <form action="" method="POST">
           <input type="text" name="emp_no" value="<?php echo $row2['dept_no']?> "/>
           <input type="text" name="birth_date" value="<?php echo $row2['dept_name']?> "/>
           <input type="text" name="emp_no" value="<?php echo $row2['emp_no']?> "/>
           <input type="text" name="birth_date" value="<?php echo $row2['birth_date']?> "/>
           <input type="text" name="first_name" value="<?php echo $row2['first_name']?> "/>
           <input type="text" name="last_name" value="<?php echo $row2['last_name']?> "/>
           <input type="text" name="gender" value="<?php echo $row2['gender']?> "/>
           <input type="text" name="hire_date" value="<?php echo $row2['hire_date']?> "/>
         
           </form>
           <?php
  
       }

    }

    ?>  
<html>
    <head>
    <title>Department Name Table </title>
        <style>
            .numR{
	position: absolute;
    bottom:auto;
    right:0;
    height: 2%;
    
  
}
#num{
	background-color:black;
    border-radius: 10px;
    color:white;
}


        </style>

    </head>
    <body>
    <div class="numR">
   
    <a href="Employeepage.php"><input type="button" id="num" name="num" value="BackHome"></a>
    <a href="SearchByDepartment.php"><input type="button" id="num" name="num" value="Search Page"></a>

    </div>
    </body>
</html>