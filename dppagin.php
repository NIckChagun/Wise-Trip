<?php

    include "pagin.php";

    // $hotelData = $_SESSION['hotelData'];
    
    // foreach ($hotelData as $hotel) {
    //     $hotelID = $hotel['hotelID'];
    //     // นำ $hotelID ไปใช้งานต่อได้
    // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="pagin.css">
    <title>Document</title>
</head>
<body>
<?php
    if(isset($_GET['page-nr'])){
        $id = $_GET['page-nr'];
    }else{
        $id = 1;
    }
?>

<div class="content">
    
    <?php 
    while ($row = $result->fetch_assoc()) {
        ?>
        <p>
            <?php echo $row["hotelID"] ?> - <?php echo $row["hotelname"] ?>
        </p>
        <?php
    }
    ?>
</div>


<div class="page-info">
    Showing <?php echo $page + 1 ?> of <?php echo $pages ?> pages
</div>

<div class="pagination">
    <a href="?page-nr=1">First</a>
    <?php
        if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
            ?>
                <a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
            <?php
        }else{
            ?>
                <a>Previous</a>
            <?php
        }
    ?>
    <div class="page-number">
        <?php
            for($counter = 1; $counter <= $pages; $counter++){
                ?>
                    <a href="?page-nr=<?php echo $counter ?>"><?php echo $counter ?></a>
                <?php
            }
        ?>
    </div>
    <?php
        if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pages){
            ?>
                <a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
            <?php
        }else{
            ?>
                <a>Next</a>
            <?php
        }
    ?>
    <a href="?page-nr=<?php echo $pages ?>">Last</a>
</div>

<script>
    let links = document.querySelectorAll('.page-number > a');
    let bodyId = parseInt(document.body.id) - 1;
    links[bodyId].classList.add("active");
</script>

</body>
</html>


