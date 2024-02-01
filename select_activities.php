<?php

    session_start();

    include "db_conn.php";

    $userID = $_SESSION['userID'];

    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];

    $tripID = $_SESSION["tripID"]; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
         $selectedActivities = isset($_GET['activities']) ? explode(',', $_GET['activities']) : [];
         $selectedRestaurant = isset($_GET['restaurant']) ? explode(',', $_GET['restaurant']) : [];
         $selectedScenery = isset($_GET['scenery']) ? explode(',', $_GET['scenery']) : [];
 
         $activitiesType = implode(',', $selectedActivities);  // แปลงอาร์เรย์ของค่าไอดีให้เป็นสตริงแบบต่อกันด้วยเครื่องหมาย ','
         $restaurantType = implode(',', $selectedRestaurant);  // ทำเช่นเดียวกับอาร์เรย์ของค่าไอดีร้านอาหาร
         $sceneryType = implode(',', $selectedScenery);  // ทำเช่นเดียวกับอาร์เรย์ของค่าไอดีสถานที่ท่องเที่ยว

        // echo "$userID" . "<br>";
        // echo "$activitiesType" . "<br>";
        // echo "$restaurantType" . "<br>";
        // echo "$sceneryType" . "<br>";

        $_SESSION['activitiesType'] = $activitiesType;  // บันทึกค่าใน session
        $_SESSION['restaurantType'] = $restaurantType;  // บันทึกค่าใน session
        $_SESSION['sceneryType'] = $sceneryType;  // บันทึกค่าใน session
            
    ?>

    <?php
    
        $sql =  "   SELECT activities.activitiesname, 
                            activities.activitiesType, 
                            activities.sub_type_activities,

                            activities.price_activities, 
                            activities.timeLength_activities, 
                            activities.phone_activities, 

                            scenery.provinceID, 
                            activities.activitiesID, 

                            activities.activities_Latitude, 
                            activities.activities_Longitude, 

                            photoactivities.imagePath 
                                        
                    FROM activities 
                    JOIN scenery ON scenery.sceneryID = activities.activitiesID 
                    JOIN photoactivities ON activities.activitiesID = photoactivities.activitiesID

                    WHERE (activities.activitiesType = '$activitiesType' OR activities.sub_type_activities = '$activitiesType') AND scenery.provinceID = '$provinceID' 
                    ORDER BY activities.activitiesname 
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
                    'imagePath' => $row['imagePath']
                );
            }
        }
    
    ?>

    <?php
    
        // $sql2 = "   SELECT  restaurant.restaurantID,
        //                     restaurant.restaurantname, 
        //                     restaurant.restaurantType, 
        //                     restaurant.sub_type_restaurant,
        //                     restaurant.pricerange, 
        //                     restaurant.open_time, 
        //                     restaurant.close_time, 
        //                     restaurant.closed_day,
        //                     restaurant.facebook,
        //                     restaurant.phone_restaurant	,
                            
        //                     restaurant.provinceID,

        //                     restaurant.restaurant_Latitude, 
        //                     restaurant.restaurant_Longitude, 

        //                     photorestaurant.imagePath 
                                        
        //             FROM restaurant 
        //             JOIN photorestaurant ON restaurant.restaurantID = photorestaurant.restaurantID 

        //             WHERE (restaurant.restaurantType = '$restaurant' OR restaurant.sub_type_restaurant = '$restaurant') AND restaurant.provinceID = '$provinceID' 
        //             ORDER BY restaurant.restaurantname
        
        //         ";

        // $result = mysqli_query($conn, $sql2);

        // if (!$result) {
        //     die('Error: ' . mysqli_error($conn));
        // }

        // $restaurantData = array();

        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $restaurantData[] = array(
        //             'restaurantname' => $row['restaurantname'],
        //             'restaurantType' => $row['restaurantType'],
        //             'sub_type_restaurant' => $row['sub_type_restaurant'],

        //             'pricerange' => $row['pricerange'],
        //             'open_time' => $row['open_time'],
        //             'close_time' => $row['close_time'],
        //             'closed_day' => $row['closed_day'],
        //             'facebook' => $row['facebook'],
        //             'phone_restaurant' => $row['phone_restaurant'],

        //             'restaurantID' => $row['restaurantID'],
        //             'restaurant_Latitude' => $row['restaurant_Latitude'],
        //             'restaurant_Longitude' => $row['restaurant_Longitude'],
        //             'imagePath' => $row['imagePath']
        //         );

                
        //     }
        // }
    
    ?>

    <?php
    
        // $sql3 =  "   SELECT scenery.sceneryname, 
        //                     scenery.sceneryType, 
        //                     scenery.sub_type_scenery,

        //                     scenery.price_scenery, 
        //                     scenery.timeLength_scenery, 
        //                     scenery.phone_scenery, 

        //                     scenery.provinceID, 
        //                     scenery.sceneryID, 

        //                     scenery.scenery_Latitude, 
        //                     scenery.scenery_Longitude, 

        //                     photoscenery.imagePath 
                                        
        //             FROM scenery 
        //             JOIN photoscenery ON scenery.sceneryID = photoscenery.sceneryID 

        //             WHERE (scenery.sceneryType = '$scenery' OR scenery.sub_type_scenery = '$scenery') AND scenery.provinceID = '$provinceID' 
        //             ORDER BY scenery.sceneryname
        //         ";

        // $result = mysqli_query($conn, $sql3);

        // if (!$result) {
        //     die('Error: ' . mysqli_error($conn));
        // }

        // $sceneryData = array();

        // if (mysqli_num_rows($result) > 0) {
        //     while ($row = mysqli_fetch_assoc($result)) {
        //         $sceneryData[] = array(
        //             'sceneryname' => $row['sceneryname'],
        //             'sceneryType' => $row['sceneryType'],
        //             'sub_type_scenery' => $row['sub_type_scenery'],

        //             'price_scenery' => $row['price_scenery'],
        //             'timeLength_scenery' => $row['timeLength_scenery'],
        //             'phone_scenery' => $row['phone_scenery'],

        //             'sceneryID' => $row['sceneryID'],
        //             'scenery_Latitude' => $row['scenery_Latitude'],
        //             'scenery_Longitude' => $row['scenery_Longitude'],
        //             'imagePath' => $row['imagePath']
        //         );
        //     }
        // }
    
    ?>
    
    <!-- <form method="get" action="show_activities.php">  -->

    <form method="get" action="show_activities.php">
        <div class="planner" style="height: 100%;">
            <div class="plan">
                <h1>เลือกกิจกรรม <?php echo $activitiesType ?> เลือกได้มากสุด 3 ที่ </h1> 
            </div>

            <?php foreach ($activitiesData as $activitiesShow) { ?>
                
                <div class="row mb-3">
                    <!-- <div class="plan">
                        <h1>เลือกโรงแรม</h1>
                    </div> -->
                    <div class="card" style="width: 70rem; height: 325px; margin-bottom: 10px">
                            <div class="r1">

                                <label class="option_item">
                                    <input type="checkbox" name="activitiesType[]" value=" <?php echo $activitiesShow['activitiesID']; ?> " class="checkbox">
                                    <div class="option_inner facebook" style="margin-left: -13px">

                                    <img src="<?php echo $activitiesShow['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                                    <h5 class="card-title"><?php echo " ชื่อ : " . $activitiesShow['activitiesname'] , " ไอดี : " . $activitiesShow['activitiesID']?></h5>
                                    <br><br><br>
                                    <h4><?php echo " ราคา : " . $activitiesShow['price_activities'] . " บาท" ; ?></h4>
                                    <br><br>
                                    <h4><?php echo " ระยะเวลา : " . $activitiesShow['timeLength_activities']; ?></h4>
                                    <br><br>
                                    <h4><?php echo " เบอร์ติดต่อ : " . $activitiesShow['phone_activities'] ; ?></h4>
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

        <input id="btn-next" type="submit" name="submit" value="ถัดไป" class="btn btn-primary" style="background-color: #e6bc34; margin-top: 30px; margin-left: 725px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 80px; height: 40px;">


    </form>

    <?php
        // // ตรวจสอบว่ามีค่าที่ถูกส่งมาจากฟอร์มหรือไม่
        // if (isset($_GET['activitiesType'])) {
        //     // ดึงค่าที่ผู้ใช้เลือกมาในรูปของ array
        //     $selectedActivities = $_GET['activitiesType'];

        //     // ตรวจสอบการเชื่อมต่อ
        //     if ($conn->connect_error) {
        //         die("Connection failed: " . $conn->connect_error);
        //     }

        //     // วน loop เพื่อบันทึกข้อมูลกิจกรรมที่เลือกลงในฐานข้อมูล
        //     foreach ($selectedActivities as $activityID) {
        //         $activitiesID = $activityID; 

        //         $sql = "INSERT INTO activitiestrip (tripID, activitiesID, status) 
        //                 VALUES ('$tripID', '$activitiesID', '9')";

        //         if ($conn->query($sql) === TRUE) {
        //             echo "บันทึกข้อมูลกิจกรรม ID $activityID สำเร็จ";
        //         } else {
        //             echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        //         }
        //     }

        // }
    ?>

    <?php

        // // ตรวจสอบว่ามีค่าที่ถูกส่งมาจากฟอร์มหรือไม่
        // if (isset($_GET['activitiesType'])) {
        //     // ดึงค่าที่ผู้ใช้เลือกมาในรูปของ array
        //     $selectedActivities = $_GET['activitiesType'];

        //     // ตรวจสอบการเชื่อมต่อ
        //     if ($conn->connect_error) {
        //         die("Connection failed: " . $conn->connect_error);
        //     }

        //     // สร้างตัวแปร array เพื่อเก็บค่า $activitiesID
        //     $activitiesIDs = [];

        //     foreach ($selectedActivities as $activityID) {
        //         $activitiesID = $activityID;

        //         $sql = "INSERT INTO activitiestrip (tripID, activitiesID, status) 
        //                 VALUES ('$tripID', '$activitiesID', '9')";

        //         if ($conn->query($sql) === TRUE) {
        //             echo "บันทึกข้อมูลกิจกรรม ID $activityID สำเร็จ";

        //             // เพิ่มค่า $activitiesID เข้าไปในอาร์เรย์
        //             $activitiesIDs[] = $activitiesID;
        //         } else {
        //             echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $conn->error;
        //         }
        //     }

        //     // บันทึกค่า $activitiesIDs เป็นอาร์เรย์ใน $_SESSION
        //     $_SESSION['activitiesIDs'] = $activitiesIDs;

        //     // หลังจากบันทึกข้อมูลครบถ้วน ทำการ redirect ไปยังหน้าอื่น
        //     header("Location: show_activities.php");
        //     exit();
        // }
    ?>

    <script>
        var form = document.querySelector('form');  // เลือกฟอร์ม
        form.addEventListener('submit', function(event) {  // เพิ่มการฟังเหตุการณ์ submit ให้กับฟอร์ม
            event.preventDefault();  // ป้องกันการรีเฟรชหน้าเว็บ

            var activitiesTypes = document.getElementsByName('activitiesType[]');  // เลือก checkbox ทั้งหมดที่มีชื่อ 'activitiesType[]'
            var selectedActivities = [];  // สร้างตัวแปรเก็บไอดีของ checkbox ที่ถูกเลือก


            // วนลูปเพื่อตรวจสอบ checkbox ที่ถูกเลือก
            for (var i = 0; i < activitiesTypes.length; i++) {
                if (activitiesTypes[i].checked) {
                    selectedActivities.push(activitiesTypes[i].value);  // เพิ่มไอดีของ checkbox ที่ถูกเลือกในอาร์เรย์
                }
            }

            console.log(selectedActivities);  // แสดงผลไอดีของ checkbox ที่ถูกเลือกในคอนโซล

            var url = form.getAttribute('action') + '?';
            if (selectedActivities.length > 0) {
                url += 'activities=' + selectedActivities.join(',') + '&';
            }

            // ตรวจสอบเงื่อนไขก่อนการเปลี่ยนที่อยู่ของหน้าเว็บ
            if (selectedActivities.length >= 3) {
                window.location.href = url;
            } else {
                alert('โปรดเลือกอย่างน้อย 3 สถานที่');
            }

            // เพื่อป้องกันการส่งฟอร์มต่อไป
            return false;
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


        
</body>

</html>