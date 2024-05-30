<?php
session_start();
if (isset($_SESSION['Username']))
  $userID = $_SESSION['Username'];
else {
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Acme&family=Roboto+Slab&family=Merienda:wght@700&family=Vollkorn:wght@500&display=swap');
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

    /* Styles for the sidebar */
    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0;
      background-color: #111;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      transition: 0.3s;
    }

    /* .sidebar a:hover {
      color: #f1f1f1;
    } */

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .sidebar h2 {
      font-family: 'Vollkorn', serif;
      font-size: 25px;
      color: #fff;
      padding: 10px 15px;
    }

    .cart-item {
      color: white;
      border: 1px solid white;
      margin-left: 10px;
      margin-right: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      padding: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    #pizza-h1, #burger-h1{
      font-family: 'Merienda', cursive;
      font-size: 30px;
      text-align: center;
      color: ;
      padding-top: 10px;
    }

    #p{
      font-family: 'Merienda', cursive;
      color: ;
      padding-bottom: 10px;
      text-align: center;
    }
    #b{
      color: transparent;
      padding-bottom: 10px;
    }
  </style>

  <title>Menu</title>

  <script>
        function confirmLogout() {
            var result = confirm("Are you sure you want to logout?");
            if (result) {
                // If user clicks 'OK', proceed with logout
                window.location.href = "logout.php";
            }
            // If user clicks 'Cancel', do nothing
        }

        function addToCart(productId, quantity, price, name, image) {
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            var existingItem = cartItems.find(item => item.productId === productId);
            if (existingItem) {
                existingItem.quantity += parseInt(quantity);
            } else {
                cartItems.push({ productId, quantity: parseInt(quantity), price, name, image });
            }
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        function removeFromCart(productId) {
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            cartItems = cartItems.filter(item => item.productId !== productId);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            renderCartItems();
        }

        function updateTotalPrice() {
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            totalPrice = cartItems.reduce((total, item) => total + (item.price * item.quantity), 0);
            var totalElement = document.getElementById('totalPrice');

            if (totalPrice === 0) {
                totalElement.innerHTML = "<strong><div style='text-align: center; color: white;'>Your cart is empty.</div></strong>";
            } else {
                totalElement.innerHTML = "\
                    <div style='text-align: center;'>\
                        <strong>Total Price: ₹" + totalPrice + "</strong>\
                        <br><br>\
                        <button class='btn btn-danger' onclick='redirectToOrder()'>Order Now!</button>\
                    </div>";
            }
        }

        function renderCartItems() {
            var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
            var cartItemsContainer = document.getElementById('cartItems');
            cartItemsContainer.innerHTML = '';
            cartItems.forEach(item => {
                var cartItem = document.createElement('div');
                cartItem.classList.add('cart-item');
                cartItem.innerHTML = "\
                    <div style='display: flex; align-items: center;'>\
                        <img src='" + item.image + "' height='110' width='154.002' style='margin-right: 10px;'>\
                        <div>\
                            <p><strong>" + item.name + "</strong></p>\
                            <p><strong>Quantity:</strong> " + item.quantity + "</p>\
                            <p><strong>Price:</strong> ₹" + (item.price * item.quantity) + "</p>\
                        </div>\
                    </div>\
                    <div>\
                        <button class='btn btn-danger' onclick='removeFromCart(" + item.productId + ")'>Remove</button>\
                    </div>";
                cartItemsContainer.appendChild(cartItem);
            });
            updateTotalPrice();
        }

        function redirectToOrder() {
            if (totalPrice === 0) {
                alert("Your cart is empty. Please add items to your cart before proceeding to order.");
            } else {
                // Get the username and address of the current user
                var username = "<?php echo $_SESSION['Username']; ?>";
                var address = "<?php echo $_SESSION['Location']; ?>";
                
                // Get the cart items
                var cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
                var items = cartItems.map(item => item.name + ":" + item.quantity).join(", ");
                
                // Send AJAX request to place_order.php
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "place_order.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Handle successful response (if needed)
                            window.location.href="Order.php";
                            // Clear the cart after placing the order
                            localStorage.removeItem('cartItems');
                            renderCartItems();
                        } else {
                            // Handle error response (if needed)
                            alert("Error placing order. Please try again later.");
                        }
                    }
                };
                xhr.send("username=" + username + "&address=" + address + "&items=" + items + "&price=" + totalPrice);
                setOrderSessionAndRedirect();
            }
        }

        function setOrderSessionAndRedirect() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "set_order_session.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        window.location.href = "Order.php";
                    } else {
                        alert("Error initiating order. Please try again later.");
                    }
                }
            };
            xhr.send();
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

        // Function to open the cart sidebar and shift the content to the left
        function openCart() {
          // Get the cart sidebar element
          var cartSidebar = document.getElementById("cartSidebar");
          // Set the width of the cart sidebar
          cartSidebar.style.width = "480px";
          
          // Get the main content element
          var mainContent = document.getElementsByTagName("body")[0];
          // Shift the main content to the left by the width of the cart sidebar
          mainContent.style.marginRight = "480px"; // Adjust this value based on your sidebar width
        }

        // Function to close the cart sidebar and reset the content position
        function closeCart() {
          // Reset the width of the cart sidebar to 0
          document.getElementById("cartSidebar").style.width = "0";
          
          // Reset the margin of the main content to its original state
          document.getElementsByTagName("body")[0].style.marginRight = "0";
        }

        // Function to handle section highlighting
        function handleSectionHighlighting() {
          var pizzasSection = document.getElementById('pizza-h1');
          var burgersSection = document.getElementById('burger-h1');
          var pizzaLink = document.querySelector('.topnav a[href="Menu.php#p"]');
          var burgerLink = document.querySelector('.topnav a[href="Menu.php#b"]');

          var pizzaPosition = pizzasSection.getBoundingClientRect().top;
          var burgerPosition = burgersSection.getBoundingClientRect().top;

          var windowHeight = window.innerHeight;

          // Check if the sidebar is open
          var sidebarWidth = document.getElementById('cartSidebar').offsetWidth;

          // Adjust the condition based on sidebar open/close
          var offsetMultiplier = sidebarWidth > 0 ? 5.13 : 4.13;

          if (pizzaPosition < windowHeight * offsetMultiplier && pizzaPosition > -windowHeight * offsetMultiplier) {
            pizzaLink.classList.add('active');
            burgerLink.classList.remove('active');
          } else if (burgerPosition < windowHeight * offsetMultiplier && burgerPosition > -windowHeight * offsetMultiplier) {
            burgerLink.classList.add('active');
            pizzaLink.classList.remove('active');
          } else {
            pizzaLink.classList.remove('active');
            burgerLink.classList.remove('active');
          }
        }


        // Attach scroll event listener to handle section highlighting on scroll
        window.addEventListener('scroll', handleSectionHighlighting);

        window.onload = function () {
            renderCartItems();
        };

  </script>
</head>

<body background="https://img.freepik.com/premium-vector/old-wooden-texture-cover-from-planks-ui-game-background-seamless-pattern-cartoon-style_191307-879.jpg">

<div class="topnav">
    <a href="Home page.php">Home Page</a>
    <a class="active" href="Menu.php#p">Pizzas</a>
    <a href="Menu.php#b">Burgers</a>
    <a href="javascript:void(0);" onclick="confirmLogout()" style="float: right">
        <img src="Prof.png" height="37.5" width="37.5" style="border-radius: 50%">
    </a>
    <a href="javascript:void(0);" onclick="openCart()" style="float: right">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTRjlPrXg7wrtYiIu5aoQdECIXK2fyDE2yCA&usqp=CAU" height="37.5" width="37.5">
    </a>
</div>

  <br>
  <br>
  <br>
  <!-- Cart Sidebar -->
<div id="cartSidebar" class="sidebar">
  <h2>Cart</h2>
  <a href="javascript:void(0)" class="closebtn" onclick="closeCart()">&times;</a>
  <div id="cartItems">
    <!-- Cart items will be dynamically added here -->
  </div>
  <!-- Total price -->
  <div id="totalPrice" style="color: white; padding: 10px;"></div>
</div>

<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);
$k = 'Pizza';
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

<h1 id="p">Greetings!</h1>
<h1 id="pizza-h1">Pizzas</h1>
<!-- Dynamically generated pizza list -->
<div id='list'>

</div>

<script type='text/javascript'>
  var id = [<?php echo '"' . implode('","', $id) . '"' ?>];
  var Name = [<?php echo '"' . implode('","', $Name) . '"' ?>];
  var img = [<?php echo '"' . implode('","', $img) . '"' ?>];
  var Price = [<?php echo '"' . implode('","', $Price) . '"' ?>];
  var Description = [<?php echo '"' . implode('","', $Description) . '"' ?>];

  var pizzaList = document.getElementById('list');
  pizzaList.setAttribute('style', 'display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-evenly;')
  for (let i = 0; i < img.length; i++) {
    var pizzaBox = document.createElement('div');
    pizzaBox.setAttribute('style', 'padding: 10px; margin: 10px; width: 380px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: flex; flex-direction: column; margin-bottom: 30px;');

    pizzaBox.innerHTML = "\
    <div style='background-color: #333; padding: 10px; border-radius: 10px;'>\
        <img src='" + img[i] + "' height='340' width='340' style='margin-bottom: 10px;'>\
        <p style='font-size: 20px; color: red;'><strong>" + Name[i] + "</strong></p>\
        <p style='height: 100px; overflow: hidden; margin-bottom: 10px; color: #fff'>" + Description[i] + "</p>\
        <label for='quantity' style='color: #fff;'>Quantity:</label>\
        <div style='display: flex; align-items: center; margin-bottom: 10px; height: 50px'>\
          <button onclick='decrementQuantity(\"quantity_" + id[i] + "\")' class='btn btn-danger' style='margin-right: 5px; height: 37.6px; width: 37.6px'>-</button>\
          <input type='number' id='quantity_" + id[i] + "' name='quantity' min='0' max='10' value='1' style='margin: 0 5px;'>\
          <button onclick='incrementQuantity(\"quantity_" + id[i] + "\")' class='btn btn-danger' style='margin-left: 5px; height: 37.6px; width: 37.6px'>+</button>\
        </div>\
        <p style='font-size: 20px; display: flex; justify-content: space-between; color: red;'>\
          <strong>₹" + Price[i] + "</strong>\
          <button onclick='addToCart(" + id[i] + ", document.getElementById(\"quantity_" + id[i] + "\").value, " + Price[i] + ", \"" + Name[i] + "\", \"" + img[i] + "\")' class='btn btn-danger'>Add to Cart</button>\
        </p>\
    </div>";

    pizzaList.appendChild(pizzaBox);
  }
</script>

<?php
$server = "localhost";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password);
$k = 'Burger';
$sql = "SELECT * FROM `admin`.`admintools` WHERE `PB`='$k'";
$res = $con->query($sql);
$burgerId = array();
$burgerName = array();
$burgerImg = array();
$burgerPrice = array();
$burgerDescription = array();
while ($row = $res->fetch_assoc()) {
  array_push($burgerId, $row['Sr. No.']);
  array_push($burgerName, $row['Name']);
  array_push($burgerImg, $row['Image']);
  array_push($burgerPrice, $row['Price']);
  array_push($burgerDescription, $row['Description']);
}
?>

<!-- <div style="clear: both;"></div> -->

<h1 id="b">Hidden</h1>
<h1 id="burger-h1">Burgers</h1>
<div id='burgerList'>

</div>

<script type='text/javascript'>
  var burgerId = [<?php echo '"' . implode('","', $burgerId) . '"' ?>];
  var burgerName = [<?php echo '"' . implode('","', $burgerName) . '"' ?>];
  var burgerImg = [<?php echo '"' . implode('","', $burgerImg) . '"' ?>];
  var burgerPrice = [<?php echo '"' . implode('","', $burgerPrice) . '"' ?>];
  var burgerDescription = [<?php echo '"' . implode('","', $burgerDescription) . '"' ?>];

  var burgerList = document.getElementById('burgerList');
  burgerList.setAttribute('style', 'display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-evenly;');
  for (let i = 0; i < burgerImg.length; i++) {
    var burgerBox = document.createElement('div');
    burgerBox.setAttribute('style', 'padding: 10px; margin: 10px; width: 380px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4), 0 6px 20px 0 rgba(0, 0, 0, 0.19); display: flex; flex-direction: column; margin-bottom: 30px;');

    burgerBox.innerHTML = "\
      <div style='background-color: #333; padding: 10px; border-radius: 10px;'>\
        <img src='" + burgerImg[i] + "' height='242.854' width='340' style='margin-bottom: 10px;'>\
        <p style='font-size: 20px; color: red;'><strong>" + burgerName[i] + "</strong></p>\
        <p style='height: 100px; overflow: hidden; margin-bottom: 10px; color: #fff'>" + burgerDescription[i] + "</p>\
        <label for='quantity' style='color: #fff;'>Quantity:</label>\
        <div style='display: flex; align-items: center; margin-bottom: 10px; height: 50px'>\
          <button onclick='decrementQuantity(\"quantity_" + burgerId[i] + "\")' class='btn btn-danger' style='margin-right: 5px; height: 37.6px; width: 37.6px'>-</button>\
          <input type='number' id='quantity_" + burgerId[i] + "' name='quantity' min='0' max='10' value='1' style='margin: 0 5px;'>\
          <button onclick='incrementQuantity(\"quantity_" + burgerId[i] + "\")' class='btn btn-danger' style='margin-left: 5px; height: 37.6px; width: 37.6px'>+</button>\
        </div>\
        <p style='font-size: 20px; display: flex; justify-content: space-between; color: red;'>\
          <strong>₹" + burgerPrice[i] + "</strong>\
          <button onclick='addToCart(" + burgerId[i] + ", document.getElementById(\"quantity_" + burgerId[i] + "\").value, " + burgerPrice[i] + ", \"" + burgerName[i] + "\", \"" + burgerImg[i] + "\")' class='btn btn-danger'>Add to Cart</button>\
        </p>\
      </div>";

    burgerList.appendChild(burgerBox);
  }
</script>


</html>