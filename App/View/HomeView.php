<?php
$pageName = "Home Page";
$imgUrl = "https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true";
require_once __DIR__ . '/../htmlcss/HeadNavHeroView.php';
?>


<!-- Begin an unordered list which will hold navigation links -->
<ul>
    <!-- List item with a link to the "Create" functionality for bikes -->
    <li><a href="/crud/bike/create">Create</a></li>

    <!-- List item with a link to the "Read" functionality for bikes -->
    <li><a href="/crud/bike/read">Read</a></li>

    <!-- List item with a link to the "Update" functionality for bikes -->
    <li><a href="/crud/bike/update">Update</a></li>

    <!-- List item with a link to the "Delete" functionality for bikes -->
    <li><a href="/crud/bike/remove">Delete</a></li>

    <!-- List item with a link to display all bikes -->
    <li><a href="/crud/bike/display">Show All Bikes</a></li>
</ul>
