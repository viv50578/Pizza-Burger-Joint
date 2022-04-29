<?php
{
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
$username = $_POST['name'];
$Email = $_POST['email'];
$password = $_POST['password'];
$sql = "UPDATE `user login`.`login information` SET `Password` = '$password' WHERE `login information`.`Username` = '$username' AND `login information`.`E-mail` = '$Email'";

if ($con->query($sql) === TRUE)
{ 
    echo "Record edited successfully";
    header('Location:login.php');
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>