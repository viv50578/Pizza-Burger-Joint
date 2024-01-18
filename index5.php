<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM `user login`.`login information` WHERE `Username` = '$Username' AND `Password` = '$Password'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    if ($Username == 'Vivek' && $Password == 'pbj#058') {
        $_SESSION['Username'] = $row['Sr. No.'];
        header('Location: //localhost/Pizza-Burger-Joint/View.php');
    } else {
        $_SESSION['Username'] = $row['Sr. No.'];
        header('Location: //localhost/Pizza-Burger-Joint/Pizza.php');
    }
} else {
    echo '<script type="text/JavaScript"> 
            alert("Invalid user credentials.");
            window.location.href = "login.php";
          </script>';
}
?>