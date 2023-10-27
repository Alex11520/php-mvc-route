<?php
if(isset($bike))
echo '<p>';
echo 'New Bike Added Successfully: ' . PHP_EOL;
echo 'Bike Id: '. $bike->bike_id . PHP_EOL;
echo 'Bike Name: '. $bike->bike_name . PHP_EOL;
echo 'Bike Price: '. $bike->bike_price . PHP_EOL;

echo '</p>';