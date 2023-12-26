<?php
session_start();

include "connection.php";

if (isset($_POST['uname']) && isset($_POST['psw'])) {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Modify the SQL query to fetch user details based on the provided username and password
    $sql = "SELECT * FROM users WHERE uname = ? AND psw = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Fetch result
    $result = mysqli_stmt_get_result($stmt);

    // Check if user exists
    if ($row = mysqli_fetch_assoc($result)) {
        // User exists
        $role = $row['role'];

        // Set session variable based on user role
        $_SESSION['user_id'] = $row['id']; 

        // Redirect based on user role
        if ($role === 'admin') {
            echo "<script>alert('Logged in Successfully'); window.location='admin/index.php';</script>";
            exit();
        } elseif ($role === 'user') {
            echo "<script>alert('Logged in Successfully'); window.location='user/home.php';</script>";
            exit();
        } elseif ($role === 'expert') {
            echo "<script>alert('Logged in Successfully'); window.location='health_expert/home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid role!'); window.location='index.php';</script>";
        }
    } else {
        // Replace echo statement with JavaScript alert
        echo "<script>alert('Invalid username or password'); window.location='index.php';</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($conn);
?>
