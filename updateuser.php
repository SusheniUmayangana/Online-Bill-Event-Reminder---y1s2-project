<?php
    // Use PHP to connect to the MySQL database and retrieve the card details.
    include("connection.php");

    $firstname = "";
    $lastname = "";
    $username = "";
    $email = "";
    $pwd = "";
  
    // Function to sanitize user input
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($_GET["id"])) {
        $id = sanitize_input($_GET["id"]);
        setcookie("id", $id, time() + (86400 * 30), "/");

        $sql = "SELECT * FROM register WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $username = $row['username'];
            $email = $row['email'];
            $pwd = $row['pwd'];
        } else {
            echo "No data found.";
        }
    }
   
    // Allow the user to update the card details in the form.
    if(isset($_POST['submitbtn'])) {
        $firstname = sanitize_input($_POST['firstname']);
        $lastname = sanitize_input($_POST['lastname']);
        $username = sanitize_input($_POST['username']);
        $email = sanitize_input($_POST['email']);
        $pwd = sanitize_input($_POST['pwd']);
        
        // Use PHP to update the card details in the MySQL database.
        $sql = "UPDATE register 
                SET firstname=?, lastname=?, username=?, email=?, pwd=? 
                WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $firstname, $lastname, $username, $email, $pwd, $_COOKIE['id']);

        if ($stmt->execute()) {
            echo "<script>
                    alert('card details updated'); 
                    window.location.href = 'User_profile.php'
                    </script>;";
        } else {
            echo "Error updating card details: " . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Card Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-top: 0;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        input:focus {
            outline: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

    </style>
</head>
<body>
    <form action="updateuser.php" method="post">
        <h2>Update Profile</h2>
        <label for="name">First name</label>
        <input type="text" id="name" name="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>">

        <label for="card-number">Last name</label>
        <input type="text" id="card-number" name="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>">

        <label for="expiry-date">Username</label>
        <input type="text" id="expiry-date" name="username" placeholder="Username" value="<?php echo $username; ?>">

        <label for="cvv">Email</label>
        <input type="text" id="cvv" name="email" placeholder="Email" value="<?php echo $email; ?>">

        <label for="email">Password</label>
        <input type="text" id="email" name="pwd" placeholder="Password" value="<?php echo $pwd; ?>">

        <input type="submit" name="submitbtn" class="contestant" value="Update">
    </form>
</body>
</html>
