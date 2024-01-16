<html>

<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');

        html,
        body {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2210775-jpeg.jpg");
            height: 100%;
            font-family: 'Vollkorn', serif;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            height: 100%;
            align-content: center;
        }

        .card {
            height: 370px;
            margin-top: auto;
            margin-bottom: auto;
            width: 400px;
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .social_icon span {
            font-size: 60px;
            margin-left: 10px;
            color: #FFC312;
        }

        .social_icon span:hover {
            color: white;
            cursor: pointer;
        }

        .card-header h3 {
            color: white;
        }

        .social_icon {
            position: absolute;
            right: 20px;
            top: -45px;
        }

        .input-group-prepend span {
            width: 50px;
            background-color: #FFC312;
            color: black;
            border: 0 !important;
        }

        input:focus {
            outline: 0 0 0 0 !important;
            box-shadow: 0 0 0 0 !important;
        }

        .remember {
            color: white;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 15px;
            margin-right: 5px;
        }

        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 100px;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }

        .links {
            color: white;
        }

        .links a {
            margin-left: 4px;
        }
    </style>
    <title>User Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
                    <form method="post" action="index5.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>

                            <input type="text" name="Username" class="form-control" placeholder="Username">

                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

                            <input type="password" name="Password" class="form-control" placeholder="Password">
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

