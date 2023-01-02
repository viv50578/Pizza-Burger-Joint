<?php
$server = "localhost";

$username = "root";

$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("Connection to this database failed due to" . mysqli_connect_error());
}

$PB = $_POST['PB'];
$Name = $_POST['Name'];
$img = $_POST['image'];
$Price = $_POST['Price'];
$Description = $_POST['Description'];
$sql = "INSERT INTO `admin`.`admintools` (`Sr. No.`, `PB`, `Name`, `Image`, `Price`, `Description`) VALUES (NULL, '$PB', '$Name','$img' ,'$Price', '$Description');";

if ($con->query($sql) === TRUE)
{ 
    echo '<script type="text/JavaScript">
        alert("New record created successfully");
        window.location.href = "View.php";;
    </script>';
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>