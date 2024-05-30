<?php
session_start();
if (!isset($_SESSION['order_initiated']) || $_SESSION['order_initiated'] !== true) {
    header("Location: Menu.php");
    exit();
}
unset($_SESSION['order_initiated']); // Clear the session variable after accessing the order page
?>

<html>

<head>

  <style>
    body {
      background-color: #fff7af;
    }
    h1 {
      text-align: center;
    }

    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    }
  </style>

  <title>Order</title>
</head>

<body>
  <h1>
    <br>
    <img src="https://img.freepik.com/free-photo/view-cartoon-male-chef-with-delicious-3d-pizza_23-2151017637.jpg?t=st=1715279543~exp=1715283143~hmac=245e1938039ff0dc8b46a1cc06f5b8a02798540a47d5293abca36c4f64cc58e7&w=826" alt="Cooking" width="557.55" height="423.225">
    <br><br>
    Thank you for ordering your meal from our website!
    <br><br>
    Your order is being prepared and it will soon find its way to your home :)
    <br><br>
  </h1>
</body>

</html>