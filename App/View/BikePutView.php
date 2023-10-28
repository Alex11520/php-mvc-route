<?php
    $bikeName = $_GET['bike_name'];
    $updatedPrice = $_GET['bike_price'];
//    if ($bikeName = 'err'){
//        require_once __DIR__ . '/ErrorPage.php';
//    } else {
//        echo '<p>';
//        echo 'The price of ' . $bikeName . ' has been changed to ' . $updatedPrice;
//        echo '</p>';
//    }
    echo '<p>';
    echo 'The price of ' . $bikeName . ' has been changed to ' . $updatedPrice;
    echo '</p>';


