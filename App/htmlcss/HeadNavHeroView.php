<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageName; ?></title>

    <style>
        header {
            position: relative;
        }
        nav {
            width: 100dvw;
        }

        .nav {
            display: flex;
            justify-content: space-between;
        }

        .banner {
            width: 100dvw;
            position: relative;
        }
        .banner img {
            width: 100%;
            position: relative;
        }
        .hero {
            position: absolute;
            top: 100px;
            left: 800px;
            z-index: 99;
            width: 100%;
            height: 100%;
        }
        .hero h1 {
            position: absolute;
            width: 100%;
            height: 100%;
            font-size: 120px;
            color: floralwhite;
        }

    </style>

</head>
<body>
<header>
    <nav>

        <div class="banner">
            <img src="<?php echo $imgUrl; ?>" alt="bike banner">
        </div>
    </nav>
    <div class="hero">
        <h1>
            <?php echo $pageName ?>
        </h1>
    </div>
</header>