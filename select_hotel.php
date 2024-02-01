<?php

    // session_start();

    include "db_conn.php";
    include "pagin.php";

    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];

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
    <link rel="stylesheet" href="css/select_hotel.css">
    <!-- <link rel ="stylesheet" href="pagin.css"> -->
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
        if(isset($_GET['page-nr'])){
            $id = $_GET['page-nr'];
        }else{
            $id = 1;
        }
    ?>

    <?php
    
        $sql = "    SELECT hotel.hotelID,
                            hotel.hotelname , 
                            hotel.email , 
                            hotel.phone_hotel , 
                            hotel.website , 
                            
                            roomshotel.roomshotelname, 
                            roomshotel.roomsType , 
                            roomshotel.person , 
                            roomshotel.price ,
                            
                            photohotel.imagePath

                    FROM hotel 
                    
                    JOIN roomshotel 
                    ON hotel.hotelID = roomshotel.hotelID 
                    JOIN photohotel
                    ON hotel.hotelID = photohotel.hotelID
                    
                    WHERE hotel.provinceID = '$provinceID' 
                    ORDER BY hotel.hotelname  " ;

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $hotelID = "";
        $hotelname = ""; 
        $email = ""; 
        $phone_hotel = ""; 
        $website = ""; 
        $roomshotelname = ""; 
        $roomsType = ""; 
        $person = ""; 
        $price = ""; 

        $hotelData = array(); // สร้างอาร์เรย์สำหรับเก็บข้อมูลโรงแรม 

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $hotelData[] = array(
                    'hotelID' => $row['hotelID'],
                    'hotelname' => $row['hotelname'],
                    'email' => $row['email'],
                    'phone_hotel' => $row['phone_hotel'],
                    'website' => $row['website'],
                    'roomshotelname' => $row['roomshotelname'],
                    'roomsType' => $row['roomsType'],
                    'person' => $row['person'],
                    'price' => $row['price'],
                    'imagePath' => $row['imagePath']

                );

            }
        }
    
        foreach ($hotelData as $hotel) {
            $hotelID = $hotel['hotelID'];
            // นำ $hotelID ไปใช้งานต่อได้
        }

        $_SESSION['hotelData'] = $hotelData;

        // echo (strval( mysqli_num_rows($result)));
        // จำนวนข้อมูลที่ได้จาก sql
            
    ?>

        <div class="planner">
            <div class="plan">
                <h1>เลือกโรงแรม</h1>
            </div>

            <?php foreach ($hotelData as $hotel) { ?>
                
                <div class="row mb-3">
                    <!-- <div class="plan">
                        <h1>เลือกโรงแรม</h1>
                    </div> -->
                    <div class="card" style="width: 70rem;">
                        <div class="r1">
                            <img src="<?php echo $hotel['imagePath']; ?>" class="card-img-top" style="width: 260px; height: 260px;">
                            <h5 class="card-title"><?php echo $hotel['hotelname'] ; ?></h5>
                            <br><br><br>
                            <h4><?php echo " ประเภท : " . $hotel['roomsType']; ?></h4>
                            <br><br>
                            <h4><?php echo " ชื่อห้อง : " . $hotel['roomshotelname']; ?></h4>
                            <br><br>
                            <h4><?php echo " จำนวนคน : " . $hotel['person'] . " คน"; ?></h4>
                            <br><br>
                            <div class="time">
                                <h4 class="card-text"><?php echo "ราคา : " . $hotel['price'] . ".00 บาท"; ?></h4>
                            </div>
                            <div class="phone">
                                <br><br>
                                <h4><?php echo " เบอร์ติดต่อ : " . $hotel['phone_hotel']; ?></h4>
                            </div>
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

        
    <div class="page-info">
        Showing <?php echo $page + 1 ?> of <?php echo $pages ?> pages
    </div>

    <div class="pagination">
        <a href="?page-nr=1">First</a>
        <?php
            if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
                ?>
                    <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
                <?php
            }else{
                ?>
                    <a>Previous</a>
                <?php
            }
        ?>
        <div class="page-number">
            <?php
                for($counter = 1; $counter <= $pages; $counter++){
                    ?>
                        <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                    <?php
                }
            ?>
        </div>
        <?php
            if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pages){
                ?>
                    <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
                <?php
            }else{
                ?>
                    <a>Next</a>
                <?php
            }
        ?>
        <a href="?page-nr=<?php echo $pages ?>">Last</a>
    </div>

    <script>
        let links = document.querySelectorAll('.page-number > a');
        let bodyId = parseInt(document.body.id) - 1;
        links[bodyId].classList.add("active");
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>


        
</body>

</html>