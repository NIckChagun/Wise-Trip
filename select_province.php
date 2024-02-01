<?php 

    session_start();

    include "db_conn.php";

    $provinceID = "";
    $provincename = "";

    $firstdate = "";
    $userID = $_SESSION['userID'];

    if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/plantrip.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Kanit', 'Helvetica Neue'
        }
        
        .btn:focus {
            outline: none;
            box-shadow: 0 0 0 0.5rem rgb(50, 28, 175); 
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

    <h1 style="font-family: 'Kanit', 'Helvetica Neue'">สร้างแผนการท่องเที่ยว</h1>

    <br>

    <h2 style="font-family: 'Kanit', 'Helvetica Neue'">เลือกจังหวัดที่ต้องการ</h2>

    <br><br>

    <form method="GET" align="center">

        <h5>ระบุวันที่ต้องการ </h5>
        <div style="margin-top: 5px" id="input-detail">
            
            <input type="date" name="firstdate" min="<?php echo date('Y-m-d'); ?>" style="width: 250px; ">


            <input type="number" name="budget" id="budget" placeholder="งบประมาณ..." style=" width: 250px; "><h6 style="margin-right: -290px; margin-top: -45px">บาท</h6>

        </div>

        <br>
        <div align="center" style="padding-bottom: 20px; ">
            <button class="btn btn-primary btn-lg" name="provinceID" value="1" style="margin-right: 25px; background-color: #e6bc34; border: none; width: 190px; height: 190px; font-size: 32px; font-weight: semi-bold;">เชียงใหม่</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="2" style="margin-right: 25px; background-color: #e6bc34; border: none; width: 190px; height: 190px; font-size: 32px; font-weight: semi-bold;">เชียงราย</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="3" style="margin-right: 25px; background-color: #e6bc34; border: none; width: 190px; height: 190px; font-size: 32px; font-weight: semi-bold;">ชลบุรี</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="4" style="margin-right: 25px; background-color: #e6bc34; border: none; width: 190px; height: 190px; font-size: 32px; font-weight: semi-bold;">ภูเก็ต</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="5" style="margin-right: 25px; background-color: #e6bc34; border: none; width: 190px; height: 190px; font-size: 32px; font-weight: semi-bold;">กรุงเทพ</button>

        </div>


        <!-- <a class="btn btn-outline btn-lg" style="background-color: #3629B1; color: white; margin-right: 30px;" type="submit" value="submit" href="select_province.php">เลือกเพิ่ม</a> -->
        <br>
        <a class="btn btn-outline btn-lg" style="background-color: #3629B1; color: white;" type="submit" name="submit" value="submit" href="plantrip2.php" >ถัดไป</a>

        <?php
           $servername = "localhost";
           $hostname = "root";
           $password = "1234";
           $database = "myproject";
       
           // สร้างการเชื่อมต่อ
           $connection = new mysqli($servername, $hostname, $password, $database);
       
           if (isset($_GET['provinceID'])) {
               $provinceID = $_GET['provinceID'];
       
               $sql = "SELECT * FROM province WHERE provinceID = '$provinceID'";
               $result = mysqli_query($connection, $sql);
       
               if (mysqli_num_rows($result) === 1) {
                   $row = mysqli_fetch_assoc($result);
       
                   $provinceID = $row['provinceID'];
                   $provincename = $row['provincename'];
       
                   $_SESSION['provinceID'] = $provinceID;
                   $_SESSION['provincename'] = $provincename;

               }
           }

           if(isset($_GET['submit'] )) {
                $firstdate = $_GET['firstdate'];
                $budget = $_GET['budget'];
                
                $_SESSION['firstdate'] = $firstdate;
                $_SESSION['budget'] = $budget;
           }

        ?>

        <?php
            // if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //     $firstdate = $_GET['firstdate'];
            //     $budget = $_GET['budget'];

            //     if (empty($firstdate) || empty($budget)) {
            //         $errorMessage = "ใส่ให้ครบด้วยจ้าาา";
            //     } else {

            //         $sql =  "INSERT INTO trip (userID, firstdate, budget, status) " .
            //                 "VALUES ('$userID', '$firstdate', '$budget', '1')";
            //         $result = $connection->query($sql);

            //         if (!$result) {
            //             $errorMessage = "Invalid query: " . $connection->error;
            //         }

            //         $sql2 = "SELECT tripID FROM trip ORDER BY tripID DESC LIMIT 1";
            //         $result = $connection->query($sql2);

            //         if ($result->num_rows > 0) {
            //             $row = $result->fetch_assoc();

            //             $tripID = $row['tripID'];
            //             $_SESSION['tripID'] = $row['tripID'];

            //         } else {
            //             // ไม่พบข้อมูลในตาราง trip
                        
            //         }

            //     }
            // }
        // ?>

        <?php
        
            if (isset($_GET['firstdate']) && isset($_GET['budget'])) {
                $firstdate = $_GET['firstdate'];
                $budget = $_GET['budget'];
            
            
                if (empty($firstdate) || empty($budget)) {
                    $errorMessage = "ใส่ให้ครบ";
                } else {
                    // ตรวจสอบว่ามี tripID ที่ซ้ำกับข้อมูลที่จะเพิ่มหรือไม่
                    $existingTripID = false;
                    $sqlCheck = "SELECT tripID FROM trip WHERE userID = '$userID' AND firstdate = '$firstdate' AND budget = '$budget'";
                    $resultCheck = $connection->query($sqlCheck);
                    if ($resultCheck->num_rows > 0) {
                        $existingTripID = true;
                    }
            
                    if (!$existingTripID) {
                        $sql = "INSERT INTO trip (userID, firstdate, budget, status) VALUES ('$userID', '$firstdate', '$budget', '1')";
                        $result = $connection->query($sql);
            
                        if (!$result) {
                            $errorMessage = "Invalid query: " . $connection->error;
                        } else {
                            $tripID = $connection->insert_id;
                            $_SESSION['tripID'] = $tripID;
                        }
                    } else {
                        // แสดงข้อความหรือจัดการเมื่อมีการเพิ่มข้อมูลที่ซ้ำซ้อน
                        $errorMessage = "ข้อมูลซ้ำซ้อน";
                    }
                }
            }
        
        
        ?>



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