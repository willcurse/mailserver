<?php
include_once('connection.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['sid'])) {
    header('Location: index.php');
    exit();
}

$id = $_SESSION['sid'];

if (isset($_POST['send'])) {
    $to = $_POST['to'] ?? '';
    $sub = $_POST['sub'] ?? '';
    $msg = $_POST['msg'] ?? '';
    $file = $_FILES['file']['name'] ?? '';

    if ($to == "" || $sub == "" || $msg == "") {
        $err = "Fill the related data first";
    } else {
        $stmt = $conn->prepare("SELECT * FROM userinfo WHERE user_name = ?");
        $stmt->bind_param("s", $to);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;
        
        if ($count == 1) { // Ensure recipient exists
            if (isset($_FILES['file']['name']) && $_FILES['file']['name'] != "") {
                $file_name = basename($_FILES['file']['name']);
                $file_tmp = $_FILES['file']['tmp_name'];
                
                
                $upload_dir = __DIR__ . '/uploads/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0755, true);
                }
                $file_path = $upload_dir . $file_name;

                if (move_uploaded_file($file_tmp, $file_path)) {
                    $stmt = $conn->prepare("INSERT INTO usermail (rec_id, sen_id, sub, msg, attachment, recDT) VALUES (?, ?, ?, ?, ?, NOW())");
                    $stmt->bind_param("sssss", $to, $id, $sub, $msg, $file_name); 
                    $stmt->execute();
                    $err = "message send....";
                } else {
                    $err = "Failed to upload attachment.";
                }
            } else {
                // Handle case where no attachment is uploaded
                $stmt = $conn->prepare("INSERT INTO usermail (rec_id, sen_id, sub, msg, recDT) VALUES (?, ?, ?, ?, NOW())");
                $stmt->bind_param("ssss", $to, $id, $sub, $msg);
                $stmt->execute();
                $err = "Message sent...";
            }
        } else {
            $err = "Recipient does not exist.";
        }
    }
} elseif (isset($_POST['save'])) {
    $sub = $_POST['sub'] ?? '';
    $msg = $_POST['msg'] ?? '';
    $file = $_FILES['file']['name'] ?? '';

    if ($sub == "" || $msg == "") {
        $err = "<font color='red'>Fill subject and message first</font>";
    } else {
        $stmt = $conn->prepare("INSERT INTO draft (user_id, sub, attach, msg, date) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $id, $sub, $file, $msg);        
        $stmt->execute();
        $err = "Message saved...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gmail Compose</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 600px;
        margin: auto;
        padding: 20px;
    }
    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"],
    input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }
    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="to" class="form-label">To</label>
            <input type="text" class="form-control" id="to" name="to" required>
        </div>
        <div class="mb-3">
            <label for="cc" class="form-label">Cc</label>
            <input type="text" class="form-control" id="cc" name="cc">
        </div>
        <div class="mb-3">
            <label for="sub" class="form-label">Subject</label>
            <input type="text" class="form-control" id="sub" name="sub" required>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Upload your file</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>
        <div class="mb-3">
            <label for="msg" class="form-label">Message</label>
            <textarea class="form-control" id="msg" name="msg" rows="8" required></textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" name="send" value="Send">
            <input type="submit" class="btn btn-secondary" name="save" value="Save">
            <input type="reset" class="btn btn-danger" value="Cancel">
        </div>
    </form>
</div>
</body>
</html>
