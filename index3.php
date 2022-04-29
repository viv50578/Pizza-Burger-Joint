<?php
{
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}
$NewName = $_POST['NewName'];
$Name = $_POST['Name'];
$img = $_POST['image'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$sql = "UPDATE `admin`.`admintools` SET `Name` = '$NewName', `Image` = '$img', `Price` = '$Price',`Description` = '$Description' WHERE `admintools`.`Name` = '$Name'";

if ($con->query($sql) === TRUE)
{ 
    echo "Record edited successfully";
    header('Location:View.php');
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>