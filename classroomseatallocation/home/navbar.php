<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<nav>
  <a href="home.html">Home</a>
  <?php if(isset($_SESSION['username'])): ?>
    <a href="allocateseat.php">Allocate Seats</a>
    <a href="adminpanel.php">Admin Panel</a>
    <a href="logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a>
  <?php else: ?>
    <a href="login2.html">Login</a>
    <a href="Registration.html">Register</a>
  <?php endif; ?>
</nav>
