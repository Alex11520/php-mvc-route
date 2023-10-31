<?php
$pageName = "search bike";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
?>

<!-- Begin a container for the bike search functionality -->
<div>
    <!-- Display a header indicating the purpose of this section -->
    <h2>Search a bike</h2>

    <!-- Begin a form for searching a bike by its ID -->
    <form id="bikeReadForm" action="/crud/bike/get" method="GET">
        <!-- A label wraps the input field for better accessibility -->
        <label>
            <!-- Input field to enter a bike's ID.
                 When submitted, the entered value is passed as a query parameter named 'bike_id' in the URL -->
            <input type="number" placeholder="bike id" name="bike_id" />
        </label>

        <!-- Submit button for the form. When clicked, the form data is sent to the specified action URL -->
        <input type="submit" value="Submit" />
    </form>
</div>
