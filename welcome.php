<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <div class="container mt-3">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome <?php echo $_SESSION['username']; ?> !</h4>
            <p>
                Welcome to iSecure! 🔒
                Your ultimate security companion for a safer digital experience.

                At iSecure, we blend cutting-edge technology with robust security measures to keep you protected at all times. Your trust is our priority, and we strive to provide a seamless, secure, and hassle-free experience.

                Stay secure, stay ahead! 🚀
            </p>
            <hr>
            <p class="mb-0">Your security is our mission—stay protected, stay empowered with iSecure.</p>
        </div>

        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="/images/img2.jpg" class="d-block w-100 carousel-img" alt="Image 1">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/images/img4.jpg" class="d-block w-100 carousel-img" alt="Image 2">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="/images/img3.jpg" class="d-block w-100 carousel-img" alt="Image 3">
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- CSS to Set Image Height (60vh on Large Screens) -->
        <style>
            .carousel-img {
                height: 60vh;
                object-fit: cover;
            }
        </style>










        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>