<?php

    session_start();

    include "db_conn.php";

    $userID = $_SESSION['userID'];
    $tripID = $_SESSION['tripID'];

    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];

    $activitiesType = $_SESSION["activitiesType"];
    $restaurantType = $_SESSION["restaurantType"];
    $sceneryType = $_SESSION["sceneryType"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/trip.css">
    <link rel="stylesheet" href="css/trip2.css">
    <!-- <link rel="stylesheet" href="css/plantrip2.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue:regular" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Kanit:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <style>
        .wrapper {
            width: auto;
            height: auto;
        }

        header {
            width: 100%;
            height: 80px;
            /* background-color: rgb(96, 98, 98); */
        }



        .logo {
            float: left;
            margin-right: 55%;
            margin-top: 10px;
            margin-left: 50px;
        }

        .logo img {
            width: 150px;
            height: 80px;
            position: relative;
        }

        #btn_home, 
        #btn_register, 
        #btn_login {
            float: left;
            margin-right: 45px;
            margin-top: 35px;
            border-radius: 32px;
            background-color: #3629B1;
            border-color: #3629B1;
        }

        #btn_home {
            font-family: 'Poppins', 'Helvetica', 'Arial';
        }

        #btn_register,
        #btn_login {
            font-family: 'Kanit', 'Helvetica', 'Arial';
        }

        #btn_home:hover,
        #btn_register:hover,
        #btn_login:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #3629B1;
            border-color: #3629B1;
            border-width: 1.7px;
        }

        #lifestyle h1 {
            font-family: 'Kanit', 'Helvetica', 'Arial';
        }

        #lifestyle #head-style {
            margin-left: 60px;
            margin-bottom: 20px;
        }
    </style>
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
                        <a class="btn btn-primary" id="btn_home" href="base.php" role="button">Home</a>
                    </li>
                    <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" id="btn_register" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        จัดการทริป
                    </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="select_province.php">สร้างทริป</a></li>
                            <li><a class="dropdown-item" href="mytrip.php">ทริปของคุณ</a></li>
                        </ul>
                    </div>   
                    <li class="nav-item">
                        <a class="btn btn-primary" id="btn_login" href="logout.php" role="button"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
        // ดึงข้อมูลที่ถูกส่งมาผ่าน URL parameters
        $selectedRestaurant = isset($_GET['restaurant']) ? explode(',', $_GET['restaurant']) : [];
        

        $restaurantID = implode(',', $selectedRestaurant);  // แปลงอาร์เรย์ของค่าไอดีให้เป็นสตริงแบบต่อกันด้วยเครื่องหมาย ','

        // echo "$restaurantID" ;
       
    ?>
    
    <?php

        

            if (isset($_GET['restaurant'])) {
                // ดึงข้อมูลที่ถูกส่งมาผ่าน URL parameters
                $selectedRestaurant = explode(',', $_GET['restaurant']);

                try {
                    // ตรวจสอบการเชื่อมต่อ
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล ทีละค่า
                    $sql = "INSERT INTO restauranttrip (tripID, restaurantID, status) VALUES ";
                    foreach ($selectedRestaurant as $restaurantID) {
                        $sql .= "('$tripID', '$restaurantID', '9'),";
                    }

                    // ตัดเครื่องหมาย ',' ที่สุดออกเพื่อไม่ให้เกิดข้อผิดพลาดในการ execute คำสั่ง SQL
                    $sql = rtrim($sql, ",");

                    // ทำการ execute คำสั่ง SQL
                    if ($conn->query($sql) === TRUE) {
                        // echo "บันทึกข้อมูลร้านอาหารสำเร็จ";
                    } else {
                        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
                    }
                } catch (Exception $e) {
                    echo "เกิดข้อผิดพลาดในการดำเนินการ: " . $e->getMessage();
                }
            }

        
    
    ?>

    <?php

        // if (isset($_GET['submit'])) {

        //     if (isset($_GET['restaurant'])) {
        //         // ดึงข้อมูลที่ถูกส่งมาผ่าน URL parameters
        //         $selectedRestaurant = explode(',', $_GET['restaurant']);

        //         try {
        //             // ตรวจสอบการเชื่อมต่อ
        //             if ($conn->connect_error) {
        //                 die("Connection failed: " . $conn->connect_error);
        //             }

        //             // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล ทีละค่า
        //             $sql = "INSERT INTO restauranttrip (tripID, restaurantID, status) VALUES ";
        //             foreach ($selectedRestaurant as $restaurantID) {
        //                 $sql .= "('$tripID', '$restaurantID', '9'),";
        //             }

        //             // ตัดเครื่องหมาย ',' ที่สุดออกเพื่อไม่ให้เกิดข้อผิดพลาดในการ execute คำสั่ง SQL
        //             $sql = rtrim($sql, ",");

        //             // ทำการ execute คำสั่ง SQL
        //             if ($conn->query($sql) === TRUE) {
        //                 // echo "บันทึกข้อมูลร้านอาหารสำเร็จ";
        //             } else {
        //                 echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        //             }
        //         } catch (Exception $e) {
        //             echo "เกิดข้อผิดพลาดในการดำเนินการ: " . $e->getMessage();
        //         }
        //     }

        // }

    ?>

    <?php
    
        $sql =  "   SELECT  activities.activitiesID,
                            activities.activitiesname, 
                            activities.activitiesType, 
                            activities.sub_type_activities,
                            activities.price_activities, 
                            activities.timeLength_activities, 
                            activities.phone_activities,
                            
                            activities.activities_Latitude, 
                            activities.activities_Longitude,
                            activities.activitiesDistance,
                            
                            photoactivities.imagePath
                            
                    FROM activitiestrip 

                    JOIN activities ON activities.activitiesID = activitiestrip.activitiesID
                    JOIN photoactivities ON activities.activitiesID = photoactivities.activitiesID

                    WHERE activitiestrip.tripID = '$tripID' AND activitiestrip.activitiesID = activities.activitiesID AND activitiestrip.activitiesID = photoactivities.activitiesID
                    ORDER BY activities.activitiesDistance
                ";
    
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $activitiesData = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $activitiesData[] = array(
                    'activitiesname' => $row['activitiesname'],
                    'activitiesType' => $row['activitiesType'],
                    'sub_type_activities' => $row['sub_type_activities'],
                    'price_activities' => $row['price_activities'],
                    'timeLength_activities' => $row['timeLength_activities'],
                    'phone_activities' => $row['phone_activities'],

                    'activitiesID' => $row['activitiesID'],
                    'activities_Latitude' => $row['activities_Latitude'],
                    'activities_Longitude' => $row['activities_Longitude'],
                    'imagePath' => $row['imagePath'],

                    'activitiesDistance' => $row['activitiesDistance']
                );
            }
        }

    ?>

    <?php
    
        $sql =  "   SELECT  restaurant.restaurantID,
                            restaurant.restaurantname, 
                            restaurant.restaurantType, 
                            restaurant.sub_type_restaurant,
                            restaurant.pricerange, 
                            restaurant.open_time, 
                            restaurant.close_time, 
                            restaurant.closed_day,
                            restaurant.facebook,
                            restaurant.phone_restaurant	,
                            
                            restaurant.provinceID,

                            restaurant.restaurant_Latitude, 
                            restaurant.restaurant_Longitude, 

                            photorestaurant.imagePath, 

                            restaurant.restaurantDistance
                                    
                    FROM restauranttrip 
                    JOIN restaurant ON restaurant.restaurantID = restauranttrip.restaurantID 
                    JOIN photorestaurant ON restaurant.restaurantID = photorestaurant.restaurantID 

                    WHERE restauranttrip.tripID = '$tripID' AND restauranttrip.restaurantID = restaurant.restaurantID AND restauranttrip.restaurantID = photorestaurant.restaurantID
                    ORDER BY restaurant.restaurantDistance; 
                ";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
            }

        $restaurantData = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $restaurantData[] = array(
                    'restaurantname' => $row['restaurantname'],
                    'restaurantType' => $row['restaurantType'],
                    'sub_type_restaurant' => $row['sub_type_restaurant'],

                    'pricerange' => $row['pricerange'],
                    'open_time' => $row['open_time'],
                    'close_time' => $row['close_time'],
                    'closed_day' => $row['closed_day'],
                    'facebook' => $row['facebook'],
                    'phone_restaurant' => $row['phone_restaurant'],

                    'restaurantID' => $row['restaurantID'],
                    'restaurant_Latitude' => $row['restaurant_Latitude'],
                    'restaurant_Longitude' => $row['restaurant_Longitude'],
                    'imagePath' => $row['imagePath'],

                    'restaurantDistance' => $row['restaurantDistance']
                );
            }
        }
    
    ?>

    <?php
    
        $sql =  "  SELECT   trip.tripID,
                            province.provincename,
                            trip.firstdate,
                            trip.budget,
                            activities.activitiesID,
                            activities.activitiesType,
                            activities.sub_type_activities,
                            activities.activitiesname,
                            activities.price_activities,
                            activities.timeLength_activities,
                            activities.phone_activities,
                            
                            restaurant.restaurantID,
                            restaurant.restaurantType,
                            restaurant.sub_type_restaurant,
                            restaurant.restaurantname,
                            restaurant.pricerange,
                            restaurant.open_time,
                            restaurant.close_time,
                            restaurant.closed_day,
                            restaurant.facebook,
                            restaurant.phone_restaurant,
                            
                            photoactivities.imagePath,
                            photorestaurant.imagePath,
                            
                            activities.activitiesDistance,
                            restaurant.restaurantDistance
                    
                    FROM trip
                    
                    JOIN users ON users.userID = trip.userID
                    JOIN activitiestrip ON activitiestrip.tripID = trip.tripID
                    JOIN restauranttrip ON restauranttrip.tripID = trip.tripID
                    
                    JOIN scenery ON scenery.sceneryID = activitiestrip.activitiesID
                    JOIN province ON province.provinceID = scenery.provinceID
                    JOIN activities ON activitiestrip.activitiesID = activities.activitiesID
                    JOIN restaurant ON restauranttrip.restaurantID = restaurant.restaurantID
                    
                    JOIN photoactivities ON photoactivities.activitiesID = activitiestrip.activitiesID
                    JOIN photorestaurant ON photorestaurant.restaurantID = restauranttrip.restaurantID
                    
                    WHERE trip.tripID = '$tripID' AND users.userID = '$userID'
                    ORDER BY activities.activitiesDistance, restaurant.restaurantDistance;
     
                ";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
            }

            $tripData = array();
            $budget = "";
            $firstdate = "";

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $tripData[] = array(
                        'tripID' => $row['tripID'],
                        'firstdate' => $row['firstdate'],
                        'budget' => $row['budget'],
                        'provincename' => $row['provincename'],

                        $budget = $row['budget'],
                        $firstdate = $row['firstdate'],
                        
                        $activitiesType = $row['activitiesType'],
                        $sub_type_activities = $row['sub_type_activities'],

                        $restaurantType = $row['restaurantType'],
                        $sub_type_restaurant = $row['sub_type_restaurant'],


                        'activitiesname' => $row['activitiesname'],
                        'activitiesType' => $row['activitiesType'],
                        'sub_type_activities' => $row['sub_type_activities'],
                        'price_activities' => $row['price_activities'],
                        'timeLength_activities' => $row['timeLength_activities'],
                        'phone_activities' => $row['phone_activities'],
                        'activitiesID' => $row['activitiesID'],
                        'imagePath' => $row['imagePath'],
                        'activitiesDistance' => $row['activitiesDistance'],

                        'restaurantname' => $row['restaurantname'],
                        'restaurantType' => $row['restaurantType'],
                        'sub_type_restaurant' => $row['sub_type_restaurant'],
                        'pricerange' => $row['pricerange'],
                        'open_time' => $row['open_time'],
                        'close_time' => $row['close_time'],
                        'closed_day' => $row['closed_day'],
                        'facebook' => $row['facebook'],
                        'phone_restaurant' => $row['phone_restaurant'],
                        'restaurantID' => $row['restaurantID'],
                        'imagePath' => $row['imagePath'],
                        'restaurantDistance' => $row['restaurantDistance']
                    );
                }
            }
    
    ?>

<form method="get" action="mytrip.php">

        <div class="planner" style="height: 100%;">
                    <div class="plan">
                        <h1>แผนการท่องเที่ยว</h1> 
                    </div>

                    <div style="float: left; font-family: 'Kanit', sans-serif; background-color: #fff; width: 1120px; margin-left:240px; border-radius: 4px;">
                        <div style="float: left; margin-left: 10px;">
                            <h3><?php echo "จังหวัด " . $provincename ?></h3>
                            <h3><i class="fa-solid fa-money-bill" style="color: #27bb27;"></i><?php echo " : " . number_format($budget) . " บาท"?></h3>
                            <h3><i class="fa-regular fa-calendar-days" style="color: #21a0c3;"></i>  
                                <?php
                                    $dateString = $firstdate;
                                    $timestamp = strtotime($dateString);
                                    $formattedDate = date("d F Y", $timestamp);
                                    $formattedDateBuddhist = date("d F", $timestamp) . ' ' . (date("Y", $timestamp) + 543);
                                    echo " : " . $formattedDateBuddhist;
                                ?>
                            </h3>
                        </div>
                        <div style="float: right; margin-right: 500px; margin-top: 42px;">
                            <?php
                                $sub_type_activities = "ช้อปปิ้ง"; // Default value for $sub_type_activities

                                if ($activitiesType === $sub_type_activities) {
                                    // Set $sub_type_activities to "ช้อปปิ้ง" if it's equal to $activitiesType
                                    $sub_type_activities = "ช้อปปิ้ง";
                                }
                            ?>
                            <h3><i class="fa-solid fa-location-dot" style="color: #fe1a1a;"></i><?php echo " : " . $activitiesType . " , " . $sub_type_activities ?></h3>
                            <h3><i class="fa-solid fa-utensils" style="color: #e6bc34;"></i><?php echo " : " . $restaurantType . " , " . $sub_type_restaurant ?></h3>
                        </div>

                    </div>

                    <div style="background-color: #e6bc34; color: #fff; width: 1120px; margin-left:240px; margin-top: 140px; border-radius: 4px;">
                        <h5 align="center" style="font-family: 'Kanit', sans-serif; font-size: 24px; margin-left: -55px;"> ช่วงเช้า </h5>
                    </div>

                    <!-- <?php
                        
                        foreach ($activitiesData as $data) { ?>
                        <div style="background-color: #fff; width: 1120px; margin-left:240px; border-radius: 4px;">
                            <h5 align="center" style="font-family: 'Kanit', sans-serif; font-size: 24px; margin-left: -55px;"> ช่วงบ่าย </h5>
                        </div>
                            <div class="row mb-3">
                                <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                                    <div class="r1">
                                        <label class="option_item">
                                            <input type="checkbox" name="activitiesType[]" value="<?php echo $data['activitiesID']; ?>" class="checkbox">
                                            <div class="option_inner facebook" style="margin-left: -13px">
                                                <img src="<?php echo $data['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                                <h5 class="card-title"><?php echo "ชื่อ : " . $data['activitiesname']?><?php echo " ไอดี : " . $data['activitiesID'] ?></h5>
                                                <br><br><br>
                                                <h4>
                                                <?php
                                                    $price = $data['price_activities'];

                                                    if ($price === "ฟรี") {
                                                        echo "ราคา : ฟรี";
                                                    } else {
                                                        echo "ราคา : " . number_format($price, 2) . " บาท";
                                                    }
                                                ?>
                                                </h4>
                                                <br><br>
                                                <h4><?php echo "ระยะเวลาที่ใช้ : " . $data['timeLength_activities']; ?></h4>
                                                <br><br>
                                                <h4><?php echo "เบอร์ติดต่อ : " . $data['phone_activities']; ?></h4>
                                                <br><br>
                                                
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                    <?php } ?> -->

                    <?php
                        $lastIndex = count($activitiesData) - 1; // หาช่องท้ายสุดของอาร์เรย์ $activitiesData
                        foreach ($activitiesData as $index => $data) {
                            $isLastItem = $index === $lastIndex; // เช็คว่าเป็นชุดสุดท้ายหรือไม่
                            ?>

                            <?php
                            // ถ้าเป็นชุดสุดท้ายให้ปิด div ที่แสดงข้อมูลออกมา
                            if (!$isLastItem) {
                                ?>
                                <div class="row mb-3">
                                    <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                                        <div class="r1">
                                            <label class="option_item">
                                                <input type="checkbox" name="activitiesType[]" value="<?php echo $data['activitiesID']; ?>" class="checkbox">
                                                <div class="option_inner facebook" style="margin-left: -13px">
                                                    <img src="<?php echo $data['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                                    <h5 class="card-title">
                                                        <?php echo "ชื่อ : " . $data['activitiesname'] ?>
                                                        <?php echo " ไอดี : " . $data['activitiesID'] ?>
                                                    </h5>
                                                    <br><br><br>
                                                    <h4>
                                                        <?php
                                                        $price = $data['price_activities'];
                                                        if ($price === "ฟรี") {
                                                            echo "ราคา : ฟรี";
                                                        } else {
                                                            echo "ราคา : " . number_format($price, 2) . " บาท";
                                                        }
                                                        ?>
                                                    </h4>
                                                    <br><br>
                                                    <h4><?php echo "ระยะเวลาที่ใช้ : " . $data['timeLength_activities']; ?></h4>
                                                    <br><br>
                                                    <h4><?php echo "เบอร์ติดต่อ : " . $data['phone_activities']; ?></h4>
                                                    <br><br>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            
                            <?php
                            // ถ้าเป็นชุดสุดท้ายให้ปิด div ที่แสดงข้อมูลออกมา
                            if ($isLastItem) {
                                ?>
                                    <div style="background-color: #e6bc34; color: #fff; width: 1120px; margin-left:240px; margin-top:-15px; border-radius: 4px;">
                                        <h5 align="center" style="font-family: 'Kanit', sans-serif; font-size: 24px; margin-left: -55px;">
                                            ช่วงบ่าย
                                        </h5>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                                            <div class="r1">
                                                <label class="option_item">
                                                    <input type="checkbox" name="activitiesType[]" value="<?php echo $data['activitiesID']; ?>" class="checkbox">
                                                    <div class="option_inner facebook" style="margin-left: -13px">
                                                        <img src="<?php echo $data['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                                        <h5 class="card-title">
                                                            <?php echo "ชื่อ : " . $data['activitiesname'] ?>
                                                            <?php echo " ไอดี : " . $data['activitiesID'] ?>
                                                        </h5>
                                                        <br><br><br>
                                                        <h4>
                                                            <?php
                                                            $price = $data['price_activities'];
                                                            if ($price === "ฟรี") {
                                                                echo "ราคา : ฟรี";
                                                            } else {
                                                                echo "ราคา : " . number_format($price, 2) . " บาท";
                                                            }
                                                            ?>
                                                        </h4>
                                                        <br><br>
                                                        <h4><?php echo "ระยะเวลาที่ใช้ : " . $data['timeLength_activities']; ?></h4>
                                                        <br><br>
                                                        <h4><?php echo "เบอร์ติดต่อ : " . $data['phone_activities']; ?></h4>
                                                        <br><br>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        }
                    ?>

                    <?php foreach ($restaurantData as $restaurantShow) { ?>
                        
                        <div class="row mb-3">
                            
                            <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                                <div class="r1">

                                <label class="option_item">
                                        <input type="checkbox" name="restaurantType[]" value=" <?php echo $restaurantShow['restaurantID']; ?> " class="checkbox">
                                        <div class="option_inner facebook" style="margin-left: -13px">

                                        <img src="<?php echo $restaurantShow['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                        <h5 class="card-title"><?php echo " ชื่อ : " . $restaurantShow['restaurantname']; ?><?php echo " ไอดี : " . $restaurantShow['restaurantID'] ?></h5>
                                        <br><br><br>
                                        <h4 style="margin-top:-26px"><?php echo " ช่วงราคา : " . $restaurantShow['pricerange'] . " บาท" ?></h4>
                                        <br><br>
                                        <h4 style="margin-top:-16px"><?php echo " เวลาเปิดร้าน <br> " ?></h4>
                                        <h4 style="margin-top:-16px"><?php echo " วันปิด : " . $restaurantShow['closed_day']; ?></h4>
                                        <br><br>
                                        <h4 style="margin-top:-34px">
                                            <?php echo date("H:i", strtotime($restaurantShow['open_time'])) . " น. - " . date("H:i", strtotime($restaurantShow['close_time'])) . " น."; ?>
                                        </h4> 
                                        <br>
                                        <h4 style="margin-top:-8px">
                                            <a style="text-decoration: none;" href="https://www.facebook.com/<?php echo $restaurantShow['facebook']; ?>">
                                                <?php echo "Facebook: " . $restaurantShow['restaurantname']; ?>
                                            </a>
                                        </h4>
                                        <br><br>
                                        <h4 style="margin-top:-28px"><?php echo " เบอร์ติดต่อ : " . $restaurantShow['phone_restaurant'] ?>

                                        </h4>
                                        <br><br>
                                
                                </div>
                                <div class="col-md-8 themed-grid-col">
                                    <div class="pb-3"></div>
                                    <div class="row">
                                        <div class="col-md-6 themed-grid-col"></div>
                                        <div class="col-md-6 themed-grid-col"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 themed-grid-col"></div>
                            </div>
                        </div>
                    <?php } ?>
                    
        </div>

    <input id="btn-next" type="submit" name="submit" value="บันทึก" class="btn btn-primary" style="background-color: #e6bc34; margin-top: 20px; margin-bottom: 20px; margin-left: 740px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 80px; height: 40px;">

</form>

    <!-- <div class="planner" style="height: 100%;">
            <div class="plan">
                <h1>เลือกกิจกรรม <?php echo $activitiesType ?></h1> 
            </div>
            
            <?php
                // รวมข้อมูลจาก $activitiesData และ $activitiesDataDistance
                // $mergedData = array_merge($activitiesData, $activitiesDataDistance);
                

                foreach ($activitiesData as $data) { ?>
                    <div class="row mb-3">
                        <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                            <div class="r1">
                                <label class="option_item">
                                    <input type="checkbox" name="activitiesType[]" value="<?php echo $data['activitiesID']; ?>" class="checkbox">
                                    <div class="option_inner facebook" style="margin-left: -13px">
                                        <img src="<?php echo $data['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                        <h5 class="card-title"><?php echo "ชื่อ : " . $data['activitiesname']?><?php echo " ไอดี : " . $data['activitiesID'] ?></h5>
                                        <br><br><br>
                                        <h4><?php echo "ราคา : " . $data['price_activities'] . " บาท"; ?></h4>
                                        <br><br>
                                        <h4><?php echo "ระยะเวลาที่ใช้ : " . $data['timeLength_activities']; ?></h4>
                                        <br><br>
                                        <h4><?php echo "เบอร์ติดต่อ : " . $data['phone_activities']; ?></h4>
                                        <br><br>
                                        <br><br>
                                        <?php if (isset($data['activitiesDistance'])) { ?>
                                            <h4><?php echo "ระยะทาง : " . $roundedDistance = round($data['activitiesDistance'], 1) . " กิโลเมตร"; ?></h4>
                                        <?php } ?>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
            <?php } ?>
    </div> -->

        <!-- <div class="planner" style="height: 100%;">
            <div class="plan">
                <h1>เลือกร้านอาหาร <?php echo $restaurantType ?> เลือกได้มากสุด 1 ที่ </h1> 
            </div>

            <?php foreach ($restaurantData as $restaurantShow) { ?>
                
                <div class="row mb-3">
                    
                    <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                        <div class="r1">

                        <label class="option_item">
                                <input type="checkbox" name="restaurantType[]" value=" <?php echo $restaurantShow['restaurantID']; ?> " class="checkbox">
                                <div class="option_inner facebook" style="margin-left: -13px">

                                <img src="<?php echo $restaurantShow['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                <h5 class="card-title"><?php echo " ชื่อ : " . $restaurantShow['restaurantname']; ?><?php echo " ไอดี : " . $restaurantShow['restaurantID'] ?></h5>
                                <br><br><br>
                                <h4 style="margin-top:-26px"><?php echo " ช่วงราคา : " . $restaurantShow['pricerange'] . " บาท" ?></h4>
                                <br><br>
                                <h4 style="margin-top:-16px"><?php echo " เวลาเปิดร้าน <br> " ?></h4>
                                <h4 style="margin-top:-16px"><?php echo " วันปิด : " . $restaurantShow['closed_day']; ?></h4>
                                <br><br>
                                <h4 style="margin-top:-34px">
                                    <?php echo date("H:i", strtotime($restaurantShow['open_time'])) . " น. - " . date("H:i", strtotime($restaurantShow['close_time'])) . " น."; ?>
                                </h4> 
                                <br>
                                <h4 style="margin-top:-8px">
                                    <a style="text-decoration: none;" href="https://www.facebook.com/<?php echo $restaurantShow['facebook']; ?>">
                                        <?php echo "Facebook: " . $restaurantShow['restaurantname']; ?>
                                    </a>
                                </h4>
                                <br><br>
                                <h4 style="margin-top:-28px"><?php echo " เบอร์ติดต่อ : " . $restaurantShow['phone_restaurant'] ?>

                                </h4>
                                <br><br>
                                <?php if (isset($restaurantShow['restaurantDistance'])) { ?>
                                    <h4 style="margin-top:-32px"><?php echo "ระยะทาง : " . $roundedDistance = round($restaurantShow['restaurantDistance'], 1) . " กิโลเมตร"; ?></h4>
                                <?php } ?>
                           
                        </div>
                        <div class="col-md-8 themed-grid-col">
                            <div class="pb-3"></div>
                            <div class="row">
                                <div class="col-md-6 themed-grid-col"></div>
                                <div class="col-md-6 themed-grid-col"></div>
                            </div>
                        </div>
                        <div class="col-md-4 themed-grid-col"></div>
                    </div>
                </div>
            <?php } ?>
        </div> -->
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>
</html>