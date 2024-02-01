<?php
if ( isset($_GET["id"]) ) {
    $id = $_GET["id"];

    $servername = "localhost";
    $hostname = "root";
    $password = "1234";
    $database = "myproject";

 //Create connection
 $connection = new mysqli($servername, $hostname, $password, $database);

 $sql = "UPDATE users SET status=0 WHERE id=$id";

 $connection->query($sql);
}

header("location: index.php");
exit;
?>