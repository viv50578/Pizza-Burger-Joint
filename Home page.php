<html>

<head>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&family=Vollkorn&display=swap');
      *{
         text-align: center;
         transition: all ease 0.2s;
      }
      body{
         background-color: #FF9A75;
         margin: 0;
         padding: 0;
      }
      a{
         text-decoration: none;
      }
      .pizzaimg:hover,.burgerimg:hover{
         transform: translateY(-5px);
      }
      .top{
         display: flex;
         justify-content: space-between;
         align-items: center;
         padding: 10px;
         padding-bottom: 32px;
         padding-top: 18px;
      }
      .title{
         font-family: 'Merienda', cursive;
         color: #000000;
         font-size: 50;
         flex-grow: 1;
      }
   </style>
   <script>
      // function bigImg(x) {
      //    x.style.height = "550px";
      //    x.style.width = "550px";
      // }

      // function normalImg(x) {
      //    x.style.height = "500px";
      //    x.style.width = "500px";
      // }
   </script>
   <title>Home page</title>
   <!-- <script src="js-image-zoom.js"></script> -->
   <!-- <script src="https://unpkg.com/js-image-zoom/js-image-zoom.js"></script> -->
   <!-- <script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script> -->
</head>

<body>

   <br>
   <div class="top">
      <div class="title">Pizza-Burger Joint</div>
   
      <a href="login.php">
         <img src="https://e7.pngegg.com/pngimages/782/114/png-clipart-profile-icon-circled-user-icon-icons-logos-emojis-users-thumbnail.png"
            height="65" width="65" style="border-radius: 50%;">
      </a>
   </div>

   <a href="Pizza.php">
      <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
         src="https://image.freepik.com/free-vector/pizza-melted-cartoon-illustration-flat-cartoon-style_138676-2876.jpg"
         height="500" width="500" style="margin: 10px 10px 10px 10px;" class="pizzaimg">
   </a>

   <a href="Burger.php">
      <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
         src="https://image.freepik.com/free-vector/cheese-burger-cartoon-icon-illustration_138676-2450.jpg"
         height="500" width="500" style="margin: 10px 10px 10px 10px;" class="burgerimg">
   </a>

</html>