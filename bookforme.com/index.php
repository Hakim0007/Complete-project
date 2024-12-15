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
    <title>BookForMe.com</title>   
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
          <a class="nav-link active" aria-current="page" href="#" title="Home" >Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.php" title="Services">Services</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="hotels.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Hotels">
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
<div class="container-fluid bg-light">
      <div class="row justify-content-center bg-light">
        <div class="col-md-2"></div>
        <div class="col-md-8 intro pt-4">
          <h2 class=" text-center">Welcome to BookForMe.com<b style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e;border-radius:10px;">
            <?php if(isset($_SESSION["uname"])){ echo $uname;}?>
          </b></h2>
          <p class="text-secondary">
            Discover the best hotel booking experience with BookForMe.com. Whether you are planning a family vacation, a business trip, or a romantic getaway, we offer the finest selection of hotels to meet all your needs. Enjoy seamless booking, exclusive deals, and personalized customer service that ensures your stay is comfortable and enjoyable. Let BookForMe.com be your trusted travel partner.
          </p>
        </div>
        <div class="col-md-2"></div>
      </div>
    </div>
<div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8 intro pt-4">
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card hover-effect">
                <img src="images/br1.jpg" class="card-img-top" alt="Room Image 1">
                <div class="card-footer text-muted">
                  <b>Luxury Rooms</b><br>
                Experience luxury in our elegantly designed rooms.                
              </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card hover-effect">
                <img src="images/br2.jpg" class="card-img-top" alt="Room Image 2">
                    <div class="card-footer text-muted">
                <b>Modern Residence</b><br>
                Relax in our stylish residence for a perfect stay              
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>    
<!-- Room qualities -->
<div class="container-fluid bg-light">
      <div class="row justify-content-center">
        <div class="col-md-8 intro pt-4">
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/bedroom1.jpg" class="card-img-top" alt="Room Image 1">
                <div class="card-footer text-muted">
                  <b>Luxury Rooms</b><br>
                Experience luxury in our elegantly designed rooms.                
              </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/bedroom2.jpg" class="card-img-top" alt="Room Image 2">
                    <div class="card-footer text-muted">
                <b>Modern Residence</b><br>
                Relax in our stylish residence for a perfect stay              
              </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/washroom1.jpg" class="card-img-top" alt="Room Image 2">
                <div class="card-footer text-muted">
                <b>Modern Residence</b><br>
                Relax in our stylish residence for a perfect stay              
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div> 
<!-- Services -->
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8 intro pt-4">
      <h3 class="text-center text-secondary">Our Services</h3>
      <div class="row">
        <div class="col-md-3 mb-4">
          <div class="card text-center border-0 hover-effect">
            <img src="images/services/service1.jpg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="Service 1" style="width: 150px; height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Food</h5>
              <p class="card-text">Indulge in a culinary journey at our hotel where every meal is a celebration of flavor and freshness.</p>
              <a href="services.php#food" style="text-decoration:none;font-weight:600;color:#9a3d6e;">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card text-center border-0 hover-effect">
            <img src="images/services/service2.jpg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="Service 2" style="width: 150px; height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Spa & Pool</h5>
              <p class="card-text">Immerse yourself in relaxation at our serene spa and pool facilities with affordable prices.</p>
              <a href="services.php#spa-pool" style="text-decoration:none;font-weight:600;color:#9a3d6e;">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card text-center border-0 hover-effect">
            <img src="images/services/service3.jpg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="Service 3" style="width: 150px; height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Cinema</h5>
              <p class="card-text">Elevate your entertainment experience with our exclusive cinema offering where you can enjoy.</p>
              <a href="services.php#cinema" style="text-decoration:none;font-weight:600;color:#9a3d6e;">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="card text-center border-0 hover-effect">
            <img src="images/services/service4.jpg" class="card-img-top rounded-circle mx-auto d-block mt-3" alt="Service 4" style="width: 150px; height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Staff Services</h5>
              <p class="card-text">Experience personalized hospitality with our dedicated team of professionals.</p>
              <a href="services.php#staff-services" style="text-decoration:none;font-weight:600;color:#9a3d6e;">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</div>

<!-- special offers -->
 <div class="container-fluid bg-light mb-5 pb-4">
      <div class="row justify-content-center">
        <div class="col-md-8 intro pt-4">
        <h3 class="text-center text-secondary">Special Offers</h3>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/offers1.jpg" class="card-img-top" alt="Room Image 1">
                <div class="card-footer text-muted text-justify">
                  <b>Honeymoon Package</b><br>
                  Escape into romance with our enchanting honeymoon package.          
              </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/offers2.jpg" class="card-img-top" alt="Room Image 2">
                <div class="card-footer text-muted">
                <b>Family Holidays</b><br>
                Embrace amazing family moments with our tailored family holidays package.             
              </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card hover-effect">
                <img src="images/offers3.jpg" class="card-img-top" alt="Room Image 2">
                    <div class="card-footer text-muted">
                <b>Business Trip</b><br>
                Elevate your business travel experience with our efficient business trip package.              
              </div>
              </div>
            </div>
          </div>
        </div>
      </div> 
  </div>
<div class="container-fluid footerbg mt-5">
  <footer class="py-3">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
      <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white text-decoration-underline">Home</a></li>
      <li class="nav-item"><a href="services.php" class="nav-link px-2 text-muted text-white">Services</a></li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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


