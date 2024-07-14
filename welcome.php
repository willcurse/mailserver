<?php 
session_start();
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Mail Server</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
<style>
    .header-nav a:hover { color: #00FF66; }
    .header-nav a { font-size: 18px; margin: 0 10px; color: #fff; }
    .header-nav a img { vertical-align: middle; width: 30px; height: 30px; margin-right: 5px; }
    .jumbotron { position: relative; }
    .jumbotron video { object-fit: cover; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; }
    .content { padding: 20px; }
    footer { text-align: center; padding: 10px 0; }
    .marquee { padding: 10px; background-color: #f8f9fa; border-radius: 5px; }
</style>

</head>

<body>
<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">My Mail Server</h1>
        <nav class="header-nav">
            <a href="index.php"><img src='./images/home.png'>Home</a>
            <a href="index.php?chk=about">About Us</a>
            <a href="index.php?chk=login">Login</a>
            <a href="index.php?chk=registraion">New User?</a>
            <a href="index.php?chk=contact">Contact Us</a>
        </nav>
    </div>
</header>

<main class="container py-4">
    



    <div class="container py-4">
        <div class="bg-body-tertiary p-4 rounded-3">
            <h3>Welcome 
            <?php
                if (isset($_SESSION['sname'])) {
                    echo $_SESSION['sname'];
                } else {
                    echo "Guest";
                }
            ?>
            </h3>
            <br>
            <p>Your account has been created. To access your account, <a href="login.php?chk=login">Click here</a>.</p>
            <br>
            <h3>Email: <?php echo $_SESSION['sname'] ?? ''; ?>@yumail.com</h3>
            <br><br>
            <p>**Remember your Email as it is the key to access the mail server**</p>
        </div>
    </div>
</main>

<aside class="container py-4">
    <div class="marquee">
        <marquee direction="up" behavior="alternate" onmouseover="stop()" onmouseout="start()">
            <a href="index.php?chk=7">Latest Updates</a>
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

<script 
src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
 crossorigin="anonymous"></script>

</body>
</html>
