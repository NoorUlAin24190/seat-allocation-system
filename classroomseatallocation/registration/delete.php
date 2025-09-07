<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM student_info WHERE id = $id";

if ($conn->query($sql)) {
    echo "<script>alert('Record deleted successfully'); window.location.href='view.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
