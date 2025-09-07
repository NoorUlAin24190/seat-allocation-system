<?php
$conn = new mysqli("localhost", "root", "", "seat_allocation");
$result = $conn->query("SELECT * FROM std_Seatallocation ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Allocated Seats</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <h3 class="text-center mb-4">Allocated Seats List</h3>
  <table class="table table-bordered text-center">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Department</th>
        <th>Semester</th>
        <th>Room</th>
        <th>Roll No</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['department'] ?></td>
          <td><?= $row['semester'] ?></td>
          <td><?= $row['room_number'] ?></td>
          <td><?= $row['roll_No'] ?? 'Empty' ?></td>
          <td><?= $row['STATUS'] ?></td>
          <td>
            <a href="edit_seat.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="deleteseat.php?id=<?= $row['id'] ?>" 
   class="btn btn-danger btn-sm" 
   onclick="return confirm('Delete this seat?')">Delete</a>

          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
