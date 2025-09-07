<?php
$conn = new mysqli("localhost", "root", "", "seat_allocation");

// check if id is given
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // safe integer cast

    // use prepared statement for safety
    $stmt = $conn->prepare("DELETE FROM std_Seatallocation WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$conn->close();

// redirect back to the list
header("Location: view_seats.php");
exit();
?>
