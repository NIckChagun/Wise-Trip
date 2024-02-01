<?php

    session_start();

    $provincename = $_SESSION["provincename"];

    $sceneryname = $_SESSION['sceneryname'];
    $activitiesname = $_SESSION['activitiesname'];
    $price = $_SESSION['price'];
    $timeLength = $_SESSION['timeLength'];
    $restaurantname = $_SESSION['restaurantname'];
    $restaurantType = $_SESSION['restaurantType'];
    $pricerange = $_SESSION['pricerange'];
    $phone = $_SESSION['phone'];

    // $activitiesID = $_SESSION["activitiesID"];
    // $activitiesname = $_SESSION["activitiesname"];
    // $activitiesType = $_SESSION["activitiesType"];
    // $sceneryID = $_SESSION["sceneryID"];
    // $sceneryname = $_SESSION["sceneryname"];

    // $sceneryname = $_SESSION["sceneryname"];
    // $activitiesname = $_SESSION["activitiesname"];
    // $price = $_SESSION["price"];
    // $timeLength = $_SESSION["timeLength"];
    // $restaurantname = $_SESSION["restaurantname"];
    // $restaurantType = $_SESSION["restauranttype"];
    // $pricerange = $_SESSION["pricerange"];
    // $phone = $_SESSION["phone"];

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $sceneryname = $_POST['sceneryname'];
    //     $activitiesname = $_POST['activitiesname'];
    //     $price = $_POST['price'];
    //     $timeLength = $_POST['timeLength'];
    //     $restaurantname = $_POST['restaurantname'];
    //     $restaurantType = $_POST['restauranttype'];
    //     $pricerange = $_POST['pricerange'];
    //     $phone = $_POST['phone'];
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/plantrip3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid" id="navbar">
            <div class="logo"><img src="image/logo.png" alt=""></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_home" href="home2.php" role="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_register" href="plantrip.php" role="button">สร้างทริป</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_login" href="logout.php" role="button"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="card mb-3" style="max-width: 840px;" id="cardtrip">
        <div class="row g-0">
            <div class="col-md-4">
            <img src="image/aquarium2.jpg" class="img-fluid rounded-start" alt="...">
            <img src="image/กินกับก้อย.jpg" class="img-fluid rounded-start" alt="...">
        </div>
            <div class="col-md-8">
            <div class="card-body" id="cardtrip-body">
                <h5 class="card-title"><?php echo "<h3>สถานที่ท่องเที่ยว: $sceneryname" ?></h5>
                <p class="card-text"><?php echo "<h5>กิจกรรม: $activitiesname" ?></p>
                <p class="card-text"><?php echo "<h5>ราคา: $price" ?></p>
                <p class="card-text"><?php echo "<h5>ระยะเวลา: $timeLength" ?></p>
                <p class="card-text"><?php echo "<h5>ร้านอาหาร:  $restaurantname " ?></p>
                <p class="card-text"><?php echo "<h5>ประเภทร้าน: $restaurantType" ?></p>
                <p class="card-text"><?php echo "<h5>ช่วงราคาร้าน: $pricerange" ?></p>
                <p class="card-text"><?php echo "<h5>เบอร์ติดต่อ: $phone" ?></p>
                <p class="card-text"><?php echo "<h5>จังหวัดที่ไป: $provincename" ?></p>
            
                <a href="#" class="btn btn-primary" style="background-color: #e6bc34; border: none;">บันทึกทริปนี้</a>
            </div>
        </div>
    </div>
</body>
</html>