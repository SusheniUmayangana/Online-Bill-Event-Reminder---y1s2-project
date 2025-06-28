<?php

$serverName="localhost";
$username="root";
$password="";
$databaseName="eventhandler";

$conn =mysqli_connect($serverName,$username,$password,$databaseName);

if(!$conn)
{
    die("connection faild:".mysqli_connect_error());
}
// else 
// {
//     echo "sucessfily";
// }


?>