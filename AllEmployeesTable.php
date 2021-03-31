<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<?php

$conn = mysqli_connect("localhost","root","") or die ("could not connect " . mysqli_error($conn));

mysqli_select_db($conn,"employees") or die ("could not connect " . mysqli_error($conn));


//	Show all employees names associated with their titles, departments and salaries.
$query="SELECT DISTINCT first_name,last_name,title,dept_name,salary 
FROM employees,titles,departments,salaries,dept_emp
 WHERE employees.emp_no=titles.emp_no AND titles.emp_no=salaries.emp_no 
        AND dept_emp.dept_no=departments.dept_no LIMIT 100
        
        ";
  ini_set('memory_limit', '-1');



      $numOfRecords = $_POST['num'];
      $result=mysqli_query($conn,$query);

      $num1 = mysqli_num_rows($result);



      if(!$result || mysqli_num_rows($result) == 0){
          $num1 = mysqli_num_rows($result);
      }
      if ($numOfRecords>$num1) {

        $numOfRecords = $num1;
    }
      echo "<table>";
   
      echo "<th> first name</th><th> last name </th><th> title </th><th> department name </th><th> salary </th>";
      for($i=1; $i<= $numOfRecords ; $i++){
        $rows = mysqli_fetch_row($result);
        echo "<tr> " ; 
        echo  "<td>". $rows[0] . "</td><td>" . $rows[1] . "</td><td>" . $rows[2] . "</td><td>" . $rows[3] . "</td><td>" . $rows[4] . "</td>";
    
    }
        
?>

<html>
    <head>
    <title>All Employee Table </title>
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
   
    <a href="Employeepage.php"><input type="button" id="num" name="num" value="BackHome"></a>
    

    </div>
    </body>
</html>