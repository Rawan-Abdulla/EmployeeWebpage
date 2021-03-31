<?php
session_start();
?>
<?php


$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['username']))
    $errors['username'] = 'username is required.';

if (empty($_POST['pass']))
    $errors['pass'] = 'password is required.';

 
 // return a response ===========================================================

// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {

    // if there are no errors process our form, then return a message

    // DO ALL YOUR FORM PROCESSING HERE
    // THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

    // show a message of success and provide a true success variable

    $data['success'] = true;
    $data['message'] = 'Success!';
}

// return all our data to an AJAX call
if(isset($_POST['save'])){
    $con=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($con,'employees');
    $username = $_POST['username'];
    $password =  $_POST['pass'];
   
    $sql =  "SELECT * 
    FROM users
    WHERE username = '$username'  AND password = '$password' ";
    if(mysqli_num_rows(mysqli_query($con, $sql))==1){
        $_SESSION['uname'] = $username;

        header("location: mainpage.php");
     } else{
        echo '<script>alert("the email or pass is un correct try again")</script>'; 

    }

    mysqli_close($con);
}
 json_encode($data);