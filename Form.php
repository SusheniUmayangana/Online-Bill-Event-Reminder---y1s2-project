<!DOCTYPE html>
<html lang="en">
<head>
    <!--Adding links for Title & website Icon-->
    <title>Online Bill and Event Reminder</title>
    <link rel="icon" type="image/x-icon" href="Images/PageIcon.png">
    <!--Style link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Content Section Start Here..-->
    <!-- product CRUD section starts  -->
	<div class="container my-5">
        <h2>List of Events</h2>
        <a class="btn btn-primary" href="update.php" role="button">New Event</a>
        <a class="btn btn-outline-success" href="Index.html" role="button">Home</a>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Venue</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "eventhandler";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Read all rows from database table
                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);

                    if (!$result) 
                    {
                        die("Invalid Query..  " . $conn->error);
                    }

                    // read data from each row
                    while($row = $result->fetch_assoc())
                    {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[venue]</td>
                            <td>$row[price]</td>
                            <td>$row[date]</td>
                            <td>$row[time]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='edit.php?id=$row[id]'>Update</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>

            </tbody>
        </table>

    </div>
    <!-- product CRUD section ends -->
    <!-- Content Section End Here..-->

</body>
</html>