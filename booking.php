<?php
include('config_db.php');
    if(isset($_POST['submit'])){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $vehicle = $_POST['vehicle'];
            $pickup = $_POST['pickup'];
            $pickup_time = $_POST['pickup-time'];
            $day = $_POST['days'];
            $return = $_POST['return-date'];
$insert = "INSERT INTO `booking` (`ID`, `fname`, `lname`, `phone`, `email`, `vehicle`, `pickupD`, `pickupT`, `days`, `returnDate`) 
VALUES (NULL, '$fname', '$lname', '$phone', '$email', '$vehicle', '$pickup', '$pickup_time', '$day', '$return')";

if (mysqli_query($conn, $insert)) { 
    echo "<script> alert('data submitted')</script>"; 
    echo "<script> window.location.href='Home.html' </script>"; 
} else { 
    echo "<script> alert('server down')</script>"; 
} 

    }else{
        echo "<script> alert('server down')</script>";
        header('location:login.html?err=1');
    }

?>