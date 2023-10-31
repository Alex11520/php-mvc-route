<?php
$pageName = "create bike";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
?>
<!-- Container div for the form -->
<div>
    <!-- Heading for the form -->
    <h2>Add a new bike</h2>

    <!-- Form definition, specifying the action URL and HTTP method -->
    <form id="bikeCreateForm" action="/crud/bike/post" method="POST">

        <!-- Label and input field for the bike's name -->
        <label>
            <!-- Text input to capture the bike's name -->
            <input type="text" placeholder="bike name" name="bike_name" />
        </label>

        <!-- Label and input field for the bike's price -->
        <label>
            <!-- Number input to capture the bike's price -->
            <input type="number" placeholder="bike price" name="bike_price" />
        </label>

        <!-- Submit button to send the form data -->
        <input type="submit" value="Submit" />
    </form>
</div>

