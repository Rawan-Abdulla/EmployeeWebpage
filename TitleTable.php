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
   
   
  

   $query1="SELECT * FROM  titles  , employees  WHERE titles.emp_no=employees.emp_no AND  title='$f' ";
  
   $query_run1=mysqli_query($con,$query1);
  $numOfRows = mysqli_num_rows($query_run1);
  if ($numOfRecords>$numOfRows) {

    $numOfRecords = $numOfRows;
}

  for($i=1; $i<=$numOfRecords; $i++){
      $row1 = mysqli_fetch_array($query_run1);
     
        ?>
        <form action="" method="POST">
        <input type="text" name="emp_no" value="<?php echo $row1['emp_no']?> "/>
        <input type="text" name="birth_date" value="<?php echo $row1['birth_date']?> "/>
        <input type="text" name="first_name" value="<?php echo $row1['first_name']?> "/>
        <input type="text" name="last_name" value="<?php echo $row1['last_name']?> "/>
        <input type="text" name="gender" value="<?php echo $row1['gender']?> "/>
        <input type="text" name="hire_date" value="<?php echo $row1['hire_date']?> "/>
        <input type="text" name="title" value="<?php echo $row1['title']?> "/>

      
        </form>
        <?php
    }
    }

    ?> 
    <html>
    <head>
    <title>Title Table</title>
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
    <a href="SearchByTitle.php"><input type="button" id="num" name="num" value="Search Page"></a>

    </div>
    </body>
</html>