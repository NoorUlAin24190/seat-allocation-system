<?php
include 'db_connection.php';

$id = $_GET['id']; // Get student ID from URL
$sql = "SELECT * FROM student_info WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $FullName = $_POST['FullName'];
    $FatherName = $_POST['FatherName'];
    $username = $_POST['username'];
    $DateofBirth = $_POST['DateofBirth'];
    $Gender = $_POST['Gender'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];
    $Department = $_POST['Department'];
    $Semester = $_POST['Semester'];
    $PhoneNo = $_POST['PhoneNo'];

    $updateQuery = "UPDATE student_info SET 
        FullName='$FullName',
        FatherName='$FatherName',
        username='$username',
        DateofBirth='$DateofBirth',
        Gender='$Gender',
        Email='$Email',
        Address='$Address',
        Department='$Department',
        Semester='$Semester',
        PhoneNo='$PhoneNo'
        WHERE id=$id";

    if ($conn->query($updateQuery)) {
        echo "<script>alert('Student updated successfully!'); window.location.href='view.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Full Name</label>
            <input type="text" name="FullName" class="form-control" value="<?php echo $row['FullName']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Father Name</label>
            <input type="text" name="FatherName" class="form-control" value="<?php echo $row['FatherName']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Date of Birth</label>
            <input type="date" name="DateofBirth" class="form-control" value="<?php echo $row['DateofBirth']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Gender</label>
            <select name="Gender" class="form-control" required>
                <option value="Male" <?php if ($row['Gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($row['Gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="Email" class="form-control" value="<?php echo $row['Email']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="Address" class="form-control" value="<?php echo $row['Address']; ?>" required>
        </div>
        <div class="mb-3">
            <label>Department</label>
            <select name="Department" class="form-control" required>
                <option value="CS" <?php if ($row['Department'] == 'CS') echo 'selected'; ?>>CS</option>
                <option value="IT" <?php if ($row['Department'] == 'IT') echo 'selected'; ?>>IT</option>
                <option value="SE" <?php if ($row['Department'] == 'SE') echo 'selected'; ?>>SE</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Semester</label>
            <select name="Semester" class="form-control" required>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    $selected = ($row['Semester'] == $i) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <input type="text" name="PhoneNo" class="form-control" value="<?php echo $row['PhoneNo']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="view.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
