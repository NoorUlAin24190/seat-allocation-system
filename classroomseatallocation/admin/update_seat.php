<?php
$conn = new mysqli("localhost", "root", "", "seat_allocation");

$id = $_POST['id'];
$roll_No = $_POST['roll_No'];
$status = $_POST['STATUS'];

$sql = "UPDATE std_Seatallocation SET roll_No='$roll_No', STATUS='$status' WHERE id=$id";

if ($conn->query($sql)) {
    header("Location: view_seats.php");
} else {
    echo "Update failed: " . $conn->error;
}
?>
