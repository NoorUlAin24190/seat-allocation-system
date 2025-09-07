<?php
$conn = new mysqli("localhost", "root", "", "seat_allocation");
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM std_Seatallocation WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Seat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-warning text-white text-center">
      <h4>Edit Seat Allocation</h4>
    </div>
    <div class="card-body">
      <form method="post" action="update_seat.php">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="mb-3">
          <label>Roll No</label>
          <input type="text" name="roll_No" value="<?= $row['roll_No'] ?>" class="form-control">
        </div>

        <div class="mb-3">
          <label>Status</label>
          <select name="STATUS" class="form-select">
            <option value="Allocated" <?= $row['STATUS'] == 'Allocated' ? 'selected' : '' ?>>Allocated</option>
            <option value="Available" <?= $row['STATUS'] == 'Available' ? 'selected' : '' ?>>Available</option>
          </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
