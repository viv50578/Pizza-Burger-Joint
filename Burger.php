<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    $k='Burger';
    $sql="SELECT * FROM `admin`.`admintools` WHERE `PB`='$k'";
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
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
.topnav {
  background-color: #333;
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
<body background = "https://i.imgur.com/TND89w1.jpg">

<div class="topnav">
<a href="Home page.php">Home Page</a>
<a href="Pizza.php">Pizzas</a>
<a class="active" href="Burger.html">Burgers</a>
<a href="Login.html" style = "float: right" class = "pull-left"><img src = "https://www.kindpng.com/picc/m/105-1055656_account-user-profile-avatar-avatar-user-profile-icon.png" height = "37.5" width = "37.5" style = "border-radius: 50%"></a>
<a href="Cart.html" style = "float: right" class = "pull-left"><img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTRjlPrXg7wrtYiIu5aoQdECIXK2fyDE2yCA&usqp=CAU" height = "37.5" width = "37.5"></a>
</div>
<br>
<br>
<br>
<div id='list'>

</div>

<script type='text/javascript'>
var id= [<?php echo '"'.implode('","', $id).'"' ?>];
var Name= [<?php echo '"'.implode('","', $Name).'"' ?>];
var img= [<?php echo '"'.implode('","', $img).'"' ?>];
var Price= [<?php echo '"'.implode('","', $Price).'"' ?>];
var Description= [<?php echo '"'.implode('","', $Description).'"' ?>];

    for(let i=0;i<img.length;i++){
      document.getElementById('list').innerHTML+="\
<figure>\
<img src = "+img[i]+" height = '283' width = '367'>\
<font size = 4>\
<label for=quantity>Quantity:</label>\
  <input type=number id=quantity name=quantity min=0 max=10>\
  <button type=submit class='btn btn-primary'>Add to Cart</button>\
<figcaption>\
<font size = 6>\
"+Name[i] +" ₹"+ Price[i]+"\
<br>\
<font size = 4>\
"+Description[i]+"\
</figcaption>\
<br>\
</figure>";      
    }
        </script>;
</html>

<!-- <figure>
<img src = "https://www.pngkey.com/png/full/261-2619381_chitr-veg-symbol-svg-veg-and-non-veg.png" height = "50" width = "50">
<figcaption>
<font size = "6">
Veg
</figcaption>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/McAllotikki.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
McAloo Tikki ₹49
<br>
<font size = "4">
A tikki delight: Potato and peas patty topped with veg sauce, ketchup, tomatoes and onions
</figcaption>
<br>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/McVeggie.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
McVeggie ₹109
<br>
<font size = "4">
A delectable patty made of green goodness, potatoes, peas, carrots and selection of Indian spices. Topped with crispy lettuce, mayonnaise, packed into sesame toasted buns.
</figcaption>
<br>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/McSpicyPaneer.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
McSpicy Paneer ₹167
<br>
<font size = "4">
Crispy and spicy paneer will spice up your taste quotient. Creamy sauce and crispy lettuce topping will sooth that extra spice
</figcaption>
<br>
</figure>

<figure>
<img src = "https://www.pngkey.com/png/full/245-2459071_non-veg-icon-non-veg-symbol-png.png" height = "50" width = "50" align = "top">
<figcaption>
<font size = "6">
Non-Veg
</figcaption>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/McChicken.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
McChicken ₹124
<br>
<font size = "4">
The McChicken® is a delightfully crispy chicken sandwich with a crispy chicken fillet topped with mayonnaise, shredded iceberg lettuce, and served on a perfectly toasty bun.
</figcaption>
<br>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/Filet-O-fish.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
Filet-O-Fish ₹153
<br>
<font size = "4">
Dive into our wild-caught fish sandwich! Our fish filet is made with Alaskan Pollock sourced from sustainable fisheries, topped with melty American cheese and creamy tartar sauce, and served on a soft, steamed bun.
</figcaption>
<br>
</figure>

<figure>
<img src = "https://www.mcdonaldsindia.com/images/productview/McSpicyChicken.jpg" height = "283" width = "367">
<font size = "4">
<label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity" min="0" max="10">
  <button type="submit" class="btn btn-primary">Add to Cart</button>
<figcaption>
<font size = "6">
McSpicy Chicken ₹172
<br>
<font size = "4">
Tender and juicy boneless chicken thigh meat coated in crispy batter with a kick of spice topped with a creamy sauce and crispy shredded lettuce will have you craving for more!
</figcaption>
<br>
</figure> -->