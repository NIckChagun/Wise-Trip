<?php 

    $servername = "localhost";
    $hostname = "root";
    $password = "1234";
    $database = "myproject";

    $conn = mysqli_connect($servername, $hostname, $password, $database);

    if (!$conn) {
        echo "Connection failed!";
    }

?>