<?php
    include('config_db.php');
    // Check if the username and password are set in the POST request
if(isset($_POST['username']) && isset($_POST['password'])){

    // Define a validate function to sanitize the input data
    function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    // Sanitize the username and password input
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
   // Check if the username is empty
    if(empty($username)){
    // Redirect to the login page with an error message
    header('location:Login.php?error= username is required');
    exit();
    }
    // Check if the password is empty
    elseif(empty($password)){
    // Redirect to the login page with an error message
    header('location:Login.php?error= password is required');
    exit();
    }
    else{
    // Assign the sanitized username and password to variables
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Construct the SQL query to select the user from the database
    $sql = "SELECT * from login where username='".$username."' and
   password=MD5('".$password."')";
    // Execute the SQL query
    $result = mysqli_query($conn,$sql);
    // Fetch the first row of the result
    $row = mysqli_fetch_assoc($result);
    // Check if the username exists in the result
    if($row['username']){
    // Start the session
    session_start();
    // Set the session variables for the username and name
    $_SESSION['username']=$row['username'];
    $_SESSION['name']=$row['name'];
    // Redirect to the dashboard page
    header('location:Dashboard.php');
    }
    else{
    // Redirect to the login page with an error message
    header('location:Login.php?error= invlid input');
    exit();
    }
    }
   }
   // If the username and password are not set in the POST request
   else{
    // Redirect to the login page with an error message
    header('location:login.html?err=1');
   }
   ?>
?>