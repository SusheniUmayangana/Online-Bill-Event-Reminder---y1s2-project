<?php
include("connection.php");

// Get the card ID from the URL parameter
$id = $_GET['id'];

// Prepare and execute the SQL query to delete the card
$sql = "DELETE FROM register WHERE id = $id";
$result = $conn->query($sql);

// Check if the card was deleted successfully
if ($result === TRUE) 
{
    echo "<script>alert('deleted'); 
            window.location.href = 'User_profile.php'
          </script>;";
} 
else 
{
    echo "Error deleting card: " . $conn->error;
}

// Close the database connection
$conn->close();
?>