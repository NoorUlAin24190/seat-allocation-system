<?php
$conn = new mysqli("localhost", "root", "", "seat_allocation");

// Get values from the form safely
$roll = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$department_input = isset($_GET['department']) ? $_GET['department'] : ''; // ✅ DEFINE THIS
$semester = isset($_GET['semester']) ? $_GET['semester'] : '';
$course = isset($_GET['course']) ? $_GET['course'] : '';

// Department mapping (optional)
$dept_map = [
    'Computer Science' => 'CS',
    'Information Technology' => 'IT',
    'Software Engineering' => 'SE'
];

$department = isset($dept_map[$department_input]) ? $dept_map[$department_input] : $department_input;


// Prepare the SQL query
$sql = "SELECT * FROM std_Seatallocation 
        WHERE LOWER(roll_No) = '$roll' 
        AND department = '$department' 
        AND semester = '$semester'";


// Run the query
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();

    echo "
    <div style='
      background: #e6fff2;
      border-left: 5px solid #28a745;
      border-radius: 10px;
      padding: 30px;
      margin-top: 40px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      animation: slideIn 0.8s ease;
    '>
      <h2 style='color: #28a745; font-size: 28px;'>✅ Seat Found Successfully!</h2>
      <p style='font-size: 18px; margin-top: 10px;'><strong>🎓 Roll No:</strong> " . htmlspecialchars($data['roll_No']) . "</p>
      <p style='font-size: 18px;'><strong>🏫 Room Number:</strong> " . htmlspecialchars($data['room_number']) . "</p>
    </div>

    <style>
    @keyframes slideIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    </style>
    ";
}
 else {
    echo "
    <div style='text-align: center; padding: 40px;'>
      <img src='https://cdn-icons-png.flaticon.com/512/2748/2748558.png' alt='No Data' width='120' />
      <h2 style='color: #cc0000;'>Oops! No Seat Found 😢</h2>
      <p>Please check your details and try again.</p>
    </div>
    ";
}


?>
