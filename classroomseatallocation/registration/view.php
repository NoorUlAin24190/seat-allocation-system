<?php
include 'db_connection.php';

// Fetch all student data
$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registered Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f9ff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #002b5c;
        }
        table thead {
            background-color: #002b5c;
            color: white;
        }
        table tbody tr:hover {
            background-color: #e6f0ff;
        }
        .btn-primary {
            background-color: #004080;
            border: none;
        }
        .btn-primary:hover {
            background-color: #003366;
        }
        .btn-danger {
            background-color: #c82333;
            border: none;
        }
        .btn-danger:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Registered Students</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Father Name</th>
                    <th>Username</th>
                    <th>Password </th>
                    <th>Roll No </th>
                    <th>DOB</th>
                    <th>Gender</th>             
                    <th>Email</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Semester</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row["id"]}</td>
                        <td>" . htmlspecialchars($row["FullName"]) . "</td>
                        <td>" . htmlspecialchars($row["FatherName"]) . "</td>
                        <td>" . htmlspecialchars($row["username"]) . "</td>
                         <td>" . htmlspecialchars($row["passwords"]) . "</td>
                          <td>" . htmlspecialchars($row["roll_No"]) . "</td>
                        <td>" . htmlspecialchars($row["DateofBirth"]) . "</td>
                        <td>" . htmlspecialchars($row["Gender"]) . "</td>
                        <td>" . htmlspecialchars($row["Email"]) . "</td>
                        <td>" . htmlspecialchars($row["Address"]) . "</td>
                        <td>" . htmlspecialchars($row["Department"]) . "</td>
                        <td>" . htmlspecialchars($row["Semester"]) . "</td>
                        <td>" . htmlspecialchars($row["PhoneNo"]) . "</td>
                        <td>
                            <a href='edit.php?id={$row["id"]}' class='btn btn-sm btn-primary me-2'>Edit</a>
                            <a href='delete.php?id={$row["id"]}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='12' class='text-center'>No records found</td></tr>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
