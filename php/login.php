<?php
session_start();
// Connect to database
$conn = new mysqli('localhost', 'root', '', 'taste_tales');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($password, $hashed_password)) {
            $_SESSION['username'] = $username; // Store username in session
            
            // Redirect to index.php after successful login
            header("Location: /index.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/login_styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 align='center'>Login</h2>
        <form method="post" action="index.php">
            <div class="mb-3 mt-5 col-4" align='center'>
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3 col-4" align='center'>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>  
            <button type="submit" class="btn btn-primary" align='center'>Login</button>
        </form>
        <p class="mt-3">New user? <a href="register.php">Register</a></p>
        <script src="../scripts/login_script.js"></script>
    </div>
</body>
</html>