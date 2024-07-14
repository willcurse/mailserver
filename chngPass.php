<?php

include_once('connection.php');
error_reporting(1);
$err = "";

if(isset($_SESSION['sid'])) {
    $id = $_SESSION['sid'];
} else {
    header('Location: index.php');
    exit;
}

if(isset($_POST['chngP'])) {
    $op = $_POST['op'];
    $np = $_POST['np'];
    $cp = $_POST['cp'];

    if($op == "" || $np == "" || $cp == "") {
        $err = "Fill all the fields first";
    } else {
        $sql = "SELECT * FROM userinfo WHERE user_name ='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['password'] == $op) {
            if($np == $cp) {
                $sql = "UPDATE userinfo SET password='$np' WHERE user_name='$id'";
                $result = mysqli_query($conn, $sql);
                echo "Password updated...";
            } else {
                $err = "New password doesn't match the confirm password";
            }
        } else {
            $err = "Wrong old password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    form {
      width: 100%;
      max-width: 400px; /* Limit form width for better readability */
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      font-weight: bold;
    }

    input[type="password"] {
      width: calc(100% - 22px);
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <form method="post">
    <h1>Change Password</h1>
    <label for="op">Old Password:</label>
    <input type="password" id="op" name="op" required><br>
    <label for="np">New Password:</label>
    <input type="password" id="np" name="np" required><br>
    <label for="cp">Confirm Password:</label>
    <input type="password" id="cp" name="cp" required><br>
    <input type="submit" name="chngP" value="Change Password">
    <p class="error-message"><?php echo $err; ?></p>
  </form>
</body>
</html>
