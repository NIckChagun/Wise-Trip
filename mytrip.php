<?php

    session_start();

    include "db_conn.php";

    $userID = $_SESSION['userID'];

    if (isset($tripID)) {
        // สร้าง URL โดยกำหนดค่า tripID ใน query parameter
        $url = "detail.php?tripID=" . urlencode($tripID);
    
        // สามารถใช้ header() เพื่อ redirect ไปที่หน้าใหม่
        header("Location: $url");
        exit(); // ต้องมี exit() เสมอหลังจากใช้ header() เพื่อให้การ redirect ทำงานถูกต้อง
    }

    if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {

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
    <link rel="stylesheet" href="css/plantrip2.css">
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
    
        $sql =  "   SELECT tripID, firstdate, budget, provincename, activitiesID, activitiesDistance, imagePath
                    FROM (
                        SELECT trip.tripID,
                                trip.firstdate,
                                trip.budget,
                                province.provincename,
                                activitiestrip.activitiesID,
                                activities.activitiesDistance,
                                photoactivities.imagePath,
                                ROW_NUMBER() OVER(PARTITION BY trip.tripID ORDER BY activitiestrip.activitiesID) as rn
                        FROM `trip`
                        JOIN activitiestrip ON trip.tripID = activitiestrip.tripID
                        JOIN activities ON activitiestrip.activitiesID = activities.activitiesID
                        JOIN scenery ON scenery.sceneryID = activitiestrip.activitiesID
                        JOIN photoactivities ON activities.activitiesID = photoactivities.activitiesID
                        JOIN province ON scenery.provinceID = province.provinceID 
                        WHERE `userID`= '$userID'
                    ) AS t
                    WHERE rn = 1
                    ORDER BY firstdate
        
                ";
        
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $tripData = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $tripData[] = array(
                    'tripID' => $row['tripID'],
                    'firstdate' => $row['firstdate'],
                    'budget' => $row['budget'],
                    'provincename' => $row['provincename'],
                    'activitiesID' => $row['activitiesID'],
                    'activitiesDistance' => $row['activitiesDistance'],
                    'imagePath' => $row['imagePath']
                   
                );
            }
        }
    
    ?>

    <div class="head-plan"><h1>ทริปของคุณ</h1>
    </div>

    <form method="get" action="detail.php">
        <div class="planner" style="height: 100%;">
            <div class="row mb-2">
                <?php 
                foreach ($tripData as $data) { ?>
                    <div class="col-md-3" style="width:400px; margin-top:20px; margin-left: -20px;">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="margin-left:50px; background-color: #fff;">
                            <div class="col p-4 d-flex flex-column position-static" >
                                <svg class="bd-placeholder-img" width="280" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <image href="<?php echo $data['imagePath']; ?>" width="100%" height="100%" />
                                </svg>                
                                <h3 class="mb-0" style="margin-top: 10px; font-family: 'Kanit', 'Helvetica', 'Arial';" ><?php echo  $data['provincename']; ?></h3>
                                <div class="mb-1 text-muted" style="font-family: 'Kanit', 'Helvetica', 'Arial';">
                                    <?php
                                    $dateString = $data['firstdate'];
                                    $timestamp = strtotime($dateString);
                                    $formattedDate = date("d F Y", $timestamp);
                                    $formattedDateBuddhist = date("d F", $timestamp) . ' ' . (date("Y", $timestamp) + 543);
                                    echo $formattedDateBuddhist;
                                    ?>
                                </div>
                                <p class="card-text mb-auto"></p>
                                <button type="submit" name="tripID" value="<?php echo $data['tripID']?>" style="border: none; text-decoration: none; background-color: #e6bc34; margin-top: 20px; color: white; border-radius: 5px; font-family: 'Kanit', 'Helvetica', 'Arial'; width: 120px; height: 40px;">
                                    <h5 style="font-size: 16px; margin-top: 10px;">รายละเอียด</h5>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </form>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>
</html>
<?php 
    }else{
        header("Location: login.php");
        exit();
    }
?>