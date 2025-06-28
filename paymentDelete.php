<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `ticket` where ID=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo "Deleted Successfull";
       header('location:Billing History.php');
    }
    else{
        die(mysqli_error($con));
    }
}
 ?>