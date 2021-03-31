<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<!DOCTYPE html>
<html>
   <head>
   <title>Department Page</title>
   <link rel="stylesheet" href="css/style2.css">

       

    </head> 
    <body>
    <h1>Welcome TO Department Page </h1>
    <div>
  <a class="effect1" href="ShowDepartmentManagers.php">
      Show  Department Managers    
      <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="DepartmentSalaryTable.php">
      Show The Salaries In Each Department
    <span class="bg"></span>
  </a>
</div>
<div>
  <a class="effect1" href="SearchByDepartmentPageName.php">
    Search By Department Name
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