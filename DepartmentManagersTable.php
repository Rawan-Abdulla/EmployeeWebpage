<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//Show all departments, and their managers

$query="SELECT dept_manager.dept_no,departments.dept_name, employees.first_name FROM employees  , dept_manager , departments  WHERE departments.dept_no = dept_manager.dept_no  AND dept_manager.emp_no = employees.emp_no ";
  
      $result=mysqli_query($conn,$query);
      $numOfRecords = $_POST['num'];


      $num1 = mysqli_num_rows($result);
      if(!$result || mysqli_num_rows($result) == 0){
          $num1 = mysqli_num_rows($result);
      }
      if ($numOfRecords>$num1) {

        $numOfRecords = $num1;
    }
      echo "<table>";
      
      echo "<th> department number</th><th> department name </th><th> managers </th>";
      for($i=1; $i<= $numOfRecords ; $i++){
        $rows = mysqli_fetch_row($result);
        echo "<tr> " ; 
        echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td><td>" . $rows[2] . "</td>";}
      
        echo".<br><br><br>";


 




?>

<!DOCTYPE html>
  <html>
    <head>
    <title>Show Department Managers Table</title>
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
table, td {
  border: 2px solid black;
  border-collapse: collapse;
  text-align: center;


}
table{
    width: 80%;

}


        </style>


    </head>
    <body>
    <div class="numR">
   
    <a href="DepartmentPage.php"><input type="button" id="num" name="num" value="BackHome"></a>

    </div>

    </body>
    </html>