<?php
include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details from the database
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Check if the form is submitted for updating user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];
    $fullname = $_POST['name'];
    $license = $_POST['license'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Update user data in the database
    $sql = "UPDATE users SET name='$fullname', license='$license', specialization='$specialization', email='$email', role='$role' WHERE id=$userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User updated successfully";
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<style>
    input[type='text'], select{
        width: 50%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
</style>

<h3>Update User</h3>
<!-- HTML form for editing user data -->
<form action="edit_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <label for="">FullName</label><br>
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
    <label for="">License Number</label><br>
    <input type="text" name="license" value="<?php echo $user['license']; ?>" required><br>
    <label for="">Specialization</label><br>
    <input type="text" name="specialization" value="<?php echo $user['specialization']; ?>" required><br>
    <label for="">EmailAddress</label><br>
    <input type="text" name="email" value="<?php echo $user['email']; ?>" required><br>
    <label for="">Role</label><br>
    <select name="role" required>
        <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>user</option>
        <option value="expert" <?php if ($user['role'] == 'expert') echo 'selected'; ?>>expert</option>
    </select><br>
    <button type="submit" style="
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 20%;
  margin-bottom:10px;
  opacity: 0.8;">Update</button>
</form>
