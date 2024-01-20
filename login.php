<html>

<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');

        .container {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        .left-half {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            /* overflow: hidden; */
        }

        .left-half img {
            max-width: 100%;
            max-height: 100%;
        }

        .right-half {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 30px;
        }

        .input-group-prepend span {
            width: 41px;
            background-color: #95a4ff;
            color: black;
        }

        .input-group-append span {
            width: 41px;
            background-color: #95a4ff;
            color: black;
        }

        .remember input {
            width: 20px;
            height: 20px;
            margin-left: 17px;
            margin-right: 5px;
        }

        .links a {
            margin-left: 4px;
        }

        *{
            text-align: center;
            transition: all ease 0.2s;
        }

        html,
        body {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2210775-jpeg.jpg");
            background-size: cover;
        }

        .log,.box h2{
            font-family: 'Roboto Slab', serif;
        }

        .box h2{
            font-weight: 600;
        }

        .box {
            display: flex;
            flex-direction: column;
            margin-top: auto;
            margin-bottom: auto;
            padding-top: 10px;
            width: 500px;
            background-color: rgba(248, 244, 229);
            box-shadow: 15px 15px #ffa580, 15px 15px 0px 3.5px black;
            border: 4px solid #000;
            padding-left: 45px;
            padding-right: 45px;
            border-radius: 10px;
        }

        .log input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ffa580;
            cursor: pointer;
            border-radius: 10px;
            border: 2.5px solid #000;
        }

        .log input[type="submit"]:hover {
            background-color: #ff8f63 !important;
        }

        .input-container{
            margin-bottom: 15px;
        }

        .input-container input {
            flex: 2;
            padding: 15px;
        }
        
        .form-control{
            text-align: left;
        }

    </style>
    <title>User Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/e9f27665a4.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container">
        <div class="left-half">
            <img src="panda.jpg">
        </div>

        <div class="right-half">
            <div class="d-flex justify-content-center h-100">
                <div class="box">
                    <h2>User Login</h2>
                    <br>
                    <form method="post" action="index5.php" class="log">
                        
                        <div class="input-container input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                            </div>
                            <input type="text" name="Username" class="form-control" placeholder="Username">
                        </div>

                        <div class="input-container input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            </div>
                            <input type="password" id="password" name="Password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text" style="width: 43px;"><i class="fa-solid fa-eye" id="togglePassword" style="cursor: pointer;"></i></span>
                            </div>   
                        </div>

                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>

                        <input type="submit" value="Login" class="btn float-right">
                        <br><br><br>

                        <div class="links">
                            Don't have an account?<a href="SignUp.php">Sign Up</a>
                        </div>
    
                        <div>
                            <a href="NewPassword.html">Forgot your password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
      
        togglePassword.addEventListener('click', function (e) {
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          
          // toggle the eye icon
          this.classList.toggle('fa-eye');
          this.classList.toggle('fa-eye-slash');
        });
      </script>
</body>

</html>
