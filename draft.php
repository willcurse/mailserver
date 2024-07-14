<?php
// Include database connection
include_once('connection.php');

// Check if session 'sid' is set
if (!isset($_SESSION['sid'])) {
    // Redirect to login page if not logged in
    header('Location: index.php');
    exit();
}

$id = $_SESSION['sid'];

$sql = "SELECT * FROM draft WHERE user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);

// Execute the query and check for errors
if (!$stmt->execute()) {
    // Query execution failed, print error message
    echo "Error: " . $stmt->error;
} else {
    // Query executed successfully
    $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drafts</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        .drafts-table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 80%;
        }

        .drafts-table th, .drafts-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .drafts-table th {
            background-color: #f2f2f2;
        }

        .drafts-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .drafts-table tr:hover {
            background-color: #ddd;
        }

        .attachment-link {
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="mb-3">Drafts</h2>
    <table class="drafts-table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Attachment</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['sub']) . "</td>";
                echo "<td>";
                // Check if attachment exists
                if (!empty($row['attach'])) {
                    // Display attachment as a link
                    echo "<a href='" . htmlspecialchars($row['attach']) . "' class='attachment-link'>" . htmlspecialchars($row['attach']) . "</a>";
                } else {
                    // No attachment
                    echo "No attachment";
                }
                echo "</td>";
                echo "<td>" . htmlspecialchars($row['msg']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
