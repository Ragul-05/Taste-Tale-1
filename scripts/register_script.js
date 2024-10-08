document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.querySelector("form");

    registerForm.addEventListener("submit", function (e) {
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;

        if (username.trim() === "" || password.trim() === "") {
            e.preventDefault(); // Prevent form submission
            alert("Please fill in all fields.");
        } else if (password.length < 6) {
            e.preventDefault(); // Prevent form submission
            alert("Password must be at least 6 characters long.");
        }
    });
});
