<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("Location:index.php");
  exit;
}

include('../connection/connect.php'); 


    $b_id = $_GET['id'];
    $r_id=$_GET['rid'];

    // SQL query to delete the booking
    $query = "UPDATE booking set is_end=1 WHERE booking_id = '$b_id'";
    $result = mysqli_query($con, $query);

    $sql2="update rooms set rooms=rooms+1 where room_id='$r_id'";
    mysqli_query($con,$sql2);        

    if ($result) {
        header("Location: bookings.php");
        exit;
    } 
?>
