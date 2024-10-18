<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'taste_tales');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get recipe details from the form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $category = $_POST['category'];
    $preparation_time = $_POST['preparation_time'];
    $image_url = $_POST['image_url'];

    // Insert the new recipe into the database
    $stmt = $conn->prepare("INSERT INTO recipes (name, description, ingredients, instructions, category, preparation_time, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $name, $description, $ingredients, $instructions, $category, $preparation_time, $image_url);

    if ($stmt->execute()) {
        echo "New recipe added successfully!";
        // Redirect to the homepage or another page after adding the recipe
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
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
    <title>Add Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Add a New Recipe</h2>
        <form method="POST" action="add_recipe.php">
            <div class="mb-3">
                <label for="name" class="form-label">Recipe Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredients</label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="instructions" class="form-label">Instructions</label>
                <textarea class="form-control" id="instructions" name="instructions" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="mb-3">
                <label for="preparation_time" class="form-label">Preparation Time (in minutes)</label>
                <input type="number" class="form-control" id="preparation_time" name="preparation_time" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" required>
            </div>
            <button type="submit" class="btn btn-success">Add Recipe</button>
        </form>
    </div>
</body>
</html>
