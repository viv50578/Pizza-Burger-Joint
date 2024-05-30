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

$stmt = $con->prepare("SELECT * FROM `user login`.`login information` WHERE `Username` = ? AND `Password` = ?");
$stmt->bind_param("ss", $Username, $Password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Store username and location in session
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['Location'] = $row['Location'];
    $_SESSION['SrNo'] = $row['Sr. No.'];
    
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
