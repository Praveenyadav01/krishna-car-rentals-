<?php  
$name = $_POST ['name'];
$email = $_POST ['email'];
$country = $_POST ['country'];
$number = $_POST ['number'];
$password = $_POST ['password'];

//data base connection
$conn = new mysqli('localhost','root','','registration');
if($conn->connect_error){
    die('connection failed :' .$conn->connect_error);

}else{
    $stmt = $conn->prepare("insert into registration(name,email,country,number,password)
    values(?,?,?,?,?)");
    $stmt->bind_param("sssis"  , $email, $country, $number ,$password);
    $stmt->execute();
    echo "registration Successfully...";
    $stmt->close();
    $conn->close();
}
?>