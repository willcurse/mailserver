<?php
include_once('connection.php');
session_start(); // Ensure session is started
error_reporting(E_ALL); // Enable full error reporting for debugging

$y = $_POST['y'] ?? '';
$m = $_POST['m'] ?? '';
$d = $_POST['d'] ?? '';
$dob = $y . "-" . $m . "-" . $d;
$ch = isset($_POST['ch']) ? $_POST['ch'] : array();
$imgpath = $_FILES['file']['name'] ?? '';
$un = $_POST['un'] ?? '';
$hobbies = implode(',', $ch);

if (isset($_POST['reg'])) {
    if ($_POST['un'] == "" || $_POST['pwd'] == "") {
        $err = "Please fill your username and password.";
    } else {
        $query = "SELECT * FROM userinfo WHERE user_name='{$_POST['un']}'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $err = "User already exists, please choose another username.";
        } else {
            $insert_query = "INSERT INTO userinfo VALUES ('', '{$_POST['un']}', '{$_POST['pwd']}', '{$_POST['mob']}', '{$_POST['eid']}', '{$_POST['gen']}', '$hobbies', '$dob', '$imgpath')";
            if (mysqli_query($conn, $insert_query)) {
                mkdir("userImages/$un");
                move_uploaded_file($_FILES["file"]["tmp_name"], "userImages/$un/" . $_FILES["file"]["name"]);
                $_SESSION['sname'] = $_POST['un'];
                echo "<script>window.location='welcome.php?chk=5'</script>";
            } else {
                $err = "Error in registration. Please try again.";
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
<title>Registration Form</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    .error-message { color: red; }
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

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <h2 class="text-center mb-4">User Registration</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Enter Your User Name</label>
                    <input type="text" class="form-control" id="username" name="un" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter Your Password</label>
                    <input type="password" class="form-control" id="password" name="pwd" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Select Your Gender</label>
                    <div>
                        <input type="radio" id="male" name="gen" value="m">
                        <label for="male">Male</label>
                    </div>
                    <div>
                        <input type="radio" id="female" name="gen" value="f">
                        <label for="female">Female</label>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="checkbox" id="terms" name="checklist" required>
                    <label for="terms">I accept terms & conditions</label>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" name="reg" value="Register">
                    <input type="reset" class="btn btn-secondary" value="Reset">
                </div>
            </form>
            <?php if(isset($err)) { echo "<p class='error-message'>$err</p>"; } ?>
        </div>
    </div>
</div>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NN
</body>
</html>