<?php
session_start();
if(!isset($_SESSION["admin"])){
  header("Location:index.php");
  exit;
}

include('../connection/connect.php'); 


    $b_id = $_GET['id'];

    // SQL query to delete the booking
    $query = "DELETE FROM rooms WHERE room_id = '$b_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Booking cancelled successfully
        header("Location: allrooms.php");
        exit;
    } 
?>
