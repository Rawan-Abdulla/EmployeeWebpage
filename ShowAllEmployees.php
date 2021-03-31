<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Show All Employees </title>
    <link rel="stylesheet" href="css/search.css">

    </head>
    <body>
    
    <form action="AllEmployeesTable.php" class="search-bar" method="POST">
    <div class="numR">
    <label for="num">Number of records:</label>
   
    <input type="text" id="num" name="num" value="100">
    </div>
	
</form>
<div >
   
   <a style="position: absolute;
    top:0;
    right:0;
    color:white;
    text-decoration: none;
    width: 9%;
    height: 6%;
    background: #3d3d3d;
	box-shadow: 0 0 0 0.1em #577fca inset;
	border-radius: 10px;
    padding: 5px;"href="Employeepage.php">Back Home</a>
   

   </div>

    </body>
</html>