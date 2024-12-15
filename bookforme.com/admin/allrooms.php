<?php 
session_start();
if(!isset($_SESSION["admin"])){
  header("Location:index.php");
  exit;
}

include('../connection/connect.php'); 

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="icon" type="image/x-icon" href="../images/bookformelogo.png">
    <title>BookForMe.com</title>   
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
          <a class="nav-link" aria-current="page" href="dashboard.php" title="Dashboard" >Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookings.php" title="Services">Bookings</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="managerooms.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Hotels">
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
    <h2 class="text-center">All Rooms</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Room Type</th>    
                    <th scope="col">Hotel</th>
                    <th scope="col">Qualities</th>
                    <th scope="col">Services</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Beds</th>
                    <th scope="col">Price$</th>
                    <th scope="col">Rooms</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query="SELECT rooms.room_id,rooms.room_name,hotels.hotel_name,hotels.hotel_id,rooms.qualities,rooms.service1,rooms.service2,rooms.service3,
                rooms.capacity,rooms.beds,rooms.price,rooms.rooms,rooms.image1 FROM rooms JOIN hotels ON rooms.hotel_id = hotels.hotel_id";
                $result = mysqli_query($con, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['room_name']}</td>";
                        echo "<td>{$row['hotel_name']}</td>";
                        echo "<td>{$row['qualities']}</td>";
                        echo "<td>{$row['service1']}, {$row['service2']}, {$row['service3']}</td>";
                        echo "<td>{$row['capacity']}</td>";
                        echo "<td>{$row['beds']}</td>";
                        echo "<td>{$row['price']}</td>";
                        echo "<td>{$row['rooms']}</td>";
                        echo "<td>"?>      
                        <a href="../images/<?php echo $row['image1']; ?>"><img src="../images/<?php echo $row['image1']; ?>" alt="" width="60" height="60" class="d-inline-block align-text-top"></a>
                        <?php echo "<td>
                            <button onclick='confirmCancel({$row['room_id']})' class='btn btn-danger btn-sm'>Delete</button>
                            </td>";
                             echo "<td>
                                <a href='editroom.php?id={$row['room_id']}&&rid={$row['hotel_id']}' class='btn btn-success btn-sm'>Edit</a>
                                </td>"; 
                            echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13' class='text-center'>No bookings found</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
<script>
          function confirmCancel(bId) {
          if (confirm("Are you sure you want to delete this room?")) {
              window.location.href = 'delete_room.php?id=' + bId;
          }
      }
</script>
</body>
</html>
