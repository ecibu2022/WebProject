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
        echo "<td>" . $row['role'] . "</td>";
        echo "<td><a style='text-decoration:none; 
        background-color: #04AA6D;
        color: white;
        padding: 8px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;' href='edit_user.php?id=" . $row['id'] . "'>Edit</a></td>";
        echo "<td><a  style='text-decoration:none; 
        background-color: #FF0000;
        color: white;
        padding: 8px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;' href='delete_user.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No users found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
