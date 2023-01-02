<html>
<head>
<title>Cart</title>
</head>
<font size = "10" color = "lightcoral">
Cart
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
<img src = "+img[i]+" height = '300' width = '600'>\
<font size = 4>\
<label for=quantity>Quantity:</label>\
  <input type=number id=quantity name=quantity min=0 max=10>\
<figcaption>\
<font size = 6>\
"+Name[i] +" ₹"+ Price[i]+"\
<br>\
</figcaption>\
<br>\
</figure>";      
    }
        </script>;
</html>


<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);
    $sql="SELECT * FROM `admin`.`admintools` WHERE `Name`=Name[i]";
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