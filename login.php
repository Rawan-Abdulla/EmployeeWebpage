<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title> Employee site </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="css/style1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- //web font -->
</head>
<style>
#message1{
	margin-left:auto;
	margin-right:auto;
	display:block;
	color:white;
}
</style>‏
 
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1> Welcome Back to employee site</h1>
		<div id="message"></div>

		<div id="email-group" class="main-agileinfo">
			<div class="agileits-top">
				    <div id="message"></div>
                    <div id="email-group" class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                    <input class="text" type="text" id="txt_uname" name="txt_uname" placeholder="Username" required="">
                </div>
                <div id="password-group" class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                     <input class="text" type="password" id="txt_pwd" name="txt_pwd"  placeholder="Password" required="">
					 <br>
					 <div id="message1">
					  
					 </div>
				</div>

                    <div class="wthree-text">
						<div class="clear"> </div>
					</div>

					<input type="submit"  name= "save" value="login" id="but_submit">
				<p>Don't have an Account? <a href="signup.php"> Sign Up Now!</a></p>
			</div>
		</div>
		<script>
			$(document).ready(function(){
			$("#but_submit").click(function(){
				var username = $("#txt_uname").val().trim();
				var password = $("#txt_pwd").val().trim();
		
				if( username != "" && password != "" ){
					$.ajax({
						url:'simple.php',
						type:'post',
						data:{username:username,password:password},
						success:function(response){
							var msg = "";
							if(response == 1){
								window.location = "mainpage.php";
							}else{
								msg = "Invalid username and password!";
							}
							$("#message1").html(msg);
						}
					});
				}
			});
		});
		</script>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>