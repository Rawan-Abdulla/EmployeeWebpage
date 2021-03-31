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

   
   
  



    $query="SELECT * FROM employees WHERE (first_name = '$first' AND  last_name = '$last') OR first_name = '$f'  ";
  
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
         <input type="text" name="birth_date" value="<?php echo $row['birth_date']?> "/>
         <input type="text" name="first_name" value="<?php echo $row['first_name']?> "/>
         <input type="text" name="last_name" value="<?php echo $row['last_name']?> "/>
         <input type="text" name="gender" value="<?php echo $row['gender']?> "/>
         <input type="text" name="hire_date" value="<?php echo $row['hire_date']?> "/>
       
         </form>
         <?php
     }
   

}

?> 
<html>
    <head>
    <title>Name Table </title>
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
    <a href="SearchByName.php"><input type="button" id="num" name="num" value="Search Page"></a>

    </div>
    </body>
</html>