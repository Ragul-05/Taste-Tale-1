<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Details</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- font-awesome cdn link -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../styles/index_styles.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b><em>Recipe Tales</em></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Recipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Recipe Details Section -->
    <section class="container my-4">
        <?php
        // Database connection
        $servername = "localhost"; // Adjust if different
        $username = "root"; // Adjust if different
        $password = ""; // Adjust if different
        $dbname = "taste_tales";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get recipe ID from URL
        $recipe_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Query to get the recipe details
        $sql = "SELECT * FROM recipes WHERE id = $recipe_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output the recipe details
            while($row = $result->fetch_assoc()) {
                echo '
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <img src="' . $row["image_url"] . '" class="img-fluid mb-4" alt="' . $row["name"] . '">
                        <h2 class="mb-3">' . $row["name"] . '</h2>
                        <p><strong>Category:</strong> ' . $row["category"] . '</p>
                        <p><strong>Preparation Time:</strong> ' . $row["preparation_time"] . ' minutes</p>
                        <h4>Ingredients</h4>
                        <p>' . nl2br($row["ingredients"]) . '</p>
                        <h4>Instructions</h4>
                        <p>' . nl2br($row["instructions"]) . '</p>
                    </div>
                </div>';
            }
        } else {
            echo "<p>No recipe found.</p>";
        }

        $conn->close();
        ?>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>Created by IT Legends | All Rights Reserved | &#169; 2024</p>
        </div>
    </footer>

<script src="../scripts/index_scripts.js"></script>
</body>
</html>