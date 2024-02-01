<?php

    session_start();
    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];
    $tripID = $_SESSION["tripID"];

    // $firstdate = $_SESSION["firstdate"];

    include "db_conn.php";

    $activity = "";
    $restaurant = "";
    $scenery = "";

    // if(isset($_POST['submit'])) {

    //     if(isset($_POST['activitiesType'])) {
    //         $activitiesType = $_POST['activitiesType'];
    //         $allData = implode(",",$activitiesType);
    //         $activity = $allData;

    //         $_SESSION['activity'] = $activity;
    //     }

    //     if(isset($_POST['restaurantType'])) {
    //         $restaurantType = $_POST['restaurantType'];
    //         $allData = implode(",",$restaurantType);
    //         $restaurant = $allData;
    
    //         $_SESSION['restaurant'] = $restaurant; 
    //     }

    //     if(isset($_POST['sceneryType'])) {
    //         $sceneryType = $_POST['sceneryType'];
    //         $allData = implode(",",$sceneryType);
    //         $scenery = $allData;

    //         $_SESSION['scenery'] = $scenery;
    //     }

    //     // $sql = "SELECT s.sceneryname,
    //     //             a.activitiesname,
    //     //             s.price,
    //     //             a.timeLength,
    //     //             r.restaurantname,
    //     //             r.restaurantType,
    //     //             r.pricerange,
    //     //             r.phone

    //     //         FROM scenery s
    //     //         JOIN activities a ON a.seneryID = s.sceneryID 
    //     //         LEFT JOIN restaurant r ON r.provinceID = s.provinceID AND r.restaurantType = '$restaurant'
    //     //         WHERE a.activitiesType = '$activity' 
    //     //         AND s.sceneryType = '$scenery'
    //     //         AND s.provinceID = '$provinceID' ";

    //     // $result = mysqli_query($conn, $sql);

    //     // if (!$result) {
    //     //     die('Error: ' . mysqli_error($conn));
    //     // }

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
    <link rel="stylesheet" href="css/plantrip2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <style>
        #card {90p            width: 350px;
            /* float: left; */
            margin-left: 80px;
            margin-bottom: 50px;
        }
        #card2 {
            width: 400px;
            margin-left: 80px;
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


    <div class="head-plan"><h1><?php echo $provincename ?></h1></div>

    <!-- <form method="post" action="plantrip3.php"> -->
    <!-- <form method="post" action="trip.php"> -->
    <!-- <form method="post"> -->
    <form method="get" action="select_activities.php">


        <div class=activities>

            <h2>กิจกรรมที่จะทำ</h2>

            <div id="carouselExampleIndicators" class="carousel slide">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                </div>

                <div class="carousel-inner">

                    <div class="carousel-item active">

                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
                            <div class="col">
                                <div id="card" style="margin-left: 80px">
                                    <label class="option_item">
                                        <input type="checkbox" name="activitiesType[]" value="ถ่ายรูป" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/landmark.jpg"width="320" height="200">
                                        <div class="name"><h1>ถ่ายรูป</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" name="activitiesType[]" value="สวนสัตว์" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/zoo.jpeg"width="320" height="200">
                                        <div class="name"><h1>ชมสัตว์โลก</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" name="activitiesType[]" value="วัด" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/temple.png"width="320" height="200">
                                        <div class="name"><h1>ไหว้พระ</h1></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                <div class="col">
                                    <div id="card">
                                        <label class="option_item">
                                            <input type="checkbox" name="activitiesType[]" value="ช้อปปิ้ง" class="checkbox">
                                            <div class="option_inner facebook">
                                            <img src="image/shopping2.jpg"width="320" height="200">
                                            <div class="name"><h1>ช้อปปิ้ง</h1></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div id="card">
                                        <label class="option_item">
                                            <input type="checkbox" name="activitiesType[]" value="ผจญภัย" class="checkbox">
                                            <div class="option_inner facebook">
                                            <img src="image/zipline.jpg"width="320" height="200">
                                            <div class="name"><h1>แอดเวนเจอร์</h1></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div id="card">
                                        <label class="option_item">
                                            <input type="checkbox" name="activitiesType[]" value="สวนน้ำ" class="checkbox">
                                            <div class="option_inner facebook">
                                            <img src="image/waterpark.jpg"width="320" height="200">
                                            <div class="name"><h1>สวนน้ำ</h1></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Next</span>
                </button>

            </div>   



        </div>

        
        <!-- กิจกรรม -->

        <div class=restaurant>

            <h2>อาหารที่ชอบทาน</h2>

            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-5">

                <div class="col">
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="ร้านดัง" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/popular.jpg"width="320" height="200">
                            <div class="name"><h1>ร้านดัง</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="สตรีทฟู้ด" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/streetfood.jpg"width="320" height="200">
                            <div class="name"><h1>สตรีทฟู้ด</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">   
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="อาหารไทย" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/thaifood.jpg"width="320" height="200">
                            <div class="name"><h1>อาหารไทย</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="อาหารพื้นเมือง" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/localfood.jpg"width="320" height="200">
                            <div class="name"><h1>อาหารพื้นเมือง</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="อาหารทะเล" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/seafood.jpg"width="320" height="200">
                            <div class="name"><h1>อาหารทะเล</h1></div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div id="card2">
                        <label class="option_item">
                            <input type="checkbox" value="อาหารตะวันตก" name="restaurantType[]" class="checkbox">
                            <div class="option_inner facebook">
                            <img src="image/westernfood.jpg"width="320" height="200">
                            <div class="name"><h1>อาหารตะวันตก</h1></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- อาหาร           -->

        <div class=location>

            <h2>สถานที่ที่สนใจ</h2>

            <div id="carouselExampleIndicators3" class="carousel slide">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">

                    <div class="carousel-item active">

                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-5">

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="คาเฟ่" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/cafe.jpg"width="320" height="200">
                                        <div class="name"><h1>คาเฟ่</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="พิพิธภัณฑ์" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/museum.jpg"width="320" height="200">
                                        <div class="name"><h1>พิพิธภัณฑ์</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="จุดถ่ายรูป" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/landmark2.jpg"width="320" height="200">
                                        <div class="name"><h1>จุดถ่ายรูป</h1></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="carousel-item">

                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-5">
                                
                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="ทะเล" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/beach2.jpg"width="320" height="200">
                                        <div class="name"><h1>ทะเล</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">   
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="อควาเรียม" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/aquarium.jpg"width="320" height="200">
                                        <div class="name"><h1>อควาเรียม</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="อุทยาน" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/park.jpg"width="320" height="200">
                                        <div class="name"><h1>อุทยาน</h1></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                    <div class="carousel-item">

                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-5">

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="วัด" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/temple2.jpg"width="320" height="200">
                                        <div class="name"><h1>วัด</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="สวนสัตว์" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/zoo2.jpg"width="320" height="200">
                                        <div class="name"><h1>สวนสัตว์</h1></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div id="card">
                                    <label class="option_item">
                                        <input type="checkbox" value="สวนน้ำ" name="sceneryType[]" class="checkbox">
                                        <div class="option_inner facebook">
                                        <img src="image/waterpark2.jpg"width="320" height="200">
                                        <div class="name"><h1>สวนน้ำ</h1></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="prev">
                    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators3" data-bs-slide="next">
                    <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                    <span class="visually-hidden">Next</span>
                </button>

            </div>   

            <!-- <div id="btn-next">
                    <a class="btn btn-primary" type="submit" name="submit" value="Submit" href="plantrip3.php" role="button"><h1>ต่อไป</h1></a>
            </div> -->

            <!-- <div id="btn-next">
                    <a class="btn btn-primary" type="submit" name="submit" value="Submit" role="button"><h1>ต่อไป</h1></a>
            </div> -->

        </div>
        <!-- สถานที่ -->
        <!-- <div id="btn-next">
            <a class="btn btn-primary" type="submit" name="submit" value="submit" role="button"><h1>ต่อไป</h1></a>
        </div> -->

        
        <!-- <input id="btn-next" type="submit" name="submit" value="ยืนยัน" class="btn btn-primary" style="background-color: #3629B1; margin-top: 30px; margin-left: 475px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 80px; height: 40px;"> -->
        <!-- <a id="btn-next" type="submit" name="submit" value="submit" class="btn btn-primary" href="select_activities.php" style="background-color: #3629B1; margin-top: 30px; margin-left: 425px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 80px; height: 40px;">ต่อไป</a> -->
        <input id="btn-next" type="submit" name="submit" value="ถัดไป" class="btn btn-primary" style="background-color: #3629B1; margin-top: 30px; margin-left: 725px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 80px; height: 40px;">


        <br>
        <div style="margin-top:20px"></div>

    </form>

    <?php
    
         // ดึงข้อมูลที่ถูกส่งมาผ่าน URL parameters
         $selectedActivities = isset($_GET['activities']) ? explode(',', $_GET['activities']) : [];
         $selectedRestaurant = isset($_GET['restaurant']) ? explode(',', $_GET['restaurant']) : [];
         $selectedScenery = isset($_GET['scenery']) ? explode(',', $_GET['scenery']) : [];
 
         $activitiesID = implode(',', $selectedActivities);  // แปลงอาร์เรย์ของค่าไอดีให้เป็นสตริงแบบต่อกันด้วยเครื่องหมาย ','
    
    ?>

    <?php
    
        $sql = "    SELECT  activities.activitiesname, 
                            activities.activitiesType,
                            activities.sub_type_activities,
                            activities.price_activities, 
                            activities.timeLength_activities, 
                            activities.phone_activities, 
                            scenery.provinceID, 
                            scenery.sceneryID, 
                            activities.activitiesID,

                            activities.activities_Latitude,
                            activities.activities_Longitude,

                            photoactivities.imagePath 

                    FROM activities 
                    JOIN scenery ON scenery.sceneryID = activities.activitiesID
                    JOIN photoactivities ON activities.activitiesID = photoactivities.activitiesID
 
                    WHERE (activities.activitiesType = '$activity' OR activities.sub_type_activities = '$activity') AND scenery.provinceID = '$provinceID' 
                    ORDER BY activities.activitiesname 
                " ;
            
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $activitiesID = "";

        $activitiesname = "";
        $price_activities = "";
        $timeLength_activities = "";
        $phone_activities = "";

        $activities_Latitude = "";
        $activivites_Longitude = "";
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $activitiesID = $row['activitiesID'];

                $activitiesname = $row['activitiesname'];
                $price_activities = $row['price_activities'];
                $timeLength_activities = $row['timeLength_activities'];
                $phone_activities = $row['phone_activities'];

                $_SESSION['activitiesID'] = $activitiesID;

                $_SESSION['activitiesname'] = $activitiesname;
                $_SESSION['price_activities'] = $price_activities;
                $_SESSION['timeLength_activities'] = $timeLength_activities;
                $_SESSION['phone_activities'] = $phone_activities;

                $_SESSION['activities_Latitude'] = $activities_Latitude;
                $_SESSION['activities_Longitude'] = $activivites_Longitude;
                
            }
        }

    ?> <!--กิจกรรม-->

    <?php
    
        $sql2 = "   SELECT restaurant.restaurantID,
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
                            restaurant.restaurant_Longitude

                    FROM restaurant  
                    WHERE (restaurant.restaurantType = '$restaurant' OR restaurant.sub_type_restaurant = '$restaurant') AND restaurant.provinceID = '$provinceID'
                    ORDER BY restaurant.restaurantname
                ";
        
        $result = mysqli_query($conn, $sql2);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $restaurantID = "";

        $restaurantname = "";
        // $restaurantType = "";
        $pricerange = "";
        $open_time = "";
        $close_time = "";
        $closed_day = "";
        $facebook = "";
        $phone_restaurant = "";

        $restaurant_Latitude = "";
        $restaurant_Longitude = "";
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $restaurantID = $row['restaurantID'];

                $restaurantname = $row['restaurantname'];
                // $restaurantType = $row['restauranttype'];
                $pricerange = $row['pricerange'];
                $open_time = $row['open_time'];
                $close_time = $row['close_time'];
                $closed_day = $row['closed_day'];
                $facebook = $row['facebook'];
                $phone_restaurant = $row['phone_restaurant'];

                $restaurant_Latitude = $row['restaurant_Latitude'];
                $restaurant_Longitude = $row['restaurant_Longitude'];


                $_SESSION['restaurantID'] = $restaurantID;

                $_SESSION['restaurantname'] = $restaurantname;
                // $_SESSION['restauranttype'] = $restaurantType;
                $_SESSION['pricerange'] = $pricerange;
                $_SESSION['open_time'] = $open_time;
                $_SESSION['close_time'] = $close_time;
                $_SESSION['closed_day'] = $closed_day;
                $_SESSION['facebook'] = $facebook;
                $_SESSION['phone_restaurant'] = $phone_restaurant;

                $_SESSION['restaurant_Latitude'] = $restaurant_Latitude;
                $_SESSION['restaurant_Longitude'] = $restaurant_Longitude;
                
            }
        }

    ?><!-- ร้านอาหาร -->

    <?php
    
        $sql3 = " SELECT   scenery.sceneryname, 
                            scenery.sceneryType,
                            scenery.sub_type_scenery, 
                            scenery.price_scenery, 
                            scenery.timeLength_scenery, 
                            scenery.phone_scenery, 
                            scenery.provinceID,
                        
                            scenery.sceneryID,

                            scenery.scenery_Latitude,
                            scenery.scenery_Longitude
                        
                    FROM scenery 
                    WHERE (scenery.sceneryType = '$scenery' OR scenery.sub_type_scenery = '$scenery') AND scenery.provinceID = '$provinceID'
                    ORDER BY scenery.sceneryname
                " ;
            
        $result = mysqli_query($conn, $sql3);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $sceneryID = "";

        $sceneryname = ""; 
        $price_scenery = "";
        $timeLength_scenery = "";
        $phone_scenery = "";

        $scenery_Latitude = "";
        $scenery_Longitude = "";
        
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $sceneryID = $row['sceneryID'];

                $sceneryname = $row['sceneryname'];
                $price_scenery = $row['price_scenery'];
                $timeLength_scenery = $row['timeLength_scenery'];
                $phone_scenery = $row['phone_scenery'];

                $scenery_Latitude = $row['scenery_Latitude'];
                $scenery_Longitude = $row['scenery_Longitude'];


                $_SESSION['sceneryID'] = $sceneryID;

                $_SESSION['sceneryname'] = $sceneryname;
                $_SESSION['price_scenery'] = $price_scenery;
                $_SESSION['timeLength_scenery'] = $timeLength_scenery;
                $_SESSION['phone_scenery'] = $phone_scenery;

                $_SESSION['scenery_Latitude'] = $scenery_Latitude;
                $_SESSION['scenery_Longitude'] = $scenery_Longitude;
                
            }
        }
    
    ?>

    <?php
    
        $sql4 = " SELECT imagePath FROM photoactivities WHERE activitiesID = '$activitiesID' ";
        $result = mysqli_query($conn, $sql4);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $imagePath = "";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $imagePath = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }// กิจกรรม
    
    ?>

    <?php
    
        $sql5 = " SELECT imagePath FROM photorestaurant WHERE restaurantID = '$restaurantID' ";
        $result2 = mysqli_query($conn, $sql5);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $imagePath2 = "";

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {

                $imagePath2 = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }
    
    ?>

    <?php
    
        $sql6 = " SELECT imagePath FROM photoscenery WHERE sceneryID = '$sceneryID' ";
        $result3 = mysqli_query($conn, $sql6);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $imagePath3 = "";

        if (mysqli_num_rows($result3) > 0) {
            while ($row = mysqli_fetch_assoc($result3)) {

                $imagePath3 = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }// ร้านอาหาร
    
    ?>

    
    <!-- ส่วนแสดงผล -->
    <!-- <div class="card mb-3" style="max-width: 840px;" id="cardtrip">
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

                <h5 class="card-title"><?php echo "<h3>สถานที่ท่องเที่ยว: $activitiesname" ?></h5>
                <p class="card-text"><?php echo "<h5>ราคา: $price" ?></p>
                <p class="card-text"><?php echo "<h5>ระยะเวลา: $timeLength" ?></p>
                <p class="card-text"><?php echo "<h5>ประเภทร้าน: $phone_activities " ?></p>
            
                <a href="#" class="btn btn-primary" style="background-color: #e6bc34; border: none;">บันทึกทริปนี้</a>
            </div>
        </div>
    </div> -->

    <script>
        var form = document.querySelector('form');  // เลือกฟอร์ม
        form.addEventListener('submit', function(event) {  // เพิ่มการฟังเหตุการณ์ submit ให้กับฟอร์ม
            event.preventDefault();  // ป้องกันการรีเฟรชหน้าเว็บ

            var activitiesTypes = document.getElementsByName('activitiesType[]');  // เลือก checkbox ทั้งหมดที่มีชื่อ 'activitiesType[]'
            var selectedActivities = [];  // สร้างตัวแปรเก็บไอดีของ checkbox ที่ถูกเลือก

            var restaurantTypes = document.getElementsByName('restaurantType[]');  // เลือก checkbox ทั้งหมดที่มีชื่อ 'activitiesType[]'
            var selectedRestaurant= [];  // สร้างตัวแปรเก็บไอดีของ checkbox ที่ถูกเลือก

            var sceneryTypes = document.getElementsByName('sceneryType[]');  // เลือก checkbox ทั้งหมดที่มีชื่อ 'activitiesType[]'
            var selectedScenery = [];  // สร้างตัวแปรเก็บไอดีของ checkbox ที่ถูกเลือก

            var url = form.getAttribute('action') + '?';
                if (selectedActivities.length > 0) {
                    url += 'activities=' + selectedActivities.join(',') + '&';
                }
                if (selectedRestaurant.length > 0) {
                    url += 'restaurant=' + selectedRestaurant.join(',') + '&';
                }
                if (selectedScenery.length > 0) {
                    url += 'scenery=' + selectedScenery.join(',') + '&';
                }

                window.location.href = url;

            // วนลูปเพื่อตรวจสอบ checkbox ที่ถูกเลือก
           // วนลูปเพื่อตรวจสอบ checkbox ที่ถูกเลือก
            for (var i = 0; i < activitiesTypes.length; i++) {
                if (activitiesTypes[i].checked) {
                    selectedActivities.push(activitiesTypes[i].value);  // เพิ่มไอดีของ checkbox ที่ถูกเลือกในอาร์เรย์
                }
            }

            for (var i = 0; i < restaurantTypes.length; i++) {
                if (restaurantTypes[i].checked) {
                    selectedRestaurant.push(restaurantTypes[i].value);  // เพิ่มไอดีของ checkbox ที่ถูกเลือกในอาร์เรย์
                }
            }

            for (var i = 0; i < sceneryTypes.length; i++) {
                if (sceneryTypes[i].checked) {
                    selectedScenery.push(sceneryTypes[i].value);  // เพิ่มไอดีของ checkbox ที่ถูกเลือกในอาร์เรย์
                }
            }

            console.log(selectedActivities);  // แสดงผลไอดีของ checkbox ที่ถูกเลือกในคอนโซล
            console.log(selectedRestaurant);  // แสดงผลไอดีของ checkbox ที่ถูกเลือกในคอนโซล
            console.log(selectedScenery);  // แสดงผลไอดีของ checkbox ที่ถูกเลือกในคอนโซล

            var url = form.getAttribute('action') + '?';
            if (selectedActivities.length > 0) {
                url += 'activities=' + selectedActivities.join(',') + '&';
            }
            if (selectedRestaurant.length > 0) {
                url += 'restaurant=' + selectedRestaurant.join(',') + '&';
            }
            if (selectedScenery.length > 0) {
                url += 'scenery=' + selectedScenery.join(',') + '&';
            }

            window.location.href = url;

            // เพื่อป้องกันการส่งฟอร์มต่อไป
            return false;

            
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>