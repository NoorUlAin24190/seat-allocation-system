// Wait for the page to load
document.addEventListener("DOMContentLoaded", function () {
  const registrationForm = document.getElementById("registrationForm");

  registrationForm.addEventListener("submit", function (e) {
    //e.preventDefault(); // Prevent page reload

    // Collect form data
    const fullName = document.getElementById("fullName").value.trim();
    const fatherName = document.getElementById("fatherName").value.trim();
    const dob = document.getElementById("dob").value;
    const gender = document.querySelector(
      'input[name="gender"]:checked'
    )?.value;
    const email = document.getElementById("email").value.trim();
    const address = document.getElementById("address").value.trim();
    const department = document.getElementById("department").value;
    const semester = document.getElementById("semester").value;
    //const course = document.getElementById("course")?.value || ""; // optional
    const mobile = document.getElementById("mobile").value.trim();
    const password = document.getElementById("password").value.trim();

    // Basic validation
    if (
      !fullName ||
      !fatherName ||
      !dob ||
      !gender ||
      !email ||
      !address ||
      !department ||
      !semester ||
      !mobile ||
      !password
    ) {
      alert("Please fill in all fields.");
      return;
    }

    // Example: Display success message
    // alert("Registration successful! 🎉");

    // Optional: Clear the form after submission
    // registrationForm.reset();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const toggleIcon = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");

  toggleIcon.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    // Optional: change eye icon
    toggleIcon.textContent = type === "text" ? "🙈" : "👁️";
  });

  // your existing form submit code stays here
});
