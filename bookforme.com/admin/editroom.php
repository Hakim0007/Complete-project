<?php 
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}

include('../connection/connect.php');

// Check if ID is set
if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    // Fetch existing room details
    $query = "SELECT * FROM rooms WHERE room_id = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, 'i', $room_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $room = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
    } else {
        die("Error preparing query.");
    }
} else {
    die("Room ID not provided.");
}


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
                            <a class="nav-link" aria-current="page" href="dashboard.php" title="Dashboard">Dashboard</a>
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

    <!-- Edit room Form -->
    <div class="container-fluid bg-light p-4">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card p-2">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Edit Room</h3>
                        <form action="editroom.php?id=<?php echo $room_id; ?>" method="post" enctype="multipart/form-data">
                            <?php 
// Handle form submission
if (isset($_POST['update'])) {
    $room_name = $_POST['roomname'];
    $hotel_id = $_POST['hotel'];
    $qualities = $_POST['qualities'];
    $service1 = $_POST['service1'];
    $service2 = $_POST['service2'];
    $service3 = $_POST['service3'];
    $capacity = $_POST['capacity'];
    $beds = $_POST['beds'];
    $price = $_POST['price'];
    $rooms = $_POST['rooms'];

    // Initialize file name variables
    $file_name1 = $room['image1'];
    $file_name2 = $room['image2'];
    $file_name3 = $room['image3'];

    // Handle file uploads
    function handleFileUpload($inputName, $defaultFileName) {
        global $con, $errors, $file_name;
        
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
            $file_name = $_FILES[$inputName]['name'];
            $file_size = $_FILES[$inputName]['size'];
            $file_tmp = $_FILES[$inputName]['tmp_name'];
            $file_type = $_FILES[$inputName]['type'];
            $temp = explode('.', $file_name);
            $file_ext = strtolower(end($temp));
            $extensions = array("jpeg", "jpg", "png");

            if (in_array($file_ext, $extensions) === false) {
                $errors[] = "File extension is wrong for {$inputName}. Choose another file.";
            }
            if ($file_size > 5097152) {
                $errors[] = "File size must be 5MB or lower for {$inputName}.";
            }
            if (empty($errors) === true) {
                move_uploaded_file($file_tmp, "../images/" . $file_name);
                return $file_name;
            } else {
                print("Choose another picture for {$inputName}");
                die();
            }
        }
        return $defaultFileName;
    }

    $errors = array();
    $file_name1 = handleFileUpload('img1', $file_name1);
    $file_name2 = handleFileUpload('img2', $file_name2);
    $file_name3 = handleFileUpload('img3', $file_name3);

    // Prepare SQL query
    $sql = "UPDATE rooms SET room_name = ?, hotel_id = ?, qualities = ?, service1 = ?, service2 = ?, service3 = ?, capacity = ?, beds = ?, price = ?, rooms = ?, image1 = ?, image2 = ?, image3 = ? WHERE room_id = ?";

    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, 'sisssssisssssi', $room_name, $hotel_id, $qualities, $service1, $service2, $service3, $capacity, $beds, $price, $rooms, $file_name1, $file_name2, $file_name3, $room_id);
        if (mysqli_stmt_execute($stmt)) {
            ?>
            <div class="alert alert-success" role="alert">
                Room Updated successfully!
            </div>
            <?php   
        } else {
            echo "Error: Could not execute query.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: Could not prepare query.";
    }
}


?>
                            <div class="mb-3">
                                <label for="uname" class="form-label">Room Category Name</label>
                                <input type="text" class="form-control" id="uname" name="roomname" value="<?php echo htmlspecialchars($room['room_name']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Hotel</label>
                                <select class="form-control" id="hotel" name="hotel" required>
                                    <option value="1" <?php echo ($room['hotel_id'] == 1) ? 'selected' : ''; ?>>Marriot</option>
                                    <option value="2" <?php echo ($room['hotel_id'] == 2) ? 'selected' : ''; ?>>Hilton</option>
                                    <option value="3" <?php echo ($room['hotel_id'] == 3) ? 'selected' : ''; ?>>Hyatt</option>
                                    <option value="4" <?php echo ($room['hotel_id'] == 4) ? 'selected' : ''; ?>>Four Seasons</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Qualities</label>
                                <input type="text" class="form-control" id="lastName" name="qualities" value="<?php echo htmlspecialchars($room['qualities']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Add Services</label>
                                <div class="inline-inputs">
                                    <input type="text" class="form-control" id="email1" name="service1" value="<?php echo htmlspecialchars($room['service1']); ?>" required>
                                    <input type="text" class="form-control" id="email2" name="service2" value="<?php echo htmlspecialchars($room['service2']); ?>" required>
                                    <input type="text" class="form-control" id="email3" name="service3" value="<?php echo htmlspecialchars($room['service3']); ?>" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Capacity (Number of Adults/Children)</label>
                                <input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo htmlspecialchars($room['capacity']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Beds</label>
                                <input type="text" class="form-control" id="beds" name="beds" value="<?php echo htmlspecialchars($room['beds']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Price($)</label>
                                <input type="number" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($room['price']); ?>" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Number of Rooms</label>
                                <input type="number" class="form-control" id="rooms" name="rooms" value="<?php echo htmlspecialchars($room['rooms']); ?>" min="1" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Image 1</label>
                                <input type="file" class="form-control" id="image1" name="img1">
                                <?php if ($room['image1']): ?>
                                    <img src="../images/<?php echo htmlspecialchars($room['image1']); ?>" alt="Image 1" style="width:100px; height:auto;">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Image 2</label>
                                <input type="file" class="form-control" id="image2" name="img2">
                                <?php if ($room['image2']): ?>
                                    <img src="../images/<?php echo htmlspecialchars($room['image2']); ?>" alt="Image 2" style="width:100px; height:auto;">
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Image 3</label>
                                <input type="file" class="form-control" id="image3" name="img3">
                                <?php if ($room['image3']): ?>
                                    <img src="../images/<?php echo htmlspecialchars($room['image3']); ?>" alt="Image 3" style="width:100px; height:auto;">
                                <?php endif; ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn" name="update" style="background-color:#9a3d6e;color:white;border: 1px solid #9a3d6e">Update Room</button>
                                <a href="allrooms.php" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid footerbg mt-5">
        <footer class="py-3">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
                <li class="nav-item"><a href="dashboard.php" class="nav-link px-2 text-white text-decoration-underline">Dashboard</a></li>
                <li class="nav-item"><a href="bookings.php" class="nav-link px-2 text-muted text-white">Bookings</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Rooms
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="addrooms.php" title="Add Room">Add Rooms</a></li>
                      <li><a class="dropdown-item" href="allrooms.php" title="All Rooms">All Rooms</a></li>
                    </ul>
                </li>      
                <li class="nav-item"><a href="cms.php" class="nav-link px-2 text-muted text-white">CMS</a></li>
            </ul>
            <p class="text-center text-muted text-white">© 2024 BookForMe.com. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
