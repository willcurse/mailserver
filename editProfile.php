<?php
error_reporting(1);
session_start();

// Check if the session variable is set
if (!isset($_SESSION['sid'])) {
    // Redirect the user to the login page if not logged in
    header('Location: index.php');
    exit();
}

$sid = $_SESSION['sid'];
include_once('connection.php');

// Prepare and execute the query using MySQLi
$query = "SELECT * FROM userinfo WHERE user_name=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $sid);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful
if ($result && $result->num_rows > 0) {
    // Fetch the user row
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 80px;
            max-height: 80px;
        }
    </style>
</head>
<body>
    <h2 align="center">Your Profile Information</h2>
    <table>
        <tr>
            <th>Your userId :</th>
            <td><?php echo $row['user_id']; ?></td>
        </tr>
        <tr>
            <th>Your username :</th>
            <td><?php echo $row['user_name']; ?></td>
        </tr>
        <tr>
            <th>Your Mobile :</th>
            <td><input type='text' name='mobile' value='<?php echo $row['mobile']; ?>' /></td>
        </tr>
        <tr>
            <th>Email :</th>
            <td><input type='text' name='email' value='<?php echo $row['email']; ?>' /></td>
        </tr>
        <tr>
            <th>Your gender is :</th>
            <td><?php echo $row['gender']; ?></td>
        </tr>
        <tr>
            <th>Your hobbies are :</th>
            <td><?php echo $row['hobbies']; ?></td>
        </tr>
        <tr>
            <th>Your DOB is :</th>
            <td><?php echo $row['dob']; ?></td>
        </tr>
        <tr>
            <th>Your Pics :</th>
            <td><img alt='image not upload' src='userImages/<?php echo $row['user_id']; ?>/<?php echo $row['file']; ?>' /></td>
        </tr>
    </table>
</body>
</html>

<?php
} else {
    // Handle the case where the user data could not be retrieved
    echo "Error: Failed to fetch user data.";
}

// Close the statement and the connection
$stmt->close();
$conn->close();
?>
