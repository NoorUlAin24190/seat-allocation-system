<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Seat Allocation</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white text-center">
            <h4>Seat Allocation Form</h4>
          </div>
          <div class="card-body">
            <form action="allocatebutton.php" method="post">
              
              <div class="mb-3">
                <label class="form-label">Department</label>
                <input type="text" name="department" value="Computer Science" readonly class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Semester</label>
                <select name="semester" class="form-select" required>
                  <option value="" disabled selected>Select Semester</option>
                  <option value="1st">1st</option>
                  <option value="2nd">2nd</option>
                  <option value="3rd">3rd</option>
                  <option value="4th">4th</option>
                  <option value="5th">5th</option>
                  <option value="6th">6th</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label">Room Number</label>
                <input type="text" name="room_number" placeholder="e.g., A-101" class="form-control" required>
              </div>

              <div class="mb-3">
                <label class="form-label">Total Seats</label>
                <input type="number" name="total_seats" placeholder="e.g., 30" min="1" class="form-control" required>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Allocate Seats</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
