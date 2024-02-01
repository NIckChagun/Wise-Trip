<?php 

    session_start();

    $provinceID = "";
    $provincename = "";

    $time = "";
    $firstdate = "";

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

    <h1 style="font-family: 'Kanit', 'Helvetica Neue'">สร้างแผนการท่องเที่ยว</h1>

    <h2 style="font-family: 'Kanit', 'Helvetica Neue'">เลือกจังหวัดที่ต้องการ</h2>

    <form method="post" align="center">
        <div style="padding-bottom: 20px; ">
            <button class="btn btn-primary btn-lg" name="provinceID" value="1" style="margin-right: 25px; background-color: #e6bc34; border: none;">เชียงใหม่</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="2" style="margin-right: 25px; background-color: #e6bc34; border: none;">เชียงราย</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="3" style="margin-right: 25px; background-color: #e6bc34; border: none;">ชลบุรี</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="4" style="margin-right: 25px; background-color: #e6bc34; border: none;">ภูเก็ต</button>
            <button class="btn btn-primary btn-lg" name="provinceID" value="5" style="margin-right: 25px; background-color: #e6bc34; border: none;">กรุงเทพ</button>
        </div>

        <?php
            $servername = "localhost";
            $hostname = "root";
            $password = "1234";
            $database = "myproject";

            // Create connection
            $connection = new mysqli($servername, $hostname, $password, $database);

            // $provinceID = "";
            // $provincename = "";

            // $time = "";
            // $firstdate = "";
            
            if (isset($_POST['provinceID'])) {
                $provinceID = $_POST['provinceID'];

                $sql = "SELECT * FROM province WHERE provinceID = '$provinceID'";
                $result = mysqli_query($connection, $sql);

                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);

                    // echo $row['provincename'];

                    // session_start();

                    $provinceID = $row['provinceID'];
                    $provincename = $row['provincename'];


                    $_SESSION['provinceID'] = $provinceID;
                    $_SESSION['provincename'] = $provincename;

                }
            }

            if (isset($_POST['submit'])) {

                $time = $_POST['time'];
                $firstdate = $_POST['firstdate'];

                $_SESSION['time'] = $time;
                $_SESSION['firstdate'] = $firstdate;

            }

        ?>

        <button type="button" class="btn btn-primary btn-lg" style="width: 400px; height: 450px; border: none; background-color: #3629B1">

            <input type="text" placeholder="จังหวัดที่จะท่องเที่ยว..." value="<?php echo $provincename ?>">

        
            <input type="date" name="firstdate">

            <input type="time" name="time">


            <input type="number" name="bug-hotel" id="bug-hotel" placeholder="ค่าที่พัก...">
            <input type="number" name="bug-food" id="bug-food" placeholder="ค่าอาหาร...">
            <input type="number" name="bug-etc" id="bug-etc" placeholder="ค่าใช้จ่ายอื่นๆ...">

            <!-- <input class="btn btn-outline-light" type="submit" value="Calculate"> -->
            <?php
                // $sum = '';

                // if(isset($_POST['bug-hotel']) && $_POST['bug-food'] && $_POST['bug-etc']) {
                //     $bug_hotel = $_POST['bug-hotel'];
                //     $bug_food = $_POST['bug-food'];
                //     $bug_etc = $_POST['bug-etc'];
                        
                //     $sum = $bug_hotel + $bug_food + $bug_etc;
                // }
            ?>
            <a class="btn btn-outline-light" type="submit" value="submit" href="plantrip2.php" >ถัดไป</a>
            <!-- <div id="bug-sum" align="center" style="margin-top: 5px;"><h5>รวมงบประมาณทั้งหมด</h5><?php echo $sum;?></div> -->

        </button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</body>
</html>
