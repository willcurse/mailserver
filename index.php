<?php session_start();
error_reporting(1);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Mail Server</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .header-nav a:hover { color: #00FF66; }
    .header-nav a { font-size: 18px; margin: 0 10px; color: #fff; }
    .header-nav a img { vertical-align: middle; width: 30px; height: 30px; margin-right: 5px; }
    .jumbotron { position: relative; }
    .jumbotron video { object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
    .content { padding: 20px; }
    footer { text-align: center; padding: 10px 0; }
    .marquee { padding: 10px; background-color: #f8f9fa; border-radius: 5px; }
    .disp {color:black}
</style>

</head>

<body>
<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">yumail</h1>
        <nav class="header-nav">
		<a href="aboutus.php?chk=about">ABOUT US</a>
		
		<a href="contactus.php?chk=contact">CONTACT US</a>
        </nav>
    </div>
</header>

<main class="container py-4">
    <div class="jumbotron bg-body-tertiary rounded-3 position-relative">
        <video class="w-100 h-100" autoplay muted loop>
            <source src="videoemail.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="container-fluid py-5 text-center text-white position-relative">
            <h1 class="display-5 fw-bold disp">Welcome to <span class="color-blue">yumail</span></h1>
            <p class="col-md-8 mx-auto fs-4 disp">Experience the future of email with our innovative service. Fast, secure, and user-friendly.</p>
        </div>
    </div>

    <div class="row align-items-md-stretch mb-4">
        <div class="col-md-6">
            <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2>Secure and Reliable</h2>
                <p>Our email service uses top-notch security protocols to ensure your emails are always safe and accessible.</p>
                <a href="login.php"><button class="btn btn-outline-light" type="button">Login</button></a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                <h2>Easy to Use</h2>
                <p>With a simple and intuitive interface, managing your emails has never been easier. Sign up today and see the difference.</p>
                <a href="registraion.php"> <button class="btn btn-outline-secondary" type="button">Sign Up Now</button></a>
            </div>
        </div>
    </div>


</main>

<aside class="container py-4">
    <div class="marquee">
        <marquee direction="up" behavior="alternate" onmouseover="stop()" onmouseout="start()">
            <a href="latestupdDisp.php?chk=7">Latest Updates</a>
        </marquee>
    </div>
</aside>

<footer class="bg-light text-center py-3">
    <p>&copy; 2024 My Mail Server</p>
    <div>
        <a href="#" class="text-body-secondary">Privacy Policy</a> | 
        <a href="#" class="text-body-secondary">Terms of Service</a>
    </div>
</footer>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
