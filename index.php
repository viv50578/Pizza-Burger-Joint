<?php
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
$password = $_POST['password'];
$sql = "INSERT INTO `user login`.`login information` (`Sr. No.`, `Username`, `E-mail`, `Phone Number`, `Password`) VALUES (NULL,'$username', '$Email', '$PhoneNumber', '$password');";

if ($con->query($sql) === TRUE) {
    echo '<script type="text/JavaScript">
        alert("Account created successfully");
        window.location.href = "Pizza.php";;
    </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>