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
    <title>Register - BookForMe.com</title>   
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
<!-- Register Form -->
<div class="container-fluid bg-light p-4">
  <div class="row justify-content-center">
    <div class="col-md-6 mt-5">
      <div class="card p-2">
        <div class="card-body">
          <h3 class="card-title text-center mb-4">Register</h3>
          <form action="register.php" method="post">
          <?php
        include "connection/connect.php";
        if (isset($_POST['signup'])) {
            $uname = $_POST['uname'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];

            $sql = "SELECT username from users WHERE username='{$uname}'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
              ?>
              <div class="alert alert-warning" role="alert">
              User Already Exists!
              </div>
              <?php            
              } else {
                $sql1 = "INSERT INTO users(username,first_name,last_name,email,phone,address,password) values('{$uname}','{$fname}','{$lname}','{$email}','{$phone}','{$address}','{$password}')";
                if (mysqli_query($con, $sql1)) {
                  ?>
                  <div class="alert alert-success" role="alert">
                  Account created successfully!
                  </div>
                  <?php   
                }
            }
        }
        ?>
          <div class="mb-3">
              <label for="uname" class="form-label">Username</label>
              <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter user name" Required>
            </div>
            <div class="mb-3">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" id="firstName" name="fname" placeholder="Enter first name" Required>
            </div>
            <div class="mb-3">
              <label for="lastName" class="form-label">Last Name</label>
              <input type="text" class="form-control" id="lastName" name="lname" placeholder="Enter last name" Required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" Required>
            </div>
            <div class="mb-3">
              <label for="phoneNumber" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phoneNumber" name="phone" placeholder="Enter phone number" Required>
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" Required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" Required>
            </div>
            <div class="d-flex justify-content-between">
              <button type="submit" class="btn" name="signup" style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e">Register</button>
              <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
          </form>
          <div class="mt-3 text-center">
            <a href="login.php" class="text-decoration-underline" style="color:#9a3d6e;">Already have an account? Login</a>
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
