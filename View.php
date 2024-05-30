<?php
session_start();
if (isset($_SESSION['SrNo'])) {
    $userSrNo = $_SESSION['SrNo'];
    // Check if the user has Sr. No. equal to 2
    if ($userSrNo != 2) {
        header("Location: Menu.php#p");
        exit(); // Ensure script stops executing after redirection
    }
} else {
    header("Location: Menu.php#p");
    exit(); // Ensure script stops executing after redirection
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<title>Admin Panel</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');
    
    body{
        background-color: #fff7af;
    }
    h1{
        text-align: center;
        font-family: 'Acme', sans-serif;
        padding-top: 20px;
    }
    th {
        width: 15vw;
    }
    #list{
        border: 4px solid black;
        margin-left: auto;
        margin-right: auto;
        font-family: 'Roboto Slab', serif;
    }
    tr{
        text-align: center;
        border: 4px solid black;
        background-image: linear-gradient(319deg, #f2dd6e 0%, #cff27e 37%, #ef959d 100%);
    }
    th{
        background-image: linear-gradient(315deg, #090947 0%, #4d4c4d 74%);
        color: white;
    }
    th,td{
        border: 4px solid black;
    }
    .button{
        display: flex;
        justify-content: space-evenly;
        font-family: 'Roboto Slab', serif;
    }
</style>

<body>
    <h1>Admin Panel</h1>
    <br>
    <div class="button" size="4">

        <a href="Home page.php">
            <button type="submit" class="btn btn-primary">Home Page</button></a>

        <a href="Admin Addition.php">
            <button type="submit" class="btn btn-primary">Add Pizza/Burger</button></a>

        <a href="Admin Editing.php">
            <button type="submit" class="btn btn-primary">Edit Pizza/Burger</button>
        </a>

    </div>
    <br><br>

    <table id="list">
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Delete</th>
        </tr>
    </table>
    <br>
</body>

</html>

<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);
$sql = "SELECT * FROM `admin`.`admintools`";
$res = $con->query($sql);
$id = array();
$Name = array();
$img = array();
$Price = array();
$Description = array();
while ($row = $res->fetch_assoc()) {
    array_push($id, $row['Sr. No.']);
    array_push($Name, $row['Name']);
    array_push($img, $row['Image']);
    array_push($Price, $row['Price']);
    array_push($Description, $row['Description']);
}
for ($i = 0; $i < count($Price); $i++) {
    echo "
        <script type='text/javascript'>
            var table = document.getElementById('list');
            var row = table.insertRow(-1);

            var cell1 = row.insertCell(0);
            cell1.innerHTML = '$Name[$i]';

            var cell2 = row.insertCell(1);
            cell2.innerHTML = '<img src=$img[$i] style=\"width:450px;padding:10px\">';

            var cell3 = row.insertCell(2);
            cell3.innerHTML = '$Price[$i]';

            var cell4 = row.insertCell(3);
            cell4.innerHTML = '$Description[$i]';

            var cell5 = row.insertCell(4);
            var deleteButton = document.createElement('button');
            deleteButton.className = 'btn btn-danger'; // Add Bootstrap class
            deleteButton.id = $id[$i];
            deleteButton.onclick = function() { myFunction(this.id) };
            deleteButton.innerHTML = 'Delete';
            cell5.appendChild(deleteButton);
        </script>";
}
?>

<script type="text/javascript">
    function change(page) {
        window.location.href = page;
    }
    function myFunction(id) {
        if (confirm("Are you sure you want to delete this entry?")) {
            var form = document.createElement("form");
            var element1 = document.createElement("input");
            form.method = "POST";
            element1.value = id;
            element1.name = "ID";
            form.appendChild(element1);
            document.body.appendChild(form);
            form.submit();
        }
    }

</script>

<?php
if ('POST' === $_SERVER['REQUEST_METHOD']) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $id = $_POST["ID"];
    $sql1 = "DELETE FROM `admin`.`admintools` WHERE `admintools`.`Sr. No.` = $id;";
    if ($con->query($sql1)) {
        echo "
        <script type='text/javascript'>
            alert('Entry deleted successfully.');
            window.location.href = 'View.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>