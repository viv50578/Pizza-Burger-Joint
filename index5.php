<?php
session_start();

$server = "localhost";
$db_username = "root";
$password = "";
$database = "user login";

$con = mysqli_connect($server, $db_username, $password, $database);

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM `login information` WHERE `Username` = '$Username' AND `Password` = '$Password'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Store username and location in session
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['Location'] = $row['Location'];
    
    if ($row['Sr. No.'] == 2) { // Check if Sr. No. is 2
        header('Location: //localhost/Pizza-Burger-Joint/View.php');
    } else {
        header('Location: //localhost/Pizza-Burger-Joint/Menu.php#p');
    }
} else {
    echo '<script type="text/JavaScript"> 
            alert("Invalid user credentials.");
            window.location.href = "login.php";
          </script>';
}
?>
