<html>

<head>
   <style>
      @import url('https://fonts.googleapis.com/css2?family=Acme&family=Kaushan+Script&family=Vollkorn&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Merienda:wght@600&family=Parisienne&family=Roboto+Slab&family=Ubuntu&display=swap');
      * {
         text-align: center;
         font-family: arial black;
         transition: all ease 0.2s;
      }

      a {
         text-decoration: none;
      }
      .pizzaimg:hover,.burgerimg:hover{
         transform: translateY(-5px);
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
   <script src="https://cdn.jsdelivr.net/npm/js-image-zoom/js-image-zoom.min.js"></script>
</head>

<body bgcolor="coral">

   <br>
   <font size="10" color="cyan">
      Pizza-Burger Joint

      <a href="logout.php">
         <img
            src="https://thumbs.dreamstime.com/b/logout-isolated-special-cyan-blue-round-button-abstract-illustration-logout-special-cyan-blue-round-button-103957079.jpg"
            height="50" width="50" align="right" style="border-radius: 50%">
      </a>

      <a href="login.php">
         <img src="https://www.kindpng.com/picc/m/105-1055656_account-user-profile-avatar-avatar-user-profile-icon.png"
            height="50" width="50" align="right" style="border-radius: 50%">
      </a>
      <br>

      <a href="Pizza.php">
         <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
            src="https://image.freepik.com/free-vector/pizza-melted-cartoon-illustration-flat-cartoon-style_138676-2876.jpg"
            height="500" width="500" style="margin: 30px 10px 10px 10px;" class="pizzaimg">
      </a>

      <a href="Burger.php">
         <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
            src="https://image.freepik.com/free-vector/cheese-burger-cartoon-icon-illustration_138676-2450.jpg"
            height="500" width="500" style="margin: 30px 10px 10px 10px;" class="burgerimg">
      </a>

</html>