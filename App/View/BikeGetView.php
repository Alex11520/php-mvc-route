<?php
// Check if the $bike object is set, i.e., if search results are available
if (isset($bike)) {
    // Start a paragraph tag for formatting
    echo '<p>';

    // Output the heading text for the search result
    echo 'Search result: ' . PHP_EOL;

    // Display the Bike ID from the $bike object
    echo 'Bike Id: ' . $bike->bike_id . PHP_EOL;

    // Display the Bike Name from the $bike object
    echo 'Bike Name: ' . $bike->bike_name . PHP_EOL;

    // Display the Bike Price from the $bike object
    echo 'Bike Price: ' . $bike->bike_price . PHP_EOL;

    // Close the paragraph tag
    echo '</p>';
}
