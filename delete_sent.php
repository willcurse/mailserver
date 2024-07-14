<?php
include_once('connection.php');

if (isset($_POST['delete']) && isset($_POST['ch'])) {
    $mailIds = $_POST['ch']; // Array of selected mail IDs to delete

    // Prepare a placeholder for each mail ID
    $placeholders = implode(',', array_fill(0, count($mailIds), '?'));

    // SQL statement to delete messages with the selected IDs
    $sql = "DELETE FROM usermail WHERE mail_id IN ($placeholders)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    foreach ($mailIds as $key => $value) {
        $stmt->bind_param('i', $value); // Assuming mail_id is an integer
    }

    // Execute the statement
    if ($stmt->execute()) {
        // Close the statement
        $stmt->close();
        
        // Close the database connection
        $conn->close();

        // Redirect back to the home page
        header('Location: HomePage.php');
        exit(); // Make sure to exit after redirection
    } else {
        echo "Error deleting messages: " . $stmt->error;
    }
} else {
    echo "No messages selected for deletion.";
}

// Close the database connection
$conn->close();
?>
