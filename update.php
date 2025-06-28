<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventhandler";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$name = "";
$venue = "";
$price = "";
$date = "";
$time = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST["name"];
    $venue = $_POST["venue"];
    $price = $_POST["price"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    do{
        if( empty($name) || empty($venue) || empty($price) || empty($date) || empty($time))
        {
            $errorMessage = "All Field's are required..";
            break;
        }

        // add new event to the database..
        $sql = "INSERT INTO events (name, venue, price, date, time)" .
                "VALUES ('$name', '$venue', '$price', '$date', '$time')";
        $result = $conn->query($sql);

        if (!$result) 
        {
            $errorMessage = "Invalid Query :   " . $conn->error;
            break;
        }

        $name = "";
        $venue = "";
        $price = "";
        $date = "";
        $time = "";

        $successMessage = "Event added correctly..";
        
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
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-lable">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-lable">Venue</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="venue" value="<?php echo $venue; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-lable">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $price; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-lable">Date</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="date" value="<?php echo $date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class = "col-sm-3 col-form-lable">Time</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="time" value="<?php echo $time; ?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage))
            {
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