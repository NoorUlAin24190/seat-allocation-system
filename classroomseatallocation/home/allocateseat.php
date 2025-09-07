<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Allocate Seats - Classroom Seat Allocation</title>
  <link rel="stylesheet" href="homestyle.css" />
  <style>
    /* Agar chaho to yahan thoda extra styling bhi kar sakte ho */
    body {
      background-color: #f9f9f9;
      font-family: Arial, sans-serif;
    }
    header {
      background-color: #1e293b;
      color: white;
      padding: 20px 0;
      text-align: center;
      margin-bottom: 30px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    nav {
      margin-top: 10px;
    }
    nav a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .container {
      width: 90%;
      max-width: 900px;
      margin: auto;
      background: white;
      padding: 20px 30px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
    }
    .info-panel h3 {
      margin-bottom: 15px;
      color: #333;
    }
    .info-panel input[type="text"],
    .info-panel select {
      padding: 8px 10px;
      margin-right: 15px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      min-width: 180px;
    }
    .btn {
      background-color: #004080;
      color: white;
      border: none;
      padding: 10px 25px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn:hover {
      background-color: #0066cc;
    }
  </style>
</head>
<body>

  <header>
    <h1>Classroom Seat Allocation</h1>
    <nav>
      <a href="home.html">Home</a>
      <a href="allocateseat.php" class="active">Allocate Seats</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <div class="container">
  <div class="info-panel">
    <h3>🔎 Search & 🎯 Filter Students</h3>
    <form action="searchseat.php" method="GET">
      <input type="text" name="search" placeholder="🔢 Search by Roll No. or Name" />
      
      <select name="department" title="Select Department">
        <option value="">🏢 Filter by Department</option>
        <option value="CS">💻 Computer Science (CS)</option>
        <option value="IT">🖥️ Information Technology (IT)</option>
        <option value="SE">⚙️ Software Engineering (SE)</option>
      </select>
      
      <select name="semester" title="Select Semester">
        <option value="">📅 Filter by Semester</option>
        <option value="1">1️⃣ 1st</option>
        <option value="2">2️⃣ 2nd</option>
        <option value="3">3️⃣ 3rd</option>
        <option value="4">4️⃣ 4th</option>
        <option value="5">5️⃣ 5th</option>
        <option value="6">6️⃣ 6th</option>
        <option value="7">7️⃣ 7th</option>
        <option value="8">8️⃣ 8th</option>
      </select>
      
     <!-- <select name="course" title="Select Course">
        <option value="">📚 Filter by Course</option>
        <!-- Add your course options here 
        <option value="Course1">📝 Professional practice </option>
        <option value="Course2">📝 COAL</option>
      </select>
      -->
      <button type="submit" class="btn">🔍 Search</button>
    </form>
  </div>
</div>

    <!-- Yahan aage seat allocation form ya table add kar sakte ho -->

  </div>

</body>
</html>
