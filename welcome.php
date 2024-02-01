<?php 
    session_start();

    $userID = $_SESSION['userID'];

    if (isset($_SESSION['userID']) && isset($_SESSION['email'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="css/style_welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <title>Wise Trip</title>
</head>
<body>

    <div class="wrapper">

        <header>

            <div class="logo"><img src="image/logo.png" alt=""></div>

            <div class="welcome-user">
                <h1>Hello <?php echo $_SESSION['first_last_name']; ?></h1>
                <a href="base.php" id="close"><i class="fa-solid fa-xmark"></i></a>
                <a href="logout.php" id="logout">Logout</a>
            </div>

            <a class="btn btn-primary" id="btn_home" href="home2.php" role="button">Home</a>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="btn_register" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                จัดการทริป
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="select_province.php">สร้างทริป</a></li>
                <li><a class="dropdown-item" href="mytrip.php">ทริปของคุณ</a></li>
            </ul>
            </div>     
            <a class="btn btn-primary" id="btn_login" href="login.php" role="button"><i class="fa-solid fa-user"></i></a>
    
        </header>

        <div class="content">

            <div class="content-left">
                <div id="wise"><h1>Wise</h1></div>
                <div id="trip"><h1>Trip</h1></div>

                <div id="des">
                    <h2>ให้การท่องเที่ยวเป็นเรื่องง่ายขึ้น แค่ใช้ Wise Trip ช่วยวางแผนทริปของคุณ ไม่ว่าเป็นการ เลือกที่พัก ร้านอาหาร Enjoy your trip</h2>
                </div>

                <a class="btn btn-primary" id="start" href="index.php" role="button"><h2>เริ่มต้นใช้งาน</h2></a>
            </div>

            <div class="content-right">
                <img src="image/bag.png">
            </div>

        </div>

    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>   

</body>
</html>
<?php 
    }else{
        header("Location: login.php");
        exit();
    }
?>