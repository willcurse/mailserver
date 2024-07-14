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

$sql = "SELECT * FROM usermail WHERE sen_id = ?";
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
    <title>Sent Messages</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .sent-table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 80%;
        }

        .sent-table th, .sent-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .sent-table th {
            background-color: #f2f2f2;
        }

        .sent-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .sent-table tr:hover {
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
    <h2 class="mb-3">Sent Messages</h2>
    <form method='POST' action='delete_sent.php'>
        <table class="sent-table">
            <thead>
                <tr>
                    <th>Check</th>
                    <th>Receiver</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Attachment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='ch[]' value='" . $row['mail_id'] . "'/></td>";
                    echo "<td>" . htmlspecialchars($row['rec_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['sub']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['msg']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['attachment']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['recDT']) . "</td>"; // Corrected column name for date
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
