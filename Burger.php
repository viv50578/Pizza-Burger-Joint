<?php
session_start();
if (isset($_SESSION['Username']))
  $userID = $_SESSION['Username'];
else {
  header("Location: login.php");
}
?>

<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);
$k = 'Burger';
$sql = "SELECT * FROM `admin`.`admintools` WHERE `PB`='$k'";
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
?>

<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script>
        function confirmLogout() {
            var result = confirm("Are you sure you want to logout?");
            if (result) {
                // If user clicks 'OK', proceed with logout
                window.location.href = "logout.php";
            }
            // If user clicks 'Cancel', do nothing
        }
    </script>

  <style>
    .topnav {
      background-color: #000;
      overflow: hidden;
      position: fixed;
      top: 0;
      width: 100%;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 25px;
    }

    .topnav a:hover {
      background-color: gold;
      color: white;
    }

    .topnav a.active {
      background-color: coral;
      color: white;
    }
  </style>
  <title>Burgers</title>
</head>

<body background="https://i.imgur.com/TND89w1.jpg">

<div class="topnav">
    <a href="Home page.php">Home Page</a>
    <a href="Pizza.php">Pizzas</a>
    <a class="active" href="Burger.php">Burgers</a>
    <!-- Call the confirmLogout function when clicking on the logout link -->
    <a href="javascript:void(0);" onclick="confirmLogout()" style="float: right">
        <img src="https://www.kindpng.com/picc/m/105-1055656_account-user-profile-avatar-avatar-user-profile-icon.png" height="37.5" width="37.5" style="border-radius: 50%">
    </a>
    <a href="Cart.html" style="float: right">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTRjlPrXg7wrtYiIu5aoQdECIXK2fyDE2yCA&usqp=CAU" height="37.5" width="37.5">
    </a>
</div>
  <br>
  <br>
  <br>
  <div id='list'>

  </div>

  <script type='text/javascript'>
    var id = [<?php echo '"' . implode('","', $id) . '"' ?>];
    var Name = [<?php echo '"' . implode('","', $Name) . '"' ?>];
    var img = [<?php echo '"' . implode('","', $img) . '"' ?>];
    var Price = [<?php echo '"' . implode('","', $Price) . '"' ?>];
    var Description = [<?php echo '"' . implode('","', $Description) . '"' ?>];

    for (let i = 0; i < img.length; i++) {
      document.getElementById('list').innerHTML += "\
<figure>\
<img src = "+ img[i] + " height = '162' width = '228'>\
<font size = 4>\
<label for=quantity>Quantity:</label>\
  <input type=number id=quantity name=quantity min=0 max=10>\
  <a href = Order.html>\
  <button type=submit class='btn btn-primary'>Add to Cart</button>\
  </a>\
<figcaption>\
<font size = 6>\
"+ Name[i] + " ₹" + Price[i] + "\
<br>\
<font size = 4>\
"+ Description[i] + "\
</figcaption>\
<br>\
</figure>";
    }
  </script>;

</html>