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
  <li><a href="#" class="active">Statistics</a></li>
  <li><a href="add_user.php">Add Users</a></li>
  <li><a href="subscribed_users.php">Subscribed Users</a></li>
  <li><a href="upload_information.php">Upload Information</a></li>
  <li><a href="home.php">Home</a></li>
  <li style="float:left"><a href="#">Health</a></li>
</ul>

<?php
    include_once '../connection.php';

    $health_expert_query = "SELECT COUNT(*) FROM users WHERE role='expert'";
    $health_expert_result = $conn->query($health_expert_query);
    $health_expert_count = $health_expert_result->fetch_assoc()['COUNT(*)'];

    $user_query = "SELECT COUNT(*) FROM users WHERE role='user'";
    $user_result = $conn->query($user_query);
    $user_result_count = $user_result->fetch_assoc()['COUNT(*)'];

    $all_users_query = "SELECT COUNT(*) FROM users";
    $all_users_result = $conn->query($all_users_query);
    $all_users_count = $all_users_result->fetch_assoc()['COUNT(*)'];

    $conn->close();
?>

<script src="../admin/chart.js"></script>

    <canvas id="pieChart" style="width: 100%;max-width:1200px"></canvas>
    <canvas id="barChart" style="width: 100%;max-width:1500px"></canvas>


<script>
const pieXValues = ["Health Experts", "Patients", "All Users"];
const pieYValues = [<?php echo $health_expert_count; ?>, <?php echo $user_result_count; ?>, <?php echo $all_users_count; ?>];
const pieColors = ["#b91d47", "#2b5797", "#e8c3b9"];

new Chart("pieChart", {
  type: "pie",
  data: {
    labels: pieXValues,
    datasets: [{
      backgroundColor: pieColors,
      data: pieYValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Piechart showing number of users available in the system"
    }
  }
});
</script>

<script>
const barXValues = ["Health Experts", "Patients", "All Users"];
const barYValues = [<?php echo $health_expert_count; ?>, <?php echo $user_result_count; ?>, <?php echo $all_users_count; ?>];
const barColors = ["green", "blue", "brown"];

new Chart("barChart", {
  type: "bar",
  data: {
    labels: barXValues,
    datasets: [{
      backgroundColor: barColors,
      data: barYValues
    }]
  },
  options: {
    legend: {
      display: false
    },
    title: {
      display: true,
      text: "Bar graph showing different users of the system"
    }
  }
});
</script>


</body>
</html>
