<?php
include("connection.php");
$sql = "SELECT * FROM register";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!--Adding links for Title & website Icon-->
    <title>Online Bill and Event Reminder</title>
    <link rel="icon" type="image/x-icon" href="Images/PageIcon.png">
    <!--Style link for Icons using on cards-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!--External Style Files link below-->
    <link rel="stylesheet" href="styles.css">

    <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <!-- Header Section (Navigation Bar) Start Here..-->
    <header>
        <img src="Images/Logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="Index.html" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="AboutUs.html" class="nav-link">About Us</a></li>
                <li><a href="CntactUs.html" class="nav-link">Contact Us</a></li>
                <li><a href="EventDashBoard.html" class="nav-link">Events</a></li>
                <li><a href="Login.html" class="btn1">Log In</a></li>
                <li><a href="Register.html" class="btn1">Register</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header Section (Navigation Bar) End Here..-->

    <!-- Content Section Start Here..-->
    <h2><center>User details</center></h2></br>
    <table class="table">
       
                <tr>
                    <th>userID</th>
                    <th>fristname</th>
                    <th>lastname</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
           
            <tbody>
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['pwd']; ?></td>

                        
                            <td><a href="updateuser.php?id=<?php echo $row['id']; ?>">update</a></td>
                            <td><a href="deleteuser.php?id=<?php echo $row['id']; ?>">delete</a></td>

                        </tr>
                <?php        }
                }

                ?>
            </tbody>
        </tr>
    </table>
    <br>
    <!-- Content Section End Here..-->

    <!-- Footer Section Start Here..-->
    <footer>
        <nav>
            <table class="t1">
                <tr>
                    <td><a href="AboutUs.html">About Us</a></td>
                    <td><a href="#">FAQ</a></td>
                    <td>Address</td>
                    <td>Follow On Us</td>
                </tr>

                <tr>
                    <td><a href="CntactUs.html">Contact Us</a></td>
                    <td><a href="#">Privacy Policy</a></td>
                    <td>33/23/1/1,</td>
                    <td><br>
                        <img src="Images/fb.png" class="icon">
                        <img src="Images/twitter.png" class="icon">
                        <img src="Images/google.png" class="icon">
                        <img src="Images/utube.png" class="icon"> 
                        <img src="Images/insta.jpeg" class="icon"> 
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td><a href="TermsAndConditions.html">Terms and Conditions</a></td>
                    <td>Albert Place,</td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td><br>Meda Welikada Road,</td>
                </tr>
                
                <tr>
                    <td></td>
                    <td></td>
                    <td><br>Rajagiriya, Sri Lanka.</td>
                </tr>

                <tr>
                    <td><img src="Images/visa.png" width="130px" height="40px"></td>
                </tr>
            </table>

            <table class="t2">
                <tr>
                    <td>
                        <div class="ft">
                            <center><img src="Images/call.png" class="icon1" height="50px" width="50px"></center>For assistance call<br>+94 7279456321<br>+94 7279456320
                        </div>
                    </td>
                    <td>
                        <div class="ft"><center><img src="Images/hrs.png" class="icon1" height="50px" width="50px"></center>Working Hours<br>9.00 AM - 5.00 PM<br><pre></pre>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <div class="ft"><center><img src="Images/mail.png" class="icon1" height="50px" width="50px"></center>Email Us On<br><a href="support@eventhandler.lk" >support@eventhandler.lk</a><br><pre></pre>
                        </div>
                    </td>
                </tr>
            </table>
        </nav>

        <hr>
        <p>Copyright 2024 &copy; <span>eventhandler.lk</span> All Rights Reserved.</p>
        <hr>

    </footer>
    <!-- Footer Section End Here..-->

</body>
</html>