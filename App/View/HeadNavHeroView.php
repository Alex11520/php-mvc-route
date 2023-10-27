<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>

    <style>
        nav {
            width: 100dvw;
        }

        .nav {
            display: flex;
            justify-content: space-between;
        }
        .hero {
            /*background-image: url(*/<?php //echo $imgUrl; ?>/*);*/
            background-image: url("https://github.com/Alex11520/img/blob/main/img/bike-1.png?raw=true");
            background-size: cover;
            z-index: 10;
        }
        .banner {
            width: 100dvw;
        }
        .banner img {
            width: 100%;
        }

    </style>

</head>
<body>
<header>
    <nav>
        <div class="nav">
            <h3>Bikes</h3> <h3>Scooters</h3> <h3>Apparel</h3> <h3>Component</h3> <h3>Service</h3> <h3>Accessory</h3>
        </div>
        <div class="banner">
            <img src="<?php echo $imgUrl; ?>" alt="bike banner">
        </div>
    </nav>
    <div class="hero">
        <h1><?php $pageName ?></h1>
    </div>
</header>