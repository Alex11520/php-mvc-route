<?php
$pageName = "Price change";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
// Retrieve the bike name from the URL's query parameters.
$bikeName = $_GET['bike_name'];

// Retrieve the updated price from the URL's query parameters.
$updatedPrice = $_GET['bike_price'];

// Start the output of a paragraph.
echo '<p>';

// Concatenate and display the message indicating that the bike's price has been updated.
echo 'The price of ' . $bikeName . ' has been changed to ' . $updatedPrice;

// End the paragraph.
echo '</p>';

