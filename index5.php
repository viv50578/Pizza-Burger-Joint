<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "user login"; // Adjust according to your database name

$con = mysqli_connect($server, $username, $password, $database);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM `login information` WHERE `Username` = '$Username' AND `Password` = '$Password'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    if ($row['Sr. No.'] == 2) { // Check if Sr. No. is 2
        $_SESSION['Username'] = $row['Sr. No.'];
        header('Location: //localhost/Pizza-Burger-Joint/View.php');
    } else {
        $_SESSION['Username'] = $row['Sr. No.'];
        header('Location: //localhost/Pizza-Burger-Joint/Menu.php#p');
    }
} else {
    echo '<script type="text/JavaScript"> 
            alert("Invalid user credentials.");
            window.location.href = "login.php";
          </script>';
}
?>
