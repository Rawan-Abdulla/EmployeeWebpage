<?php
session_start();
?>

<?php


$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
// if any of these variables don't exist, add an error to our $errors array

if (empty($_POST['name']))
    $errors['name'] = 'Name is required.';

if (empty($_POST['email']))
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
    $name = mysqli_real_escape_string($con, $_REQUEST['name']);
    $username = mysqli_real_escape_string($con, $_REQUEST['username']);

    $password =mysqli_real_escape_string($con, $_REQUEST['pass']);
   
    $sql = "INSERT INTO users (name,username,password) VALUES ('$name', '$username', '$password')";
    if(mysqli_query($con, $sql)){
        $_SESSION['uname'] = $username;
        header("location: mainpage.php");


    } else{
        echo '<script>alert("Please use another username ...") </script>';
        echo '<script>window.location = "signup.html"</script>';

        ;



        
    }

    mysqli_close($con);
}
 json_encode($data);