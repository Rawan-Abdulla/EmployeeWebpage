<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<!DOCTYPE html>
<html>
   <head>
   <title>Employee Page</title>
   <link rel="stylesheet" href="css/style2.css">

       

    </head> 
    <body>
    <h1>Welcome TO Employee Page </h1>
    <div>
  <a class="effect1" href="ShowAllEmployees.php">
      Show All Employees    
      <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="SearchByName.php">
      Search By Name
    <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="SearchByDepartment.php">
    Search By Department Name
    <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="SearchByTitle.php">
    Search By Title 
    <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="SearchBySalary.php">
Search By Range Salary 
    <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="mainpage.php">
Back Home  
  </a>
</div>
    </body>
    </html>