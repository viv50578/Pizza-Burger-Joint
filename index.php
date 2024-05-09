<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$username = $_POST['name'];
$Email = $_POST['email'];
$PhoneNumber = $_POST['number'];
$location = $_POST['location'];
$password = $_POST['password'];

$sql = "INSERT INTO `user login`.`login information` (`Sr. No.`, `Username`, `E-mail`, `Phone Number`, `Location`, `Password`) VALUES (NULL,'$username', '$Email', '$PhoneNumber', '$location', '$password');";

if ($con->query($sql) === TRUE) {
    // Set session for the user who just signed up
    $newUserId = mysqli_insert_id($con);
    $_SESSION['Username'] = $newUserId;
    
    header('Location: //localhost/Pizza-Burger-Joint/Pizza.php');
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>
