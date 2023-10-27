<?php
if(isset($bike))
    echo '<p>';
    echo 'The price of ' . $bike->bike_id . 'has been changed to ' . $bike->bike_price;
    echo '</p>';