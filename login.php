<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM register WHERE username='$username' AND pwd='$pwd'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        echo "Login successful!";
        header('Location: User_profile.php');
    } else {
        echo "Invalid username or password.";
    }
}



