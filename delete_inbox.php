<?php
include_once('connection.php');

if (isset($_POST['delete']) && isset($_POST['ch'])) {
    $mailIds = $_POST['ch']; 


    $placeholders = implode(',', array_fill(0, count($mailIds), '?'));

  
    $sql = "DELETE FROM usermail WHERE mail_id IN ($placeholders)";


    $stmt = $conn->prepare($sql);

    foreach ($mailIds as $key => $value) {
        $stmt->bind_param('i', $value); 
    }


    if ($stmt->execute()) {
       
        $stmt->close();
        
      
        $conn->close();

    
        header('Location: HomePage.php');
        exit(); 
    } else {
        echo "Error deleting messages: " . $stmt->error;
    }
} else {
    echo "No messages selected for deletion.";
}

// Close the database connection
$conn->close();
?>
