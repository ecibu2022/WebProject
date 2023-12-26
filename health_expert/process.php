<?php
include "../connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $license = $_POST['license'];
    $specialization = $_POST['specialization'];
    $uname = $_POST['uname'];
    $password = $_POST['psw'];
    $role = $_POST['role'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (name, email, license, specialization, uname, psw, role) 
            VALUES ('$fullname', '$email', '$license', '$specialization', '$uname', '$password', '$role')";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User added successfully";
        header("Location: subscribed_users.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
