<?php
session_start();
if (!isset($_SESSION['uname'])) {
    header("location: login.php");

}
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Main Page</title>
        <style>

            body  {
                background-image: url("images/employees.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;

                }
                h1{
                    text-align: center;
                    background-color: #182C61;
                    color: white;
                    border-radius: 30px;
                    padding: 20px 60px;
                    text-decoration: none;
                    display: inline-block;
                    cursor: pointer;
                    width: 20%;
                    opacity: 0.9;
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                    
                }

                .container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50%;
  margin-top: 5%;
}

a {
  font-size: 1.5rem;
  padding: 1rem 3rem;
  color: white ;
  text-transform: uppercase;
  background:#182C61;
 


}
.clickbtn{

  font-size: 1.5rem;
  padding: 0;
  color: #182C61 ;
  text-transform: uppercase;
  background:none;

}

.btn {
  text-decoration: none;
  border: 1px solid rgb(146, 148, 248);
  position: relative;
  overflow: hidden;
  opacity: 0.8;
  margin-right: 1%;

}

.btn:hover {
  box-shadow: 1px 1px 25px 10px rgba(146, 148, 248, 0.4);
}

.btn:before {
  content: "";
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    120deg,
    transparent,
    rgba(146, 148, 248, 0.4),
    transparent
  );
  transition: all 650ms;
}

.btn:hover:before {
  left: 100%;
}
.agileits-top p {
    font-size: 1em;
    color: #182C61;
    text-align: center;
    letter-spacing: 1px;
    font-weight: 300;
  }
  
  .agileits-top p a {
    color: #182C61;
    -webkit-transition: .5s all;
    -moz-transition: .5s all;
    transition: .5s all;
    font-weight: 400;
  }
  
  .agileits-top p a:hover {
    color: #34ace0;
  }
  
                
        </style>


    </head>
    <body>
    <h1>Welcome <?php echo  $_SESSION['uname'] ; ?>  </h1>
    <div class="container">
      <a href="Employeepage.php" class="btn">Serch For Employee Member</a>

      <a href="DepartmentPage.php" class="btn">Search For Department</a>
     

    </div>
    <div class="agileits-top">
    <p>If You Want To Insert a New Employee Or Department <a href="InsertPage.php" class= "clickbtn"> Click here!</a></p>
</div>
<div >
   
   <a style="position: absolute;
    top:0;
    right:0;
    color:white;
    text-decoration: none;
    width: 10%;
    height: 4%;
    font:5px;
    background: #182C61;
	box-shadow: 0 0 0 0.1em #577fca inset;
	border-radius: 10px;
    padding: 5px;" href="logout.php">Log out</a>
   

   </div>
    </body>
</html>
