<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>

<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//Show departments names with the amount of employees’ salaries who work on each
$sql = "SELECT dep.dept_name , SUM(salary) AS sum_salary 
FROM departments AS dep ,salaries ,dept_emp
WHERE dep.dept_no=dept_emp.dept_no 
AND dept_emp.emp_no= salaries.emp_no 
GROUP BY dep.dept_name ";


$result1 = mysqli_query($conn, $sql)or die("Error");


$num = mysqli_num_rows($result1) or die("could not connect " . mysqli_error($conn));

if(!$result1 || mysqli_num_rows($result1) == 0){
    $num = mysqli_num_rows($result1);
}
echo "<table>";

echo "<th> department name</th><th> total salaries </th>";
for($i=1; $i<= $num ; $i++){
  $rows = mysqli_fetch_row($result1);

  echo "<tr> " ; 
  echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td>";}

?>
<html>
    <head>
    <title>Department Salary Table</title>
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