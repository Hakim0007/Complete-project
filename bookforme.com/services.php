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
    <title>Services - BookForMe.com</title>   
    <style>
      .service-section {
        margin-bottom: 50px;
        text-align: left;
      }
      .service-section img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        margin-bottom: 20px;
      }
    </style>
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
                <a class="nav-link active" aria-current="page" href="index.php" title="Home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.php" title="Services">Services</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Hotels">
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

    <div class="container mt-5">
      <h2 class="text-center">Our Services</h2>

      <!-- Food Section -->
      <div id="food" class="service-section">
        <h3>Food</h3>
        <img src="images/services/service1.jpg" alt="Food Service">
        <p>
        Embark on an exquisite culinary journey at our hotel, where each meal is meticulously crafted to be a 
        celebration of flavor, freshness, and creativity. Our talented chefs source the finest local and seasonal 
        ingredients, ensuring that every dish is a vibrant symphony of taste and texture. From our sumptuous breakfast 
        buffets to our elegant multi-course dinners, you will experience a delightful blend of traditional and contemporary 
        cuisines, all prepared with a dedication to excellence. Whether you are enjoying a casual lunch by the pool, 
        a refined dinner in our signature restaurant, or a bespoke private dining experience, 
        our commitment to exceptional culinary artistry will make every meal a memorable highlight of your stay.
        </p>
      </div>

      <!-- Spa & Pool Section -->
      <div id="spa-pool" class="service-section">
        <h3>Spa & Pool</h3>
        <img src="images/services/service2.jpg" alt="Spa & Pool Service">
        <p>
        Immerse yourself in tranquility at our serene spa and pool facilities, where relaxation and 
        rejuvenation are the ultimate goals. Indulge in a diverse range of expertly designed spa 
        treatments tailored to refresh your mind and body, from soothing massages to invigorating 
        facials. After your spa experience, take a refreshing dip in our immaculate pool, offering a 
        serene environment to unwind and enjoy. With our commitment to providing exceptional relaxation at
         affordable prices, we ensure that everyone can experience the blissful escape they deserve.
        </p>
      </div>

      <!-- Cinema Section -->
      <div id="cinema" class="service-section">
        <h3>Cinema</h3>
        <img src="images/services/service3.jpg" alt="Cinema Service">
        <p>
        Elevate your entertainment experience with our exclusive cinema offering, where watching the 
        latest movies becomes a luxurious affair. Settle into plush, comfortable seating and immerse yourself 
        in a state-of-the-art viewing environment, featuring cutting-edge audio and visual systems that deliver 
        stunning clarity and depth. Our cinema is designed to provide an unforgettable movie experience, combining
         the latest films with unmatched comfort and technology for the ultimate in entertainment luxury.
        </p>
      </div>

      <!-- Staff Services Section -->
      <div id="staff-services" class="service-section">
        <h3>Staff Services</h3>
        <img src="images/services/service4.jpg" alt="Staff Services">
        <p>
        Experience personalized hospitality with our dedicated team of professionals, committed to making your 
        stay exceptional. From our attentive concierge services to meticulous housekeeping, our staff goes above 
        and beyond to ensure your comfort and satisfaction. Whether you need assistance with special requests, 
        recommendations, or any aspect of your stay, we are here to provide attentive and tailored service to meet your every need. 
        Your comfort is our priority, and we are here to make your stay as pleasant and seamless as possible.        </p>
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
