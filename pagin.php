<?php

    session_start();

    $provincename = $_SESSION["provincename"];
    $provinceID = $_SESSION["provinceID"];
    $hotelData = $_SESSION['hotelData'];
    
    foreach ($hotelData as $hotel) {
        $hotelID = $hotel['hotelID'];
        
    }

    $servername = "localhost";
    $hostname = "root";
    $password = "1234";
    $database = "myproject";

    $mysqli = new mysqli($servername, $hostname, $password, $database);

    if (!$mysqli) {
        echo "Connection failed!";
    }

    $start = 0;
    $row_per_page = 4;
    
    $records = $mysqli->query("SELECT * FROM hotel");
    $nr_of_rows = $records->num_rows;
    
    if ($row_per_page != 0) {
        $pages = ceil($nr_of_rows / $row_per_page);
    } else {
        $pages = 0;
    }
    
    if (isset($_GET['page-nr'])) {
        $page = $_GET['page-nr'] - 1;
        $start = $page * $row_per_page;
    }
    
    $result = $mysqli->query("SELECT * FROM hotel LIMIT $start,$row_per_page");
    

?>

<?php
    // session_start();

    // $provincename = $_SESSION["provincename"];
    // $provinceID = $_SESSION["provinceID"];
    // $hotelData = $_SESSION['hotelData'];

    // $hotelIDs = array(); // สร้างอาร์เรย์สำหรับเก็บ hotelID

    // foreach ($hotelData as $hotel) {
    //     $hotelIDs[] = $hotel['hotelID'];
    // }

    // $servername = "localhost";
    // $hostname = "root";
    // $password = "1234";
    // $database = "myproject";

    // $mysqli = new mysqli($servername, $hostname, $password, $database);

    // if (!$mysqli) {
    //     echo "Connection failed!";
    // }

    // $start = 0;
    // $row_per_page = 4;

    // $records = $mysqli->query("SELECT   hotel.hotelID,
    //                                     hotel.hotelname , 
    //                                     hotel.email , 
    //                                     hotel.phone_hotel , 
    //                                     hotel.website , 

    //                                     roomshotel.roomshotelname, 
    //                                     roomshotel.roomsType , 
    //                                     roomshotel.person , 
    //                                     roomshotel.price ,

    //                                     photohotel.imagePath 
    //                             FROM hotel 

    //                             JOIN roomshotel 
    //                             ON hotel.hotelID = roomshotel.hotelID 
    //                             JOIN photohotel
    //                             ON hotel.hotelID = photohotel.hotelID

    //                             ORDER BY hotel.hotelname

    //                             WHERE hotelID IN (" . implode(",", $hotelIDs) . ")");

    // $nr_of_rows = $records->num_rows;

    // if ($row_per_page != 0) {
    //     $pages = ceil($nr_of_rows / $row_per_page);
    // } else {
    //     $pages = 0;
    // }

    // if (isset($_GET['page-nr'])) {
    //     $page = $_GET['page-nr'] - 1;
    //     $start = $page * $row_per_page;
    // }

    // $result = $mysqli->query("SELECT * FROM hotel WHERE hotelID IN (" . implode(",", $hotelIDs) . ") LIMIT $start,$row_per_page");
?>
