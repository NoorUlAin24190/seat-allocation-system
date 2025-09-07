<?php
// Display errors for debugging (optional)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '<pre>';
  print_r($_POST); // Debug: Check if all values are coming from form
  echo '</pre>';

  $fullName = $_POST['fullName'];
  $fatherName = $_POST['fatherName'];
  $username = $_POST['username'];
  $passwords = $_POST['passwords'];
  $roll_no = $_POST['rollno'];
  $dob = $_POST['DateofBirth'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $department = $_POST['department'];
  $semester = $_POST['semester'];
  $mobile = $_POST['mobile'];

  // Corrected SQL Query
  $sql = "INSERT INTO student_info (FullName, FatherName, username, passwords, roll_No, DateofBirth, Gender, Email, Address, Department, Semester, PhoneNo)
          VALUES ('$fullName', '$fatherName', '$username', '$passwords', '$roll_no', '$dob', '$gender', '$email', '$address', '$department', '$semester', '$mobile')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful!'); window.location.href='../login/login2.html';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>
