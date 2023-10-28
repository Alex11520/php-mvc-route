<?php
if(isset($bike)){
    echo '<p>New Bike Added Successfully: </p>';
    echo '<p>Bike Id: '. $bike->bike_id . '</p>';
    echo '<p>Bike Name: '. $bike->bike_name . '</p>';
    echo '<p>Bike Price: '. $bike->bike_price . '</p>';
} else {
    require_once __DIR__ . '/ErrorPage.php';
}



