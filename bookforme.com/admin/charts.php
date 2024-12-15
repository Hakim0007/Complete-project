<?php 
session_start();
if(!isset($_SESSION["admin"])){
  header("Location:index.php");
  exit();
}

$servername = "localhost"; 
$username = "root";  
$password = ""; 
$dbname = "bookforme_com";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$hotels = ["JW Marriott Hotel Kuwait City", "Hilton Garden Inn Kuwait", "Grand Hyatt Kuwait", " Four Seasons Hotel Kuwait at Burj Alshaya"];
$hotelData = [];

foreach ($hotels as $hotel) {
    $sql_bookings = "SELECT COUNT(*) AS count FROM booking WHERE hotel_name='$hotel'";
    $sql_rooms = "SELECT SUM(rooms.rooms) AS count FROM rooms JOIN hotels ON rooms.hotel_id = hotels.hotel_id WHERE hotels.hotel_name='$hotel'";

    $result_bookings = $con->query($sql_bookings);
    $result_rooms = $con->query($sql_rooms);

    $count_bookings = $result_bookings->fetch_assoc()['count'];
    $count_rooms = $result_rooms->fetch_assoc()['count'];

    $hotelData[] = [
        'name' => $hotel,
        'bookings' => $count_bookings,
        'rooms' => $count_rooms
    ];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="icon" type="image/x-icon" href="../images/bookformelogo.png">
    <title>Hotel Reports - BookForMe.com</title>   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
  <div class="bg-image">
  <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
  <div class="container-fluid">
  <a class="navbar-brand" href="dashboard.php">
      <img src="../images/bookformelogo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
      BookForMe.com
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" title="Dashboard" >Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookings.php" title="Services">Bookings</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="managerooms.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Hotels">
            Rooms
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="addrooms.php" title="Add Rooms">Add Rooms</a></li>
            <li><a class="dropdown-item" href="allrooms.php" title="All Rooms">All Rooms</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cms.php" title="CMS">CMS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reports.php" title="Reports">Reports</a>
        </li>
      </ul>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adminlogout.php">Logout</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
</div>
  <div class="container mt-5">
    <h1 class="text-center">Hotel Charts</h1>
    <br><br>
    <div class="row">
      <?php foreach ($hotelData as $index => $hotel): ?>
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $hotel['name']; ?></h5>
              <canvas id="chart-<?php echo $index; ?>"></canvas>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col-md-2 mb-3">
      <a href="reports.php" class="btn btn-purple">Back to Reports</a>
      </div>
    </div>
  </div>
  <div class="container-fluid footerbg mt-5">
  <footer class="py-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
      <li class="nav-item"><a href="dashboard.php" class="nav-link px-2 text-white text-decoration-underline">Dashboard</a></li>
      <li class="nav-item"><a href="bookings.php" class="nav-link px-2 text-muted text-white">bookings</a></li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rooms
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="addrooms.php" title="Add Room">Add Rooms</a></li>
            <li><a class="dropdown-item" href="allrooms.php" title="Hilton">All Rooms</a></li>
          </ul>
        </li>      
      <li class="nav-item"><a href="cms.php" class="nav-link px-2 text-muted text-white">CMS</a></li>
    </ul>
    <p class="text-center text-muted text-white">© 2024 BookForMe.com</p>
  </footer>
</div>
  <?php $con->close(); ?>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
    var hotelData = <?php echo json_encode($hotelData); ?>;

    hotelData.forEach(function(hotel, index) {
      var ctx = document.getElementById('chart-' + index).getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Total Bookings', 'Total Rooms'],
          datasets: [{
            label: hotel.name,
            data: [hotel.bookings, hotel.rooms],
            backgroundColor: [
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    });
  });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
