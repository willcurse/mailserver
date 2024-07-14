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

$sql = "SELECT * FROM usermail WHERE rec_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

if (!$stmt->execute()) {
    echo "Error executing SQL query: " . $stmt->error;
    exit();
}

$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <style>
        .inbox-table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 80%;
        }

        .inbox-table th, .inbox-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .inbox-table th {
            background-color: #f2f2f2;
        }

        .inbox-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .inbox-table tr:hover {
            background-color: #ddd;
        }

        .delete-btn {
            padding: 8px 16px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">Inbox</h2>
    <form method='POST' action='delete_inbox.php'>
        <table class="inbox-table">
            <thead>
                <tr>
                    <th>Check</th>
                    <th>Sender</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Attachments</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='ch[]' value='" . $row['mail_id'] . "'/></td>";
                    echo "<td>" . htmlspecialchars($row['sen_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sub']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['msg']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['recDT']) . "</td>";
                  
                    // Display attachment download link
                    $attachment_path = $row['attachment'];
                    if (!empty($attachment_path)) {
                        echo "<td><a href='uploads/$attachment_path' download>Download</a></td>";
                    } else {
                        echo "<td>No Attachment</td>";
                    }
                  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <input type='submit' value='Delete' name='delete' class="delete-btn mt-3"/>
    </form>
</div>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
