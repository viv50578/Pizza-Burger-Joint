<?php
session_start();
if (isset($_SESSION['Username']))
  $userID = $_SESSION['Username'];
else {
  header("Location: login.php");
}
?>

<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/e9f27665a4.js" crossorigin="anonymous"></script>

    <script>
        $(function () {
            $('.add').on('submit', function (event) {
                event.preventDefault();
                var fileInput = document.getElementById('img');
                var reader = new FileReader();
                reader.readAsDataURL(fileInput.files[0]);
                var form1 = this;
                reader.onload = function () {
                    $(form1).append('<input type="hidden" name="image" value=' + reader.result + '>');
                    form1.submit();
                };
            });
    
            // Add change event listener to the select element
            $('#PB').on('change', function () {
                var selectedOption = $(this).val();
                var iconClass = '';
    
                // Set the appropriate icon class based on the selected option
                if (selectedOption === 'Pizza') {
                    iconClass = 'fa-pizza-slice';
                } else if (selectedOption === 'Burger') {
                    iconClass = 'fa-burger';
                }
    
                // Update the icon in the Name field
                $('#Name').prev('.input-group-prepend').find('i').removeClass().addClass('fa-solid ' + iconClass);
            });
        });
    </script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');

        * {
            text-align: center;
            transition: all ease 0.2s;
        }

        html,
        body {
            background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2210775-jpeg.jpg");
            background-size: cover;
        }

        .add, .box h2 {
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
            padding-left: 35px;
            padding-right: 35px;
            border-radius: 10px;
        }

        .add input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ffa580;
            cursor: pointer;
            border-radius: 10px;
            border: 2.5px solid #000;
        }

        .add input[type="submit"]:hover {
            background-color: #ff8f63 !important;
        }
        
        .input-container {
            /* display: flex; */
            /* align-items: center; */
            margin-bottom: 15px;
        }
        
        /* .input-container label {
            flex: 1;
            text-align: right;
            padding-right: 10px;
        } */
        
        .input-container input {
            flex: 2;
            padding: 15px;
        }

        .input-group-prepend span {
            width: 41.5px;
            background-color: #95a4ff;
            color: black;
        }
        
        .form-control{
            text-align: left;
        }
    </style>
    <title>Admin Addition</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="box">
                <h2>Addition Form</h2>
                <br>
                <form method='post' action="index2.php" class="add">

                    <label for="PB">What do you want to add: </label>
                    <select name="PB" id="PB">
                        <option value="Pizza">Pizza</option>
                        <option value="Burger">Burger</option>
                    </select>
                    <br><br>

                    <label for="Img">Select image:</label>
                    <input type="file" id="img" name="Img" accept="image/*" required><br><br>

                    <div class="input-container input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-pizza-slice"></i></span>
                        </div>
                        <input type="text" id="Name" name="Name" class="form-control" placeholder="Name" required>
                    </div>

                    <div class="input-container input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa-solid fa-indian-rupee-sign"></i></span>
                        </div>
                        <input type="number" id="Price" name="Price" class="form-control" placeholder="Price" required>
                    </div>

                    <div class="input-container input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                        </div>
                        <input type="text" id="Description" name="Description" class="form-control" placeholder="Description" required>
                    </div>

                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>