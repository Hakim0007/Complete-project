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

        $hid=$_POST['key'];
        $sql2 = "SELECT * from rooms where room_name LIKE '%$hid%'  && rooms > 0";
        $result2 = mysqli_query($con, $sql2);
    ?>
<div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8 intro pt-4">
        <h2 class=" text-center">Search result for "<?php echo $hid;  ?>"</h2><br>
        
        <!-- Price Range Search Form -->
        <form class="row g-3 mb-4" action="search.php" method="post">
          <input type="hidden" name="key" value="<?php echo $hid; ?>">
          <div class="col-md-4">
            <label for="minPrice" class="form-label">Min Price</label>
            <input type="number" class="form-control" id="minPrice" name="minPrice" placeholder="0" min="1">
          </div>
          <div class="col-md-4">
            <label for="maxPrice" class="form-label">Max Price</label>
            <input type="number" class="form-control" id="maxPrice" name="maxPrice" placeholder="100" min="1">
          </div>
          <div class="col-md-4 align-self-end">
            <button type="submit" class="btn btn-purple">Apply Filter</button>
          </div>
        </form>

          <div class="row">
          <?php
                if (isset($_POST['minPrice']) && isset($_POST['maxPrice'])) {
                  $minPrice = $_POST['minPrice'];
                  $maxPrice = $_POST['maxPrice'];
                  $sql2 .= " AND price >= $minPrice AND price <= $maxPrice";
                  $result2 = mysqli_query($con, $sql2);
                }

                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                      $room_id=$row2['room_id'];
                ?>
            <div class="col-md-6 mb-4">
              <div class="card hover-effect">
                <img src="images/<?php echo $row2['image1']; ?>" class="card-img-top" alt="Room Image 1">
                <div class="card-footer text-muted">
                <div class="card-content">
                        <h3><?php echo $row2['room_name']; ?></h3>
                        <p><strong>Qualities:</strong> <?php echo $row2['qualities']; ?></p>
                        <ul>
                            <li><?php echo $row2['service1']; ?></li>
                            <li><?php echo $row2['service2']; ?></li>
                            <li><?php echo $row2['service3']; ?></li>
                        </ul>
                        <p><strong>Capacity:</strong> <?php echo $row2['capacity']; ?></p>
                        <p><strong>Beds:</strong> <?php echo $row2['beds']; ?></p>
                        <p><strong>Price per Night:</strong> $<?php echo $row2['price']; ?></p>
                        <p><strong>Rooms Left:</strong> <?php echo $row2['rooms']; ?></p>
                    </div>                
              </div>
              <a href="hotelavailability.php?h_id=<?php echo $row2['hotel_id']; ?>&room_id=<?php echo $row2['room_id']; ?>" class="btn btn-purple">Check Availability</a>
              </div>
            </div>
            <?php } }?>
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
</body>
</html>
