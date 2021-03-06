<html>
<head>

<style>
@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url("https://wallpaperaccess.com/full/2560166.jpg");
height: 100%;
font-family: 'Numans', sans-serif;
background-repeat: no-repeat;
background-size: cover;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>
	<title>User Login</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
<div class="d-flex justify-content-center h-100">
<div class="card">
<div class="card-header">
<h3>User Login</h3>
<div class="d-flex justify-content-end social_icon">
</div>
</div>
<div class="card-body">
<form method = "post">
<div class="input-group form-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>

<input type="text" name = "Username" class="form-control" placeholder="Username">
						
</div>

<div class="input-group form-group">
<div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>

<input type="password" name = "Password" class="form-control" placeholder="Password">
</div>

<div class="row align-items-center remember">
<input type="checkbox">Remember Me
</div>

<div class="form-group">
<input type="submit" value="Login" class="btn float-right login_btn">
</div>

</form>
</div>

<div class="card-footer">
<div class="d-flex justify-content-center links">
Don't have an account?<a href="SignUp.php">Sign Up</a>
</div>

<div class="d-flex justify-content-center">
<a href="NewPassword.html">Forgot your password?</a>
</div>
</div>
</div>
</div>

</div>
</body>
</html>

<?php
if ( 'POST' === $_SERVER['REQUEST_METHOD'] )
{
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];

    $sql="SELECT * FROM `user login`.`login information` WHERE `Username` = '$Username' AND `Password` = '$Password'";
    $result=$con->query($sql);
    if ($result->num_rows > 0) 
    {
        // if($Username == 'Vivek' && $Password == 'pbj#058')
        // {
        //     header('Location: //localhost/WPL/Admin Tools.html');
        // }
        // else
        header('Location: //localhost/WPL/Home Page.php');
    } 
    else
    {
        echo '<script type="text/JavaScript"> 
            alert("Invalid user credentials.");
            </script>';
    }
}
?>