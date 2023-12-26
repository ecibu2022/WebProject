<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Expert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    
  <ul>
  <li><a href="../logout.php">Logout</a></li>
  <li><a href="statistics.php">Statistics</a></li>
  <li><a href="add_user.php"  class="active">Add Users</a></li>
  <li><a href="subscribed_users.php">Subscribed Users</a></li>
  <li><a href="upload_information.php">Upload Information</a></li>
  <li><a href="home.php">Home</a></li>
  <li style="float:left"><a href="#">Health</a></li>
  </ul>
  <br><br><br>

    <!-- The form -->
<div class="form-popup" id="myForm">
  <form action="process.php" class="form-container" method="POST">
    <h2 style="text-align: center;">Add New User</h2>

    <input type="text" placeholder="Enter fullname" name="name" required>

    <input type="text" placeholder="Enter Email" name="email" required>

    <input type="text" placeholder="Enter license number" name="license" required>

    <input type="text" placeholder="Enter specialization" name="specialization" required>

    <input type="text" placeholder="Enter username" name="uname" required>

    <input type="password" placeholder="Enter Password" name="psw" required>

    <select name="role" id="">
        <option value="select">Select Role</option>
        <option value="user">user</option>
    </select>

    <button type="submit" class="btn">Create</button>
  </form>
</div>

    
</body>
</html>