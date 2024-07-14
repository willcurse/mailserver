<?php
session_start(); // Start the session at the beginning of the script
error_reporting(1);
include_once('connection.php');

if(isset($_POST['signIn'])) {
	if($_POST['id'] == "" || $_POST['pwd'] == "") {
		$err = "Fill your ID and password first";
	} else {
		
		$username = $_POST['id'];
		if (strpos($username, '@yumail.com') === false) {
			$err = "Username must include @yumail.com";
		} else {
			
			$username = str_replace('@yumail.com', '', $username);
			
			$query = "SELECT * FROM userinfo WHERE user_name='$username'";
			$result = mysqli_query($conn, $query);

			if(!$result || mysqli_num_rows($result) == 0) {
				$err = "Invalid ID or password";
			} else {
				$row = mysqli_fetch_assoc($result);
				$fid = $row['user_name'];
				$fpass = $row['password'];

				if($fid == $username && $fpass == $_POST['pwd']) {
					$_SESSION['sid'] = $username; 
					header('Location: HomePage.php');
					exit(); 
				} else {
					$err = "Invalid ID or password";
				}
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - My Mail Server</title>
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
    .disp{color:black}
</style>
</head>

<body>
<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">My Mail Server</h1>
        <nav class="header-nav">
            <a href="index.php"><img src='./images/home.png'>Home</a>
            <a href="index.php?chk=about">About Us</a>
            <a href="index.php?chk=contact">Contact Us</a>
        </nav>
    </div>
</header>

<main class="container py-4">
    <div class="jumbotron bg-body-tertiary rounded-3 position-relative">
        <div class="container-fluid py-5 text-center text-white position-relative">
            <h1 class="display-5 fw-bold disp">Login to <span class="color-blue">My Mail Server</span></h1>
            <p class="col-md-8 mx-auto fs-4 disp">Sign in to access your emails and enjoy our secure and reliable service.</p>
        </div>
    </div>

    <div class="container py-4">
        <div class="bg-light p-4 rounded-3">
            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Enter your Email</label>
                    <input type="text" class="form-control" id="email" name="id" placeholder="username@yumail.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter your password</label>
                    <input type="password" class="form-control" id="password" name="pwd" required>
                </div>
                <button type="submit" class="btn btn-primary" name="signIn">Sign In</button>
                <a href="registraion.php?chk=registration" class="ms-3">Sign Up</a>
            </form>
            <div class="mt-3">
                <font color="#FF0000"><?php echo @$err; ?></font>
            </div>
        </div>
    </div>
</main>

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
