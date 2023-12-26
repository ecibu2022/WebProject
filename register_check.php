<?php
include "connection.php";

if(isset($_POST['register'])){
  $fullname = $_POST['name'];
  $email = $_POST['email'];
  $license = $_POST['license'];
  $spec = $_POST['specialization'];
  $uname = $_POST['uname'];
  $psw = $_POST['psw'];
  $role = "user";

  // Using prepared statement to prevent SQL injection
  $sql = "INSERT INTO users (name, email, license, specialization, uname, psw, role) 
          VALUES (?, ?, ?, ?, ?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);

  // Bind parameters to the statement
  mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $email, $license, $spec, $uname, $psw, $role);

  // Execute the statement
  $exec = mysqli_stmt_execute($stmt);

  if($exec){
    header("Location: index.php");
    echo "User registered successfully";
  }else{
    echo "Error: " . mysqli_stmt_error($stmt);
  }

  // Close the statement
  mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
