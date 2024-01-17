<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');

        * {
            text-align: center;
            color: white;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Roboto Slab', serif;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .form-container,
        .image-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-image: url("https://wallpaperaccess.com/full/2560166.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px;
        }

        .card {
            width: 80%;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
        }

        .form input,
        .form select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .login_btn {
            color: black;
            background-color: #FFC312;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            cursor: pointer;
        }

        .login_btn:hover {
            color: black;
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <div class="card">
                <h2>Sign Up</h2>
                <form method='post' action="index.php" class="form">

                    <label>Username </label>
                    <input type="text" id="name" name='name' style="color: black;" required><br>

                    <label>E-mail </label>
                    <input type="email" id="email" name='email' style="color: black;" required><br>

                    <label>Phone Number </label>
                    <input type="number" id="number" name='number' min="1" max="9999999999" style="color: black;" required><br>

                    <label>Password </label>
                    <input type="password" id="password" name='password' style="color: black;" required>
                    <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i><br>

                    <input type="submit" value="Submit" class="login_btn">
                </form>
            </div>
        </div>
        <div class="image-container">
            <img src="https://img.freepik.com/free-vector/cute-corgi-dog-eating-pizza-cartoon-icon-illustration-animal-food-icon-concept-isolated-flat-cartoon-style_138676-2338.jpg?w=740&t=st=1705524034~exp=1705524634~hmac=85f79536a5a93a25cef28cada2c6a83e7d6d57eaca0b792896dd32c27a9c8b6d" alt="Your Image">
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
