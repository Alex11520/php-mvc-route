<?php
namespace App\View;

$pageName = "bike";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . "/HeadNavHeroView.php";
if(isset($dbBike)){
 [$dbBike, 'hello']("test");
}
?>

<div>
    <h2>Add a new bike</h2>
    <form id="bikeForm" action= "/crud/bike/create" method="POST" >
        <label>
            <input type="text" placeholder="bike name" name="bike_name" />
        </label>
        <label>
            <input type="number" placeholder="bike price" name="bike_price" />
        </label>
        <input type="submit" value="Submit" />
    </form>
</div>

<div>
    <h2>Display all bikes</h2>

</div>


</body>
</html>

