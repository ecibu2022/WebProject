<?php

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th{
  background: #555;
  color: #fff;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}



{box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  top: 55px;
  right: 28px;
  width: 280px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 55;
  right: 35px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
  overflow-y: scroll
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password], .form-container select{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus, .form-container select {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>

<ul>
  <li><a href="../index.php">Logout</a></li>
  <li><a href="upload_information.php">Information</a></li>
  <li><a href="#home" class="active">Manage Users</a></li>
  <li style="float:left"><a href="#">Health</a></li>
</ul>

<h4>Registered Users</h4>

<!-- A button to open the popup form -->
<button class="open-button" onclick="openForm()">Add User</button>

<!-- The form -->
<div class="form-popup" id="myForm">
  <form action="add_new_user.php" class="form-container" method="POST">
    <h4>Add New User</h4>

    <input type="text" placeholder="Enter fullname" name="name" required>

    <input type="text" placeholder="Enter Email" name="email" required>

    <input type="text" placeholder="Enter license number" name="license" required>

    <input type="text" placeholder="Enter specialization" name="specialization" required>

    <input type="text" placeholder="Enter username" name="uname" required>

    <input type="password" placeholder="Enter Password" name="psw" required>

    <select name="role" id="">
        <option value="select">Select Role</option>
        <option value="user">user</option>
        <option value="expert">expert</option>
    </select>

    <button type="submit" class="btn">Create</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close Form</button>
  </form>
</div>




<table>
  <tr>
    <th>ID</th>
    <th>FullName</th>
    <th>Email</th>
    <th>License</th>
    <th>Specialization</th>
    <th>Role</th>
    <th colspan="2">Actions</th>
  </tr>

    <?php include("admin_manage_user.php"); ?>

</table>


<script>
    function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
} 
</script>

    
</body>
</html>