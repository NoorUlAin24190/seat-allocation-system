<?php
// 1. Connect to DB (updated DB name)
$conn = new mysqli("localhost", "root", "", "seat_allocation");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Get form data
$department_input = $_POST['department'];
$semester_input = $_POST['semester'];
$room = $_POST['room_number'];
$total_seats = intval($_POST['total_seats']);

// 👇 Add this check below it
$check_sql = "SELECT COUNT(*) as total FROM std_Seatallocation 
              WHERE department='$department_input' AND semester='$semester_input' AND room_number='$room'";
$check_result = $conn->query($check_sql);
$check_data = $check_result->fetch_assoc();

if ($check_data['total'] > 0) {
    echo "<script>alert('❌ Room $room is already allocated for $department - Semester $semester_num!'); window.location.href='addseat.php';</script>";
    exit();
}


// 3. Map Department name to DB enum value
$dept_map = [
    'Computer Science' => 'CS',
    'Information Technology' => 'IT',
    'Software Engineering' => 'SE'
];
$department = isset($dept_map[$department_input]) ? $dept_map[$department_input] : 'CS';

// 4. Convert semester (e.g. "1st") to number
$semester_num = intval($semester_input);

// 5. Fetch students from student_info (same DB now)
$fetch_sql = "SELECT roll_No FROM student_info WHERE Department='$department' AND Semester='$semester_num' ORDER BY roll_No ASC LIMIT $total_seats";
$result = $conn->query($fetch_sql);

// 6. Insert seat allocations
$seat_counter = 1;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $roll = $row['roll_No'];
        $insert_sql = "INSERT INTO std_Seatallocation (department, semester, room_number, roll_No, STATUS) 
                       VALUES ('$department', '$semester_num', '$room', '$roll', 'Allocated')";
        $conn->query($insert_sql);
        $seat_counter++;
    }
}

// Insert remaining empty seats if students are less than total seats
for (; $seat_counter <= $total_seats; $seat_counter++) {
    $insert_sql = "INSERT INTO std_Seatallocation (department, semester, room_number, roll_No, STATUS) 
                   VALUES ('$department', '$semester_num', '$room', NULL, 'Allocated')";
    $conn->query($insert_sql);
}

?>

<!-- HTML DISPLAY SAME AS BEFORE -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seat Allocation Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .seat {
            width: 100px;
            height: 80px;
            margin: 5px;
            padding: 10px;
            border-radius: 8px;
            color: white;
            text-align: center;
            font-weight: bold;
            display: inline-block;
        }
        .allocated {
            background-color: #28a745;
        }
        .available {
            background-color: #ffc107;
            color: black;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Seat Allocation for Room <?php echo htmlspecialchars($room); ?> - Semester <?php echo htmlspecialchars($semester_num); ?></h2>
    <div>
        <?php
        // Fetch back from std_Seatallocation for this room/semester
        $result_display = $conn->query("SELECT * FROM std_Seatallocation 
                                        WHERE department='$department' AND semester='$semester_num' 
                                        AND room_number='$room' ORDER BY id ASC");
        $seatNo = 1;
        while ($row = $result_display->fetch_assoc()) {
            $roll = $row['roll_No'];
            if ($roll) {
                echo "<div class='seat allocated'>Seat $seatNo<br>Roll#: " . htmlspecialchars($roll) . "</div>";
            } else {
                echo "<div class='seat available'>Seat $seatNo<br>Empty</div>";
            }
            $seatNo++;
        }
        ?>
    </div>
    <a href="addseat.php" class="btn btn-primary mt-4">Back to Allocation Form</a>
</div>
</body>
</html>
