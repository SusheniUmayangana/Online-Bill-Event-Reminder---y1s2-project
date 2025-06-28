<?php
if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eventhandler";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM events WHERE id = $id";
    $conn->query($sql);
}

// redirect to user to main form after enter data..
header("location: Form.php");
exit;
?>