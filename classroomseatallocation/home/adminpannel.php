<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login2.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Panel</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0; padding: 0; box-sizing: border-box;
      font-family: 'Roboto', sans-serif;
    }
    body {
      background: #f5f9ff;
      color: #1a237e;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 80px 20px 40px;
    }

    /* Header style navbar */
    header {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%; /* full width */
  background: #0d1b5a; /* dark blue */
  padding: 18px 40px; /* thoda zyada padding for height */
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 4px 20px rgba(13, 27, 90, 0.8);
  z-index: 999;
  font-weight: 700; /* mota font */
  font-size: 1.25rem; /* bada font */
  letter-spacing: 1.3px;
}

header .logo {
  font-weight: 900;
  font-size: 1.8rem; /* logo thoda bada */
  color: #e0e7ff;
  user-select: none;
  letter-spacing: 1.5px;
}

header nav a {
  color: #cbd5e1;
  text-decoration: none;
  font-weight: 700;
  padding: 12px 20px;
  border-radius: 6px;
  transition: background-color 0.3s ease, color 0.3s ease;
  user-select: none;
  font-size: 1.2rem;
  margin-left: 25px;
}

header nav a:hover,
header nav a:focus {
  background: #e0e7ff;
  color: #0d1b5a;
  box-shadow: 0 3px 10px rgba(224, 231, 255, 0.7);
}

    /* Welcome message */
    .welcome-msg {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 40px;
      color: #283593;
      opacity: 0;
      animation: fadeInUp 1s ease forwards;
      text-align: center;
      margin-top: 60px; /* for some spacing below fixed header */
    }
    .welcome-msg span {
      color: #1a237e;
    }

    /* Buttons container below welcome */
    .admin-buttons {
      display: flex;
      gap: 22px;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 900px;
      width: 100%;
      opacity: 0;
      animation: fadeInUp 1s ease 0.3s forwards;
      margin-bottom: 60px;
    }

    /* Buttons style */
    .admin-buttons button {
      background: #3f51b5;
      border: none;
      padding: 18px 40px;
      font-size: 1.15rem;
      font-weight: 700;
      border-radius: 8px;
      color: white;
      cursor: pointer;
      box-shadow: 0 6px 15px rgba(63, 81, 181, 0.4);
      transition: background-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
      flex: 1 1 190px;
      min-width: 190px;
      user-select: none;
    }
    .admin-buttons button:hover {
      background: #283593;
      box-shadow: 0 10px 25px rgba(40, 53, 147, 0.6);
      transform: translateY(-4px);
    }
    .admin-buttons button:active {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(40, 53, 147, 0.4);
    }

    /* Animations */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 600px) {
      header {
        flex-direction: column;
        gap: 12px;
        padding: 15px 20px;
      }
      header nav a {
        margin-left: 0;
        font-size: 1rem;
      }
      .admin-buttons {
        flex-direction: column;
        gap: 16px;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">University Admin</div>
    <nav>
    <a href="../registration/view.php">Student Registration</a>
      <a href="../home/home.html">Home</a>
      <a href="../login/logout.php">Logout</a>
    </nav>
  </header>

  <div class="welcome-msg">
    Welcome back, <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>!
  </div>

  <div class="admin-buttons">
    <button onclick="window.location.href='../admin/addseat.php'">➕ Add Seat</button>
    <button onclick="window.location.href='../admin/view_seats.php'">❌ Delete Seat</button>
    <button onclick="window.location.href='../admin/view_seats.php'">✏️ Update Seat</button>
  </div>

</body>
</html>
