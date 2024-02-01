<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wise Trip</title>
    <link rel="icon" type="image/png" href="image/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>
<body>

    <div class="wrapper">

        <header>

            <div class="logo"><img src="image/logo.png" alt=""></div>
            <a class="btn btn-primary" id="btn_home" href="index.php" role="button">Home</a>
            <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" id="btn_register" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                จัดการทริป
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="select_province.php">สร้างทริป</a></li>
                <li><a class="dropdown-item" href="mytrip.php">ทริปของคุณ</a></li>
            </ul>
            </div>    
            <a class="btn btn-primary" id="btn_login" href="login.php" role="button">เข้าสู่ระบบ</a>
    
        </header>

        <div class="content">

            <div class="content-left">
                <div id="wise"><h1>Wise</h1></div>
                <div id="trip"><h1>Trip</h1></div>

                <div id="des">
                    <h2>ให้การท่องเที่ยวเป็นเรื่องง่ายขึ้น แค่ใช้ Wise Trip ช่วยวางแผนทริปของคุณ ไม่ว่าเป็นการ เลือกที่พัก ร้านอาหาร Enjoy your trip</h2>
                </div>

                <!-- <a class="btn btn-primary" id="start" href="index.php" role="button"><h2>เริ่มต้นใช้งาน</h2></a> -->
                <!-- <a class="btn btn-primary" id="start" href="lifestyle.php" role="button"><h2>เริ่มต้นใช้งาน</h2></a> -->
                <!-- <a class="btn btn-primary" id="start" href="plantrip.php" role="button"><h2>เริ่มต้นใช้งาน</h2></a> -->
                <a class="btn btn-primary" id="start" href="select_province.php" role="button"><h2>เริ่มต้นใช้งาน</h2></a>



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

