<!DOCTYPE html>
<html lang="en">

<head>

  
<meta
 
charset="UTF-8">

<meta
 
name="viewport"
 
content="width=device-width, initial-scale=1.0">

  
<title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>


<form action="login_process.php" method="post">
  <div class="imgcontainer">
    <img src="images/avatar.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button type="submit">Login</button>
  
  </div>

</form>

  
</body>
</html>