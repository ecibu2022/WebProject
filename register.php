<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as a Nurse</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<form action="register_check.php" method="POST">
  <div class="imgcontainer">
    <img src="images/avatar.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="name"><b>Fullname</b></label>
    <input type="text" placeholder="Enter fullname" name="name" required>

    <label for="email"><b>Email Address</b></label>
    <input type="email" placeholder="Enter email address" name="email" required>

    <label for="license"><b>License Number</b></label>
    <input type="text" placeholder="Enter license number" name="license" required>

    <label for="specialization"><b>Specialization</b></label>
    <input type="text" placeholder="Enter specialization" name="specialization" required>

    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <input type="submit" class="button" name="register" value="Register">
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Already registered? <a href="#">Login</a></span>
  </div>
</form>

</body>
</html>
