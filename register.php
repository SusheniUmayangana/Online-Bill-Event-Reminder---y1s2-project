<?php

$conn = mysqli_connect("localhost", "root", "", "eventhandler");

if (!$conn){
    die("Connection Failed!" . mysqli_connect_error());
}

// Create the 'register' table if it doesn't exist
$create_table_sql = "CREATE TABLE IF NOT EXISTS register (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    pwd VARCHAR(255) NOT NULL
)";

if (!mysqli_query($conn, $create_table_sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

if (isset($_POST['submitbtn'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $sql = "INSERT INTO register (firstname, lastname, username, email, pwd) VALUES ('$firstname', '$lastname', '$username', '$email', '$pwd')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User successfully created";
        header('location: login.html');
        exit; // Add exit after header to stop script execution
    } else {
        die(mysqli_error($conn));
    }
}

mysqli_close($conn);

?>
