<?php
//if(isset($bike) && $bike->bike_id != ''){
//    echo '<p>';
//    echo 'Search result: ' . PHP_EOL;
//    echo 'Bike Id: '. $bike->bike_id . PHP_EOL;
//    echo 'Bike Name: '. $bike->bike_name . PHP_EOL;
//    echo 'Bike Price: '. $bike->bike_price . PHP_EOL;
//
//    echo '</p>';
//} else {
//    require_once __DIR__ . '/ErrorPage.php';
//}
if(isset($bike)) {
    echo '<p>';
    echo 'Search result: ' . PHP_EOL;
    echo 'Bike Id: ' . $bike->bike_id . PHP_EOL;
    echo 'Bike Name: ' . $bike->bike_name . PHP_EOL;
    echo 'Bike Price: ' . $bike->bike_price . PHP_EOL;
    echo '</p>';
}

