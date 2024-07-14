<?php
session_start();
$id = $_SESSION['sid'];
include_once('connection.php');

if (isset($_POST['delete'])) {
    foreach ($_POST['ch'] as $v) {
        $sql = "SELECT * FROM usermail WHERE rec_id=? AND mail_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $id, $v);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($dd = $result->fetch_assoc()) {
            $rec = $dd['rec_id'];
            $sen = $dd['sen_id'];
            $sub = $dd['sub'];
            $msg = $dd['msg'];
            $att = $dd['attachment'];

            // Store into trash table
            $insert_sql = "INSERT INTO trash (rec_id, sen_id, sub, msg, attachment, date) VALUES (?, ?, ?, ?, ?, NOW())";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sssss", $rec, $sen, $sub, $msg, $att);
            $insert_stmt->execute();

            // Delete from inbox
            $delete_sql = "DELETE FROM usermail WHERE rec_id=? AND mail_id=?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("ss", $id, $v);
            $delete_stmt->execute();
        }
    }
    echo "<script>alert('Message(s) deleted');window.location='HomePage.php?chk=inbox'</script>";
}
?>
