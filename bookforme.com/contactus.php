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
    <title>Contact Us - BookForMe.com</title>   
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
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center">Contact Us</h2>
          <form action="contactus.php" method="post">
          <?php
        include "connection/connect.php";
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $sql1 = "INSERT INTO cms(name,email,phone,message) values('{$name}','{$email}','{$phone}','{$message}')";
                if (mysqli_query($con, $sql1)) {
                  ?>
                  <div class="alert alert-success" role="alert">
                  Message sent successfully!
                  </div>
                  <?php   
                }
          }
        ?>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="5" name="message" style="resize:none;" required></textarea>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" name="send" class="btn" style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e">Send</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
          </form>
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
