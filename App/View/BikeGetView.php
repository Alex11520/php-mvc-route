<?php
$pageName = "Search result";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
// Check if the $bike object is set(from the Get function in BikeController)
if (isset($bike)) {

    // Output the heading text for the search result
    echo '<p>Search result: <p>';

    // Display the Bike ID from the $bike object
    echo '<p>Bike Id: ' . $bike->bike_id . '</p>';

    // Display the Bike Name from the $bike object
    echo '<p>Bike Name: ' . $bike->bike_name . '</p>';

    // Display the Bike Price from the $bike object
    echo '<p>Bike Price: ' . $bike->bike_price . '</p>';
}
