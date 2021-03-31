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

 $token = strtok($f, "-");
 $min= $token;

   $token = strtok("-");
   $max=$token;

   
   
  



    $query="SELECT * FROM  salaries , employees WHERE salary BETWEEN '$min' AND '$max' AND salaries.emp_no = employees.emp_no ";
  
    $query_run=mysqli_query($con,$query);
    
    $numOfRows = mysqli_num_rows($query_run);
    if ($numOfRecords>$numOfRows) {

        $numOfRecords = $numOfRows;
    }
    for($i=1; $i<=$numOfRecords; $i++){
        $row = mysqli_fetch_array($query_run);

        ?>
         <form action="" method="POST">
         <input type="text" name="emp_no" value="<?php echo $row['emp_no']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         
         <input type="text" name="hire_date" value="<?php echo $row['salary']?> "/>
       
         </form>
         <?php
     }
   

}

?> 
<html>
    <head>
    <title>Salary Table</title>
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
    <a href="SearchBySalary.php"><input type="button" id="num" name="num" value="Search Page"></a>

    </div>
    </body>
</html>