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
    @import url('https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Slab&family=Vollkorn:wght@500&display=swap');
    * {
      font-family: 'Roboto Slab', serif;
    }
    .topnav {
      background-color: #000;
      overflow: hidden;
      position: fixed;
      top: 0;
      width: 100%;
    }

    .topnav a {
      font-family: 'Vollkorn', serif;
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
      color: black;
    }

    .topnav a.active {
      background-color: coral;
      color: white;
    }
  </style>
  <title>Burgers</title>
</head>

<body background="https://img.freepik.com/premium-vector/old-wooden-texture-cover-from-planks-ui-game-background-seamless-pattern-cartoon-style_191307-879.jpg">

<div class="topnav">
    <a href="Home page.php">Home Page</a>
    <a href="Pizza.php">Pizzas</a>
    <a class="active" href="Burger.php">Burgers</a>
    <!-- Call the confirmLogout function when clicking on the logout link -->
    <a href="javascript:void(0);" onclick="confirmLogout()" style="float: right">
        <img src="https://www.kindpng.com/picc/m/105-1055656_account-user-profile-avatar-avatar-user-profile-icon.png" height="37.5" width="37.5" style="border-radius: 50%">
    </a>
    <a href="Cart.php" style="float: right">
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

  function addToCart(productId, quantity) {
    // Implement the logic to add the product to the cart with the specified quantity
    // You can use AJAX or any other method to send the data to the server
    console.log("Product ID: " + productId + ", Quantity: " + quantity);
  }

  var burgerList = document.getElementById('list');
  burgerList.setAttribute('style', 'display: flex; flex-direction: row; flex-wrap: wrap; text-align: centre; justify-content: space-evenly;')
  for (let i = 0; i < img.length; i++) {
    var burgerBox = document.createElement('div');
    burgerBox.setAttribute('style', 'padding: 10px; margin: 10px; width: 400px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: flex; flex-direction: column; margin-bottom: 30px;');

    burgerBox.innerHTML = "\
      <div style='background-color: #333; padding: 10px; border-radius: 10px;'>\
        <img src='" + img[i] + "' height='257.14' width='360' style='margin-bottom: 10px;'>\
        <p style='font-size: 20px; color: red;'><strong>" + Name[i] + "</strong></p>\
        <p style='height: 100px; overflow: hidden; margin-bottom: 10px; color: #fff'>" + Description[i] + "</p>\
        <label for='quantity' style='color: #fff'>Quantity:</label>\
        <div style='display: flex; align-items: center; margin-bottom: 10px; height: 50px'>\
          <button onclick='decrementQuantity(\"quantity_" + id[i] + "\")' class='btn btn-danger' style='margin-right: 5px; height: 37.6px; width: 37.6px'>-</button>\
          <input type='number' id='quantity_" + id[i] + "' name='quantity' min='0' max='10' style='margin: 0 5px;'>\
          <button onclick='incrementQuantity(\"quantity_" + id[i] + "\")' class='btn btn-danger' style='margin-left: 5px; height: 37.6px; width: 37.6px'>+</button>\
        </div>\
        <p style='font-size: 20px; display: flex; justify-content: space-between; color: red;'>\
          <strong>₹" + Price[i] + "</strong>\
          <button onclick='addToCart(" + id[i] + ", document.getElementById(\"quantity_" + id[i] + "\").value)' class='btn btn-danger'>Add to Cart</button>\
        </p>\
      </div>";

    burgerList.appendChild(burgerBox);
  }

  function incrementQuantity(inputId) {
    var inputElement = document.getElementById(inputId);
    if (inputElement.value < 10) {
        inputElement.value++;
    }
  }

function decrementQuantity(inputId) {
    var inputElement = document.getElementById(inputId);
    if (inputElement.value > 0) {
        inputElement.value--;
    }
  }
</script>;

</html>