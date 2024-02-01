<?php
    session_start();
    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];
  
    include "db_conn.php";

    $activity = "";
    
    if(isset($_POST['submit'])) {
        if(isset($_POST['activitiesType'])) {
            $activitiesType = $_POST['activitiesType'];

            $allData = implode(",",$activitiesType);
            $activity = $allData;
            // $_SESSION['activitiesType'] = $activity;
        // echo $activity;
        }
        // $sql = "SELECT * FROM activities WHERE activitiesType = '$activity'";
        $sql = 
        "   SELECT sceneryname, activitiesname, scenery.price, activities.timeLength
            FROM scenery 
            JOIN activities 
            ON activities.seneryID = scenery.sceneryID 
            WHERE activities.activitiesType = '$activity' 
            AND scenery.provinceID = '$provinceID' ";

        $result = mysqli_query($conn, $sql);

        // echo mysqli_error($conn);
        // var_dump($result);
        
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            
        } 

    }

    $restaurant = "";

    if(isset($_POST['submit'])) {
        if(isset($_POST['restaurantType'])) {
            $restaurantType = $_POST['restaurantType'];

            $allData = implode(",",$restaurantType);
            $restaurant = $allData;
            // $_SESSION['activitiesType'] = $restaurant;

        }

        $sql = "SELECT * FROM restaurant WHERE restaurantType = '$restaurant' AND provinceID = '$provinceID' ";
        $result = mysqli_query($conn, $sql);

        
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row2 = mysqli_fetch_assoc($result);

            
        }
    }

    $scenery = "";

    if(isset($_POST['submit'])) {
        if(isset($_POST['sceneryType'])) {
            $sceneryType = $_POST['sceneryType'];

            $allData = implode(",",$sceneryType);
            $scenery = $allData;
            // $_SESSION['activitiesType'] = $restaurant;

        }

        $sql = "SELECT * FROM scenery WHERE sceneryType = '$scenery' AND provinceID = '$provinceID' ";
        $result = mysqli_query($conn, $sql);

        
        if (!$result) {
            die('Error: ' . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $row3 = mysqli_fetch_assoc($result);

            
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
</head>
<body>

    <form method="post" class="activity">
        <input type="checkbox" name="activitiesType[]" value="ถ่ายรูป"> ถ่ายรูป<br>
        <input type="checkbox" name="activitiesType[]" value="เชิงนิเวศ"> ชมสัตว์โลก<br>
        <input type="checkbox" name="activitiesType[]" value="วัฒนธรรม"> ไหว้พระ<br>
    <input type="submit" name="submit" value="Submit">
    </form>

    <?php

        if (isset($row) && $row) {
            echo 
            $row['sceneryname'],
            $row['activitiesname'],
            $row['price'],
            $provincename,
            $row['timeLength'];
            

        } else {
            echo "ไม่มีสถานที่ที่คุณเลือกในจังหวัด$provincename";
        }

    ?>

    <hr>
    <form method="post" class="restaurant">
        <input type="checkbox" name="restaurantType[]" value="อาหารตะวันตก"> อาหารตะวันตก<br>
        <input type="checkbox" name="restaurantType[]" value="อาหารทะเล"> อาหารทะเล<br>
        <input type="checkbox" name="restaurantType[]" value="สตีทฟู้ด"> สตีทฟู้ด<br>
    <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    
        if (isset($row2) && $row2) {
            echo 
            $row2['restaurantname'],
            $row2['restaurantType'],
            $row2['pricerange'],
            $provincename;

        } else {
            echo "ไม่มีสถานที่ที่คุณเลือกในจังหวัด$provincename";
        }

    ?>

    <hr>
    <form method="post" class="scenery">
        <input type="checkbox" name="sceneryType[]" value="ทะเล"> ทะเล<br>
        <input type="checkbox" name="sceneryType[]" value="อวาเรียม"> อวาเรียม<br>
        <input type="checkbox" name="sceneryType[]" value="วัด"> วัด<br>
    <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    
        if (isset($row3) && $row3) {
            echo 
            $row3['sceneryname'],
            $row3['sceneryType'],
            $row3['price'],
            $provincename,
            $row3['timeLength'];

        } else {
            echo "ไม่มีสถานที่ที่คุณเลือกในจังหวัด$provincename";
        }

    ?>

</body>
</html>