<html>
<head>
</head>

<style>
    th{
        width:15vw;
    }
</style>
<body>
<br>
<font size = "4">
<a href = "Admin Addition.html">
<button type="submit" class="btn btn-info">Add Pizza/Burger</button>
</a><br><br>

<a href = "Admin Editing.html">
<button type="submit" class="btn btn-warning">Edit Pizza/Burger</button>
</a><br><br>

</font>

<h1>View Product</h1>

<table id = "list" border = "4">
<tr align = "center">
<th>Name</th>
<th>Image</th>
<th>Price</th>
<th>Description</th>
</tr>
</table>
</body>
</html>

<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    $sql="SELECT * FROM `admin`.`admintools`";
    $res=$con->query($sql);
    $id=array();
    $Name=array();
    $img=array();
    $Price=array();
    $Description=array();
    while($row = $res->fetch_assoc()){
        array_push($id, $row['Sr. No.']);
        array_push($Name, $row['Name']);
        array_push($img, $row['Image']);
        array_push($Price, $row['Price']);
        array_push($Description, $row['Description']);
    }
    for ($i = 0; $i < count($Price); $i++){
        echo "
        <script type='text/javascript'>
            var table = document.getElementById('list');
            table.innerHTML+='\
            <tr>\
                <td width = 5vw>$Name[$i]</td>\
                <td width = 5vw><img src=$img[$i] style=width:550px></td>\
                <td width = 5vw>$Price[$i]</td>\
                <td width = 5vw>$Description[$i]</td>\
                <td><button id=$id[$i] onclick= myFunction(this.id)>Delete</button></td>\
            </tr>';
        </script>";
    }
?>

<script type="text/javascript">
    function change(page){
        window.location.href = page;
    }
    function myFunction(id) {
        if(confirm("Are you sure you want to delete this entry?")){
            var form = document.createElement("form");
            var element1 = document.createElement("input"); 
            form.method = "POST";
            element1.value=id;
            element1.name="ID";
            form.appendChild(element1);  
            document.body.appendChild(form);
            form.submit();
        }
    }

</script>

<?php
if ( 'POST' === $_SERVER['REQUEST_METHOD'] ){
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $id = $_POST["ID"];
    $sql1="DELETE FROM `admin`.`admintools` WHERE `admintools`.`Sr. No.` = $id;";
    if($con->query($sql1)){
        echo "
        <script type='text/javascript'>
            alert('Entry deleted successfully.');
            window.location.href = 'View.php';
        </script>"; 
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>


