<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Book</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="../styles/index_styles.css">

    <style>
        #suggestions {
            max-height: 200px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }

        #suggestions .list-group-item {
            cursor: pointer;
        }

        #suggestions .list-group-item:hover {
            background-color: #f8f9fa; 
        }
    </style>

    <!-- Custom CSS File Link -->
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
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Recipes</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Search Bar Section -->
    <!-- Search Bar Section -->
    <!-- Search Bar Section -->
    <!-- Search Bar Section -->
    <section class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <input type="text" id="search" class="form-control" placeholder="Search for a recipe..." autocomplete="off">
                <!-- Suggestions Div -->
                <div id="suggestions" class="list-group" style="position: absolute; z-index: 1000; display: none;"></div>

            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" id="search-button">Search</button>
            </div>
        </div>
    </section>

        


    <!-- Recipe Cards Section -->
    <section class="container">
        <h2 class="text-center mb-4">Featured Recipes</h2>
        <div class="row" id="recipe-cards">
            <?php
            // Database Connection
            $conn = new mysqli('localhost', 'root', '', 'taste_tales');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch recent recipes
            $sql = "SELECT * FROM recipes ORDER BY id DESC LIMIT 20"; // Adjust LIMIT as needed
            $result = $conn->query($sql);

            // Check if there are recipes
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-3 mb-4">
                            <div class="card h-100 d-flex flex-column">
                                <img src="' . $row['image_url'] . '" class="card-img-top" alt="' . $row['name'] . '">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">' . $row['name'] . '</h5>
                                    <p class="card-text">' . $row['description'] . '</p>
                                    <a href="food_details.php?id=' . $row['id'] . '" class="btn btn-primary mt-auto">View Recipe</a>
                                </div>
                            </div>
                          </div>';
                }
            } else {
                echo '<p class="text-center">No recipes found.</p>';
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p>Created by IT Legends | All Rights Reserved | &#169; 2024</p>
        </div>
    </footer>
    <script src="../scripts/index_scripts.js"></script>
    <script src=""></script>

</body>

</html>