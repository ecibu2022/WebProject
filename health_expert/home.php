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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Expert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<ul>
  <li><a href="../logout.php">Logout</a></li>
  <li><a href="statistics.php">Statistics</a></li>
  <li><a href="add_user.php">Add Users</a></li>
  <li><a href="subscribed_users.php">Subscribed Users</a></li>
  <li><a href="upload_information.php">Upload Information</a></li>
  <li><a href="#home" class="active">Home</a></li>
  <li style="float:left"><a href="#">Health</a></li>
</ul>


<div class="card-container">
    <?php
      include_once '../connection.php';

      // Replace this query with your actual query to retrieve data from the database
      $sql = "SELECT title, message FROM information";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          echo "<h2>" . $row["title"] . "</h2>";
          echo "<p>" . $row["message"] . "</p>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }

      // $conn->close();
    ?>
  </div>

    
</body>
</html>