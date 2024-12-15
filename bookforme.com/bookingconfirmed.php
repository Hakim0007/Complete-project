<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/x-icon" href="images/bookformelogo.png">
    <title>Marriott Hotel - BookForMe.com</title>   
  </head>
  <body>
  <div class="bg-image">
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
  <div class="container-fluid">
  <a class="navbar-brand" href="index.php">
      <img src="images/bookformelogo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
      BookForMe.com
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php" title="Home" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php" title="Services">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="hotels.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Hotels">
            Hotels
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="hotel.php?hid=1" title="Marriott">Marriott</a></li>
            <li><a class="dropdown-item" href="hotel.php?hid=2" title="Hilton">Hilton</a></li>
            <li><a class="dropdown-item" href="hotel.php?hid=3" title="Hyatt">Hyatt</a></li>
            <li><a class="dropdown-item" href="hotel.php?hid=4" title="Four Seasons">Four Seasons</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userbookings.php" title="Services">Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php" title="Contact Us">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex" action="search.php" method="post">
        <input class="form-control me-2" type="search" placeholder="Search" name="key" aria-label="Search">
        <button class="btn" style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e" type="submit">Search</button>
      </form>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php
                include "connection/connect.php";
                session_start();
                $uname="";
                if (!isset($_SESSION["uname"])) { ?>
                    <a class="nav-link active" aria-current="page" href="login.php">Login/Register</a>
                <?php } else {                   
                  $uname=$_SESSION["uname"];
                  ?>
                  <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                  <?php }?>
        </li>
        </ul>
        
    </div>
  </div>
</nav>
</div>
<?php
    include "connection/connect.php";
    $email=$_GET["email"];
    $sql = "SELECT booking.booking_id, booking.room_id, booking.hotel_name, booking.check_in_date, booking.days, booking.total_bill, booking.booking_date, rooms.room_name FROM booking JOIN rooms ON booking.room_id = rooms.room_id where email='$email'";
    $result = mysqli_query($con, $sql);

    $totalQuery = "SELECT SUM(total_bill) as grand_total FROM booking WHERE email='$email'";
    $totalResult = mysqli_query($con, $totalQuery);
    $totalRow = mysqli_fetch_assoc($totalResult);
    $grandTotal = $totalRow['grand_total'];

    ?>
<!-- fill details -->
<div class="container-fluid bg-light p-2">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-2 position-relative">
                <div class="card p-2">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Booking Confirmation</h3>
                        <h5 class="text-success">Your booking has been confirmed.</h5>
                        <hr>
                        <?php 
                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                        <h5 class="bg-success text-light p-4">Your booking id: BFM-00<?php echo $row['booking_id']; ?></h5>
                        <p><b>Hotel:</b> <?php echo $row['hotel_name']; ?></p>
                        <p><b>Check-in Date:</b> <?php echo $row['check_in_date']; ?></p>
                        <p><b>Room Type:</b> <?php echo $row['room_name']; ?></p>
                        <p><b>Number of days for stay: </b><?php echo $row['days']; ?></p>
                        <hr>
                        <p><b>Total Bill for One room: </b>  $<?php echo $row['total_bill']; ?></p>
                        <hr>
                        <?php }}?>
                        <br>
                        <h5 class="bg-info text-light p-4">Grand Total: $<?php echo number_format($grandTotal, 2); ?></h5>
                        <p class="fw-bold text-warning">Note:You will pay your bill on the site and then we will provide you further details of your rooms.</p>
                        <p class="fw-bold text-danger">Note:You can cancel your booking by contacting along with your booking number.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid footerbg mt-5">
  <footer class="py-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
      <li class="nav-item"><a href="services.php" class="nav-link px-2 text-muted text-white">Services</a></li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white  text-decoration-underline" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hotels
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="marriott.php" title="Marriott">Marriott</a></li>
            <li><a class="dropdown-item" href="hilton.php" title="Hilton">Hilton</a></li>
            <li><a class="dropdown-item" href="hyatt.php" title="Hyatt">Hyatt</a></li>
            <li><a class="dropdown-item" href="fourseasons.php" title="Four Seasons">Four Seasons</a></li>
          </ul>
        </li>      
      <li class="nav-item"><a href="contactus.php" class="nav-link px-2 text-muted text-white">Contact Us</a></li>
    </ul>
    <p class="text-center text-muted text-white">© 2024 BookForMe.com</p>
  </footer>
</div>
 <!-- Bootstrap JS and dependencies -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script>
        const pricePerDay = 180; // Set your price per day
        const noOfDaysInput = document.getElementById('noOfDays');
        const priceDisplay = document.getElementById('priceDisplay');

        function updatePrice() {
            const noOfDays = parseInt(noOfDaysInput.value) || 0;
            const totalPrice = pricePerDay * noOfDays;
            priceDisplay.textContent = `$${totalPrice.toFixed(2)}`;
        }

        noOfDaysInput.addEventListener('input', updatePrice);
      // JavaScript to set the minimum date to the current date
      document.addEventListener('DOMContentLoaded', function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('checkInDate').setAttribute('min', today);
    });
   
   
   </script>

</body>
</html>


