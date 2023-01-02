<html>
<head>
<style>
*
{
text-align: center;
}
.error {color: #FF0000;}

div {
  background-color: yellow;
  width: 300px;
  border: 15px solid blue;
  padding: 50px;
  margin: 20px;
  height: 275px;
  margin: auto;
}

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>
<body bgcolor = "Chartreuse">

<br>
<h1>Sign Up</h1>
<br>

<font size = "4">

<div>
<form method='post' action="index.php">

<label>Username </label>
<input type="text" id="name" name='name' required><br><br><br>

<label>E-mail </label>
<input type="email" id="email" name='email' required><br><br><br>

<label>Phone Number </label>
<input type="number" id="number" name='number' min="1" max="9999999999" required><br><br><br>

<label>Password </label>
<input type="password" id="password" name='password' required>
<i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i><br><br><br>

<input type="submit" value="Submit">
</form> 
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


