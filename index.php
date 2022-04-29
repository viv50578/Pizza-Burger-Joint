<?php
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
//echo "Success connecting to the db"; how to handle cookies with php(next tuesday)

$username = $_POST['name'];
$Email = $_POST['email'];
$PhoneNumber = $_POST['number'];
$password = $_POST['password'];
$sql = "INSERT INTO `user login`.`login information` (`Sr. No.`, `Username`, `E-mail`, `Phone Number`, `Password`) VALUES (NULL,'$username', '$Email', '$PhoneNumber', '$password');";

if ($con->query($sql) === TRUE)
{
    echo "New record created successfully";
    header('Location:login.php');
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>