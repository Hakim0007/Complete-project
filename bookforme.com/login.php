<?php
include "connection/connect.php";
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
    <link rel="stylesheet" href="css/style1.css">
    <link rel="icon" type="image/x-icon" href="images/bookformelogo.png">
    <title>Login - BookForMe.com</title>   
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
          <a class="nav-link active" aria-current="page" href="login.php">Login/Register</a>
        </li>
        </ul>
    </div>
  </div>
</nav>
</div>
<!-- Login Form -->
<div class="container-fluid bg-light p-4">
  <div class="row justify-content-center">
    <div class="col-md-4 mt-5">
      <div class="card  p-2">
        <div class="card-body">
          <h3 class="card-title text-center mb-4">Login</h3>
          <?php
            
            if (isset($_POST['login'])) {
                session_start();
                $uname = $_POST['username'];
                $s_pass = $_POST['password'];
                $sql = "SELECT * FROM users WHERE (username='$uname' AND password='$s_pass')";
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["uname"] = $row['username'];
                        $_SESSION["email"]=$row['email'];
                         header("Location:index.php");
                    }
                } else {  ?>
                      <div class="alert alert-danger" role="alert">
                      Username or password is not matched
                      </div>
               <?php }
            }
            ?>
          <form action="" method="post">
            <div class="mb-3">
              <label for="username" class="form-label">User Name</label>
              <input type="text" class="form-control" id="uname" name="username" placeholder="User name" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" name="login" class="btn w-100" style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e">Login</button>
          </form>
          <div class="mt-3 text-center">
            <a href="register.php" class="text-decoration-underline" style="color:#9a3d6e;">Don't have an account? Register</a>
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
