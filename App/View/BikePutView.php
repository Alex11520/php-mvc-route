<?php
    $bikeName = $_GET['bike_name'];
    $updatedPrice = $_GET['bike_price'];

    echo '<p>';
    echo 'The price of ' . $bikeName . ' has been changed to ' . $updatedPrice;
    echo '</p>';


