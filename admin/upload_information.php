<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Information</title>
    <link rel="stylesheet" href="admin.css">
    <style>
         /* Bordered form */
form {
  border: 3px solid #f1f1f1;
  margin-left: 260px;
  margin-right: 260px;
}

/* Full-width inputs */
input[type=text], input[type=password],input[type=email], textarea {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

.button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  text-decoration: none;
  margin-top: 20px;
}

/* Add a hover effect for buttons */
.button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 30%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: left;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
    </style>
</head>
<body>

<ul>
  <li><a href="../index.php">Logout</a></li>
  <li><a href="#" class="active">Information</a></li>
  <li><a href="index.php">Manage Users</a></li>
  <li style="float:left"><a href="#">Health</a></li>
</ul>


<!-- The form -->
<div class="form-popup" id="myForm">
  <form action="" class="form-container" method="POST">
    <?php
include "../connection.php";

if(isset($_POST['upload'])){
  $title = $_POST['title'];
  $message = $_POST['message'];

  // Using prepared statement to prevent SQL injection
  $sql = "INSERT INTO information (title, message) 
          VALUES (?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  // Bind parameters to the statement
  mysqli_stmt_bind_param($stmt, "ss", $title, $message);

  // Execute the statement
  $exec = mysqli_stmt_execute($stmt);

  if($exec){
    echo "Information uploaded successfully";
  }else{
    echo "Error: " . mysqli_stmt_error($stmt);
  }

  // Close the statement
  mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);

?>
    <h4>Upload Information to be seen by the pregnant mothers</h4>
    <input type="text" name="title" placeholder="Title of the message">
    <textarea name="message" id="" cols="150" rows="10" placeholder="Type the message"></textarea>

    <button type="submit" class="btn" name="upload">Upload</button>
  </form>
</div>


    
</body>
</html>