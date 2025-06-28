<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventhandler";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$id = "";
$name = "";
$venue = "";
$price = "";
$date = "";
$time = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    // GET METHOD : shows the data of event..
    if (!isset($_GET["id"]))
    {
        header("location: Form.php");
        exit;
    }

        $id = $_GET["id"];

        // read the row of the selected event from the database file..
        $sql = "SELECT * FROM events WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if (!$row) 
        {
            // redirect to user to main form after enter data..
            header("location: Form.php");
            exit;
        }

        $name = $row["name"];
        $venue = $row["venue"];
        $price = $row["price"];
        $date = $row["date"];
        $time = $row["time"];

}
else
{
    // POST METHOD : update the data of the event..

    $id = $_POST["id"];
    $name = $_POST["name"];
    $venue = $_POST["venue"];
    $price = $_POST["price"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    do{
        // check for empty row..
        if( empty($name) || empty($venue) || empty($price) || empty($date) || empty($time))
        {
            $errorMessage = "All Field's are required..";
            break;
        }
        

        // update event to the database..
        $sql = "UPDATE events " . 
                "SET name = '$name', venue = '$venue', price = '$price', date = '$date', time = '$time' " .
                "WHERE id = $id";


        $result = $conn->query($sql);

        if (!$result) 
        {
            $errorMessage = "Invalid Query :   " . $conn->error;
            break;
        }

        $successMessage = "Event updated correctly..";

        // redirect to user to main form after enter data..
        header("location: Form.php");
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Adding links for Title & website Icon-->
    <title>Online Bill and Event Reminder</title>
    <link rel="icon" type="image/x-icon" href="Images/PageIcon.png">
    <!--Style link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
    <!-- Content Section Start Here..-->
    <div class = "container my-5">
        <h2>New Event.</h2>

        <?php
        if(!empty($errorMessage))
        {
           echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-alert='alert' aria-lable='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <input type="hidden"  name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class = "col-sm-3 col-from-lable">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-from-lable">Venue</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="venue" value="<?php echo $venue; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-from-lable">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-from-lable">Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-from-lable">Time</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="time" value="<?php echo $time; ?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-alert='alert' aria-lable='Close'></button>
                    </div>
                </div>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="Form.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <!-- Content Section End Here..-->
</body>
</html>