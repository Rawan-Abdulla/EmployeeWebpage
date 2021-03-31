<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php


$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));

if(isset($_POST['search'])){
    $f=$_POST['first_name'];
    $numOfRecords = $_POST['num'];

 
    $query="SELECT * FROM employees  , dept_emp , departments  
    WHERE departments.dept_name = '$f'  AND dept_emp.dept_no = departments.dept_no 
    AND employees.emp_no = dept_emp.emp_no ";
    
    $query_run=mysqli_query($conn,$query);
    if (!$query_run) {
      printf("Error: %s\n", mysqli_error($conn));
      exit();
  }
  $numOfRows = mysqli_num_rows($query_run);

  if ($numOfRecords>$numOfRows) {

    $numOfRecords = $numOfRows;
}
for($i=1; $i<= $numOfRecords; $i++){
    $row = mysqli_fetch_array($query_run);
         ?>
         <form action="" method="POST">
       
         <input type="text" name="birth_date" value="<?php echo $row['dept_name']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
      
       
         </form>
         <?php

     }



  




}

?> 

<html>
    <head>
    <title>Department Employee Name Table</title>
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
   
    <a href="DepartmentPage.php"><input type="button" id="num" name="num" value="BackHome"></a>
    <a href="SearchByDepartmentPageName.php"><input type="button" id="num" name="num" value="Search Page"></a>

    </div>
    </body>
</html>