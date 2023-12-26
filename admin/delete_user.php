<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete the user from the database
    $sql = "DELETE FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User deleted successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
