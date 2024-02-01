<?php

    session_start();
    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];

    include "db_conn.php";

    $activity = "";
    $restaurant = "";
    $scenery = "";

    if(isset($_POST['submit'])) {
        if(isset($_POST['activitiesType'])) {
            $activitiesType = $_POST['activitiesType'];
            $allData = implode(",",$activitiesType);
            $activity = $allData;
        }

        if(isset($_POST['restaurantType'])) {
            $restaurantType = $_POST['restaurantType'];
            $allData = implode(",",$restaurantType);
            $restaurant = $allData;
        }

        if(isset($_POST['sceneryType'])) {
            $sceneryType = $_POST['sceneryType'];
            $allData = implode(",",$sceneryType);
            $scenery = $allData;
        }

    }
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Outfit:100,200,300,regular,500,600,700,800,900" rel="stylesheet" />
</head>
<body>
    
<form method="post" class="plant">
    <input type="checkbox" name="activitiesType[]" value="ถ่ายรูป"> ถ่ายรูป<br>
    <input type="checkbox" name="activitiesType[]" value="เชิงนิเวศ"> ชมสัตว์โลก<br>
    <input type="checkbox" name="activitiesType[]" value="วัฒนธรรม"> ไหว้พระ<br>
    
    <hr>

    <input type="checkbox" name="restaurantType[]" value="อาหารตะวันตก"> อาหารตะวันตก<br>
    <input type="checkbox" name="restaurantType[]" value="อาหารทะเล"> อาหารทะเล<br>
    <input type="checkbox" name="restaurantType[]" value="สiตีทฟู้ด"> สตีทฟู้ด<br>
    
    <hr>
    
    <input type="checkbox" name="sceneryType[]" value="ทะเล"> ทะเล<br>
    <input type="checkbox" name="sceneryType[]" value="อวาเรียม"> อวาเรียม<br>
    <input type="checkbox" name="sceneryType[]" value="วัด"> วัด<br>

    <hr>
    
    <input type="submit" name="submit" value="Submit">
</form>

    <?php

         $sql = "SELECT s.sceneryname,
                    a.activitiesname,
                    s.price,
                    a.timeLength,
                    r.restaurantname,
                    r.restaurantType,
                    r.pricerange,
                    r.phone

                FROM scenery s
                JOIN activities a ON a.seneryID = s.sceneryID 
                LEFT JOIN restaurant r ON r.provinceID = s.provinceID AND r.restaurantType = '$restaurant'
                WHERE a.activitiesType = '$activity' 
                AND s.sceneryType = '$scenery'
                AND s.provinceID = '$provinceID' ";
    
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        $sceneryname = "";
        $activitiesname = "";
        $price = "";
        $timeLength = "";
        $restaurantname = "";
        $restaurantType = "";
        $pricerange = "";
        $phone = "";


        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

                $sceneryname = $row['sceneryname'];
                $activitiesname = $row['activitiesname'];
                $price = $row['price'];
                $timeLength = $row['timeLength'];
                $restaurantname = $row['restaurantname'];
                $restaurantType = $row['restaurantType'];
                $pricerange = $row['pricerange'];
                $phone = $row['phone'];

            }
        } 
    
    ?>
    <br><br><br>

    <div class="card" style="width: 24rem;">
            <img src="image/aquarium2.jpg" style="float: left;" class="card-img-top">
            <img src="image/กินกับก้อย.jpg" style="float: left;" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title"><?php echo "<h2>สถานที่ท่องเที่ยว: $sceneryname" ?></h5>
            <p class="card-text"><?php echo "<h5>กิจกรรม: $activitiesname" ?></p>
            <p class="card-text"><?php echo "<h5>ราคา: $price" ?></p>
            <p class="card-text"><?php echo "<h5>ระยะเวลา: $timeLength" ?></p>
            <p class="card-text"><?php echo "<h5>ร้านอาหาร:  $restaurantname " ?></p>
            <p class="card-text"><?php echo "<h5>ประเภทร้าน: $restaurantType" ?></p>
            <p class="card-text"><?php echo "<h5>ช่วงราคาร้าน: $pricerange" ?></p>
            <p class="card-text"><?php echo "<h5>เบอร์ติดต่อ: $phone" ?></p>
            <p class="card-text"><?php echo "<h5>จังหวัดที่ไป: $provincename" ?></p>

            
            <a href="#" class="btn btn-primary">บันทึกทริปนี้</a>
        </div>
    </div>

</body>
</html>