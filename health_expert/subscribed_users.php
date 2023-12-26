<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Expert</title>
    <link rel="stylesheet" href="style.css">
    <style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th{
  background: #04AA6D;
  color: #fff;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

{
  box-sizing: border-box;
  }
</style>
</head>
<body>

<ul>
  <li><a href="../logout.php">Logout</a></li>
  <li><a href="statistics.php">Statistics</a></li>
  <li><a href="add_user.php">Add Users</a></li>
  <li><a href="#" class="active">Subscribed Users</a></li>
  <li><a href="upload_information.php">Upload Information</a></li>
  <li><a href="home.php">Home</a></li>
  <li style="float:left"><a href="#">Health</a></li>
</ul>

<h2>Subscribed Users</h2>
<button id="getPdf" class="pdf-btn">Get PDF</button>

<table>
  <tr>
    <th>ID</th>
    <th>FullName</th>
    <th>Email</th>
    <th>License</th>
    <th>Specialization</th>
  </tr>

  <?php
include "../connection.php";

// Retrieve users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    // Fetch and display users in the HTML table
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['license'] . "</td>";
        echo "<td>" . $row['specialization'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No subscribed users found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>


</table>



<script>
    document.getElementById('getPdf').addEventListener('click', function () {
        // Create a form element
        var form = document.createElement('form');
        form.method = 'GET';
        form.action = 'generate_pdf.php';

        // Add an input field to the form
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'generate_pdf';
        input.value = '1';
        form.appendChild(input);

        // Append the form to the document
        document.body.appendChild(form);

        // Submit the form
        form.submit();

        // Remove the form from the document
        document.body.removeChild(form);
    });
</script>


</body>
</html>