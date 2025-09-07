
<?php
include 'db_connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Hardcoded admin credentials
    $admin_username = 'admin';
    $admin_password = 'admin123'; // change this to your desired admin password

    // Start HTML output for SweetAlert
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>Login Status</title>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </head>
    <body>";

    
    if ($username === $admin_username && $password === $admin_password) {
      // Admin login success
     // session_start();
    $_SESSION['username'] = $username;

      echo "
      <script>
      Swal.fire({
        icon: 'success',
        title: 'Admin Login Successful',
        text: 'Welcome back, Admin!',
        timer: 2000,
        timerProgressBar: true,
        showConfirmButton: false
      }).then(() => {
        window.location.href = '../home/adminpannel.php';
      });
      </script>
      ";
  }else {
        // Check student credentials in database
        $sql = "SELECT * FROM student_info WHERE username='$username' AND passwords='$password'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            // Student login success
            echo "
            <script>
            Swal.fire({
              icon: 'success',
              title: 'Login Successful',
              text: 'Welcome back, $username!',
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false
            }).then(() => {
             window.location.href = '../home/allocateseat.php';
            });
            </script>
            ";
        } else {
            // Login failed popup
            echo "
            <script>
            Swal.fire({
              icon: 'error',
              title: 'Login Failed',
              text: 'Incorrect username or password.',
              confirmButtonText: 'Try Again'
            }).then(() => {
              window.location.href = 'login2.html';
            });
            </script>
            ";
        }
    }

    echo "</body></html>";

    $conn->close();
} else {
    header("Location: login.html");
    exit();
}
?>
