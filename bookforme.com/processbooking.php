<?php
include "connection/connect.php";

    $price = $_POST['pr'];
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $em = $_POST['em'];
    $ph = $_POST['ph'];
    $ad = $_POST['ad'];
    $co = $_POST['co'];
    $rid= $_POST['room_id'];
    $hname= $_POST['hotel_name'];
    $cdate = $_POST['cdate'];
    $days= $_POST['days'];
    $bdate=date("Y-m-d");
    $total_bill= $price * $days;

    $sql ="INSERT into booking(room_id,hotel_name,first_name,last_name,email,phone,address,country,check_in_date,days,total_bill,booking_date)
            values('{$rid}','{$hname}','{$fname}','{$lname}','{$em}','{$ph}','{$ad}','{$co}','{$cdate}','{$days}','{$total_bill}','{$bdate}')";

    $sql2="update rooms set rooms=rooms-1 where room_id='$rid'";
    mysqli_query($con,$sql2);        

    if (mysqli_query($con, $sql)) {
        header("Location: bookingconfirmed.php?em=1");
        header("Location: bookingconfirmed.php?email=" . urlencode($em));

        exit;
        } else {
        echo "Error updating event: " . mysqli_error($con);
    }
