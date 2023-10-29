<?php
// Check if the $bike object is set(from the Post function in BikeController)
if (isset($bike)) {
    // Output a message indicating successful addition of a new bike
    echo '<p>New Bike Added Successfully: </p>';

    // Display the Bike ID from the $bike object in a new paragraph
    echo '<p>Bike Id: '. $bike->bike_id . '</p>';

    // Display the Bike Name from the $bike object in a new paragraph
    echo '<p>Bike Name: '. $bike->bike_name . '</p>';

    // Display the Bike Price from the $bike object in a new paragraph
    echo '<p>Bike Price: '. $bike->bike_price . '</p>';
} else {
    // If $bike is not set, load the error page
    require_once __DIR__ . '/ErrorPage.php';
}




