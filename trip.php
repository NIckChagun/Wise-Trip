<?php

    session_start();

    include "db_conn.php";

    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];

    // $firstdate = $_SESSION["firstdate"];
    // $time = $_SESSION["time"];

    // $sceneryname = $_SESSION['sceneryname'];
    // $activitiesname = $_SESSION['activitiesname'];
    // $price = $_SESSION['price'];
    // $timeLength = $_SESSION['timeLength'];
    // $restaurantname = $_SESSION['restaurantname'];
    // $restaurantType = $_SESSION['restaurantType'];
    // $pricerange = $_SESSION['pricerange'];
    // $phone = $_SESSION['phone'];

    $activitiesID = $_SESSION['activitiesID'];

    $activitiesname = $_SESSION['activitiesname'];
    $price_activities = $_SESSION['price_activities'];
    $timeLength_activities = $_SESSION['timeLength_activities'];
    $phone_activities = $_SESSION['phone_activities'];
    // กิจกรรม

    

    $sceneryID = $_SESSION['sceneryID'];

    $sceneryname = $_SESSION['sceneryname'];
    $price_scenery = $_SESSION['price_scenery'];
    $timeLength_scenery = $_SESSION['timeLength_scenery'];
    $phone_scenery = $_SESSION['phone_scenery'];
    // สถานที่

    $start_time = "09:00";
    $start_time2 = "";
    $start_time3 = "";
    $timeAdd = "";
    $addedTime = "";

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

    <?php
    
        $sql = " SELECT imagePath FROM photoactivities WHERE activitiesID = $activitiesID ";
        $result = mysqli_query($conn, $sql);

        $imagePath = "";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $imagePath = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }// กิจกรรม

        $sql2 = " SELECT imagePath FROM photorestaurant WHERE restaurantID = $restaurantID ";
        $result2 = mysqli_query($conn, $sql2);

        $imagePath2 = "";

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {

                $imagePath2 = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }

        
        $formattedTime_open = date("H:i", strtotime($open_time));
        $formattedTime_close = date("H:i", strtotime($close_time));
        
        // ร้านอาหาร

        $sql3 = " SELECT imagePath FROM photoscenery WHERE sceneryID = $sceneryID ";
        $result3 = mysqli_query($conn, $sql3);

        $imagePath3 = "";

        if (mysqli_num_rows($result3) > 0) {
            while ($row = mysqli_fetch_assoc($result3)) {

                $imagePath3 = $row['imagePath'];

                // echo "<img src='$imagePath' alt='Image'>";
            }
            
        }// สถานที่

    ?>

    

    <div class="planner">
        <div class="row mb-3 ">
            <div class="plan">
                <h1>แผนการเดินทาง</h1>
            </div>
            <div class="card" style="width: 70rem;">
                <div class="r1">
                    <h5> <?php echo "$start_time น." ?> </h5>
                    <img src=" <?php echo "$imagePath" ?> " class="card-img-top" style="width: 260px; height: 260px;">
                    <h5 class="card-title"> <?php echo "$activitiesname" ?> </h5> <br><br><br>
                    <h4 class="card-text"> <?php echo "ราคา : $price_activities.00 บาท" ?></h4>
                    <br><br>
                    <!-- <i class="fa-solid fa-map-location"></i> <br><br><br>
                    <h3>ที่อยู่ : ทางไปสัตหีบ ก่อนแยกเขาชีจรรย์ ติดสุขุมวิท พัทยา จังหวัดชลบุรี</h3> -->
                    <div class="time">
                        <!-- <i class="fa-sharp fa-solid fa-clock"></i> -->
                        <h4><?php echo " เวลา : $timeLength_activities " ?></h4>

                        <?php
                        
                            // // $timeAdd = "1 ชั่วโมง";
                            // $timeAdd = str_replace(" ชั่วโมง", "", $timeLength_activities); // ลบคำว่า "ชั่วโมง" ออกจากตัวแปร
                            // $addedTime = strtotime($start_time) + ($timeAdd * 3600); // เพิ่มเวลาตามจำนวนชั่วโมงที่ต้องการ (เปลี่ยนจากชั่วโมงเป็นวินาที)
                            // $start_time2 = date("H:i", $addedTime); // รูปแบบเวลาที่แสดงเฉพาะชั่วโมง, นาที, วินาที
                            // // echo $formattedTime_add;

                            $timeAdd = str_replace(" ชั่วโมง", "", $timeLength_activities);
                            $timeAdd = intval($timeAdd); // แปลง $timeAdd เป็นตัวเลข

                            $addedTime = strtotime($start_time) + ($timeAdd * 3600);
                            $start_time2 = date("H:i", $addedTime);


                        ?>

                    </div>
                    <!-- <div class="page">
                        <i class="fa-brands fa-facebook"></i><br><br><br>
                        <a href="https://www.facebook.com/loveyourtrees">
                            <h3>facebook</h3>
                        </a>
                    </div> -->
                    <div class="phone">
                        <!-- <i class="fa-sharp fa-solid fa-phone"></i> -->
                        <br><br>
                        <h4><?php echo " เบอร์ติดต่อ : $phone_activities" ?></h4>
                    </div>
                </div>
                <div class="col-md-8 themed-grid-col">
                    <div class="pb-3">
                    </div>
                    <div class="row">
                        <div class="col-md-6 themed-grid-col"></div>
                        <div class="col-md-6 themed-grid-col"></div>
                    </div>
                </div>
                <div class="col-md-4 themed-grid-col"></div>
            </div>
        </div>
        <!-- กิจกรรม -->

        <div class="planner">
            <div class="row mb-3 ">
                <div class="card" style="width: 70rem;">
                    <div class="r1">
                        <h5> <?php echo "$start_time2 น." ?> </h5>
                        <img src="<?php echo "$imagePath2" ?>" class="card-img-top" style="width: 260px; height: 260px;">
                        <h5 class="card-title"> <?php echo "$restaurantname" ?> </h5> <br><br><br>
                        <!-- <h4 class="card-text"> คาเฟ่ที่โอบล้อมไปด้วยต้นไม้ ได้บรรยากาศแบบสวนย่อมเล็กๆ <br> เรียบง่ายได้ความเป็นธรรมชาติเต็มๆ ร่มรื่น ผ่อนคลาย มีโซนห้องแอร์ด้านใน มีที่จอดรถ</h4> -->
                        <!-- <i class="fa-solid fa-map-location"></i>  -->
                        <h4> <?php echo "ราคา : $pricerange.00 บาท" ?> </h4> <br><br>
                        <div class="time">
                            <!-- <i class="fa-sharp fa-solid fa-clock"></i> -->
                            <!-- <h3>เวลา : วันอังคาร-อาทิตย์ 09.00-18.00 น. (ปิดวันจันทร์)</h3> -->
                            <h4><?php echo " เวลาเปิด-ปิด : $formattedTime_open น. - $formattedTime_close น. " ?></h4> 
                            <h4><?php echo " วันปิดร้าน : $closed_day" ?></h4> <br><br>

                            <?php
                            
                                // // $timeAdd = "1 ชั่วโมง";
                                // $timeAdd = str_replace(" ชั่วโมง", "", $timeLength_activities); // ลบคำว่า "ชั่วโมง" ออกจากตัวแปร
                                // $addedTime = strtotime($start_time2) + ($timeAdd * 3600); // เพิ่มเวลาตามจำนวนชั่วโมงที่ต้องการ (เปลี่ยนจากชั่วโมงเป็นวินาที)
                                // $start_time3 = date("H:i", $addedTime); // รูปแบบเวลาที่แสดงเฉพาะชั่วโมง, นาที, วินาที
                                // // echo $formattedTime_add;    

                                $timeAdd = str_replace(" ชั่วโมง", "", $timeLength_scenery);
                                $timeAdd = intval($timeAdd); // แปลง $timeAdd เป็นตัวเลข

                                $addedTime = strtotime($start_time2) + ($timeAdd * 3600);
                                $start_time3 = date("H:i", $addedTime);

                            ?>

                        </div>
                        <div class="page">
                            <!-- <i class="fa-brands fa-facebook"></i><br><br><br> -->
                            <a href="https://www.facebook.com/<?php echo "$facebook" ?>">
                                <!-- <h3>facebook</h3> -->
                                <h4><?php echo " facebook : $restaurantname " ?></h4>

                            </a>
                        </div>
                        <br><br>
                        <div class="phone">
                            <!-- <i class="fa-sharp fa-solid fa-phone"></i> <br><br> -->
                            <!-- <h4>08-1991-9743</h4> -->
                            <h4><?php echo " เบอร์ติดต่อ : $phone_restaurant" ?></h4>
                        </div>
                    </div>
                    <div class="col-md-8 themed-grid-col">
                        <div class="pb-3">
                        </div>
                        <div class="row">
                            <div class="col-md-6 themed-grid-col"></div>
                            <div class="col-md-6 themed-grid-col"></div>
                        </div>
                    </div>
                    <div class="col-md-4 themed-grid-col"></div>
                </div>
            </div>
            
            <div class="planner">
                <div class="row mb-3 ">

                    <div class="card" style="width: 70rem;">
                        <div class="r1">
                            <h5> <?php echo "$start_time3 น." ?> </h5>
                            <img src="<?php echo "$imagePath3" ?>" class="card-img-top" style="width: 260px; height: 260px;">
                            <h5 class="card-title"> <?php echo "$sceneryname" ?> </h5> <br><br><br>
                            <!-- <h4 class="card-text"> คาเฟ่ที่โอบล้อมไปด้วยต้นไม้ ได้บรรยากาศแบบสวนย่อมเล็กๆ <br> เรียบง่ายได้ความเป็นธรรมชาติเต็มๆ ร่มรื่น ผ่อนคลาย มีโซนห้องแอร์ด้านใน มีที่จอดรถ</h4> -->
                            <!-- <i class="fa-solid fa-map-location"></i>  -->
                            <h4> <?php echo "ราคา : $price_scenery.00 บาท" ?> </h4> <br><br>
                            <div class="time">
                                <!-- <i class="fa-sharp fa-solid fa-clock"></i> -->
                                <h4><?php echo " เวลา : $timeLength_scenery " ?></h4>
                                
                            </div>
                            <!-- <div class="page">
                                <i class="fa-brands fa-facebook"></i><br><br><br>
                                <a href="https://www.facebook.com/loveyourtrees">
                                    <h3>facebook</h3>
                                </a>
                            </div> -->
                            <br><br>
                            <div class="phone">
                                <!-- <i class="fa-sharp fa-solid fa-phone"></i> <br><br> -->
                                <h4><?php echo " เบอร์ติดต่อ : $phone_scenery" ?></h4>
                            </div>
                        </div>
                        <div class="col-md-8 themed-grid-col">
                            <div class="pb-3">
                            </div>
                            <div class="row">
                                <div class="col-md-6 themed-grid-col"></div>
                                <div class="col-md-6 themed-grid-col"></div>
                            </div>
                        </div>
                        <div class="col-md-4 themed-grid-col"></div>
                    </div>
    </div><!-- สถานที่ -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


        
</body>

</html>