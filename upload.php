<?php
    $host = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "myproject";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    if(isset($_POST['submit'])) {

        $sceneryID = $_POST["ID"];
        // $restaurantID = $_POST["ID"];
        // $activitiesID = $_POST["ID"];
        // $hotelID = $_POST["ID"];


        echo '<pre>';
        print_r($_FILES);

        print_r($sceneryID);
        // print_r($restaurantID);
        // print_r($activitiesID);
        // print_r($hotelID);


        echo '</pre>' ;

        $dir = "sceneryPhoto/" ;
        // $dir = "restaurantPhoto/" ;
        // $dir = "activitiesPhoto/" ;
        // $dir = "hotelPhoto/" ;
        
        $fileImage = $dir . basename($_FILES["file"]["name"]) ;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $fileImage)) {
            
            $sql = "INSERT INTO photoscenery (sceneryID, imagePath, status) 
                    VALUES (:sceneryID, :image, 1)";
            // สถานที่

            // $sql = "INSERT INTO photorestaurant (restaurantID, imagePath, status) 
            //         VALUES (:restaurantID, :image, 1)";
            // ร้านอาหาร

            // $sql = "INSERT INTO photoactivities (activitiesID, imagePath, status) 
            //         VALUES (:activitiesID, :image, 1)";
            // กิจกรรม

            // $sql = "INSERT INTO photohotel (hotelID, imagePath, status) 
            //         VALUES (:hotelID, :image, 1)";
            // โรงแรม 

            
            $stmt = $conn->prepare($sql);
            $params = array(

                'sceneryID' => $sceneryID,
                // 'restaurantID' => $restaurantID,
                // 'activitiesID' => $activitiesID,
                // 'hotelID' => $hotelID,


                'image' => $fileImage
            );

            $stmt->execute($params);
            
            echo "ไฟล์ภาพชื่อ " . basename($_FILES["file"]["name"]) . "อัพโหลดเสร็จแล้ว" ;

        }  
        else {
            echo "เกิดข้อผิดพลาดระหว่างอัพโหลดไฟล์" ;
        }  
    }
        

        


