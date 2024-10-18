-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 04:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taste_tales`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `preparation_time` int(5) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `description`, `ingredients`, `instructions`, `category`, `preparation_time`, `image_url`) VALUES
(1, 'Spaghetti Carbonara', 'A classic Italian pasta dish', 'Spaghetti, eggs, pancetta, Parmesan cheese, black pepper', '1. Boil pasta. 2. Cook pancetta. 3. Mix eggs and cheese. 4. Combine all with pasta and pepper.', 'Main Course', 20, 'https://example.com/images/carbonara.jpg'),
(2, 'Spaghetti Carbonara', 'Classic Italian pasta recipe with a creamy egg-based sauce.', 'Spaghetti, eggs, Parmesan cheese, pancetta, black pepper', 'Cook spaghetti. Fry pancetta. Mix eggs and cheese. Combine with spaghetti.', 'Italian', 20, 'https://via.placeholder.com/300x200?text=Spaghetti+Carbonara'),
(3, 'Chicken Alfredo', 'Delicious creamy Alfredo sauce served with grilled chicken.', 'Fettuccine, chicken breast, heavy cream, butter, garlic, Parmesan cheese', 'Cook fettuccine. Grill chicken. Prepare sauce. Combine all ingredients.', 'Italian', 30, 'https://via.placeholder.com/300x200?text=Chicken+Alfredo'),
(4, 'Chicken Tikka Masala', 'Spicy chicken dish cooked in a creamy sauce.', 'Chicken, yogurt, spices, tomatoes, cream, onion', 'Marinate chicken. Cook with spices and tomatoes. Add cream.', 'Indian', 40, 'https://via.placeholder.com/300x200?text=Chicken+Tikka+Masala'),
(5, 'Lasagna', 'A rich and creamy whole-wheat pasta dish filled layer by layer.', 'Lasagna sheets, ground beef, ricotta cheese, mozzarella cheese, tomato sauce', 'Layer sheets with fillings and bake.', 'Italian', 60, 'https://via.placeholder.com/300x200?text=Lasagna'),
(6, 'Vegetable Stir Fry', 'Quick and easy stir-fried vegetables.', 'Mixed vegetables, soy sauce, garlic, ginger, sesame oil', 'Stir fry vegetables with garlic and ginger in sesame oil.', 'Asian', 15, 'https://via.placeholder.com/300x200?text=Vegetable+Stir+Fry'),
(7, 'Beef Tacos', 'Delicious beef tacos with fresh toppings.', 'Ground beef, taco shells, lettuce, tomatoes, cheese', 'Cook beef. Assemble in taco shells with toppings.', 'Mexican', 25, 'https://via.placeholder.com/300x200?text=Beef+Tacos'),
(8, 'Caprese Salad', 'Fresh salad with mozzarella, tomatoes, and basil.', 'Tomatoes, mozzarella cheese, fresh basil, olive oil, balsamic vinegar', 'Layer ingredients and drizzle with olive oil and vinegar.', 'Italian', 10, 'https://via.placeholder.com/300x200?text=Caprese+Salad'),
(9, 'Mushroom Risotto', 'Creamy risotto with mushrooms.', 'Arborio rice, mushrooms, vegetable broth, onion, Parmesan cheese', 'Cook rice slowly with broth, add mushrooms and cheese.', 'Italian', 35, 'https://via.placeholder.com/300x200?text=Mushroom+Risotto'),
(10, 'Chocolate Cake', 'Rich and moist chocolate cake.', 'Flour, cocoa powder, sugar, eggs, butter, baking powder', 'Mix ingredients, bake, and frost.', 'Dessert', 50, 'https://via.placeholder.com/300x200?text=Chocolate+Cake'),
(11, 'Pancakes', 'Fluffy pancakes for breakfast.', 'Flour, milk, eggs, sugar, baking powder', 'Mix ingredients and cook on a skillet.', 'Breakfast', 20, 'https://via.placeholder.com/300x200?text=Pancakes'),
(12, 'Egg Fried Rice', 'Quick and flavorful egg fried rice.', 'Rice, eggs, peas, carrots, soy sauce, green onions', 'Stir fry rice with peas and carrots, add scrambled eggs and soy sauce.', 'Chinese', 20, 'https://via.placeholder.com/300x200?text=Egg+Fried+Rice'),
(13, 'Shrimp Scampi', 'Delicious shrimp cooked in garlic and butter.', 'Shrimp, garlic, butter, lemon juice, parsley, spaghetti', 'Sauté shrimp in garlic and butter, serve over spaghetti.', 'Italian', 30, 'https://via.placeholder.com/300x200?text=Shrimp+Scampi'),
(14, 'Beef Stroganoff', 'Tender beef in a creamy sauce served over noodles.', 'Beef, mushrooms, onion, sour cream, egg noodles', 'Cook beef and mushrooms, stir in sour cream, serve over noodles.', 'Russian', 45, 'https://via.placeholder.com/300x200?text=Beef+Stroganoff'),
(15, 'Margherita Pizza', 'Classic pizza topped with fresh mozzarella and basil.', 'Pizza dough, tomato sauce, mozzarella cheese, fresh basil', 'Spread sauce, add cheese and basil, bake until golden.', 'Italian', 30, 'https://via.placeholder.com/300x200?text=Margherita+Pizza'),
(16, 'Caesar Salad', 'Crispy romaine lettuce with Caesar dressing.', 'Romaine lettuce, croutons, Parmesan cheese, Caesar dressing', 'Toss lettuce with dressing, top with croutons and cheese.', 'Salad', 10, 'https://via.placeholder.com/300x200?text=Caesar+Salad'),
(17, 'Stuffed Bell Peppers', 'Bell peppers filled with a savory meat mixture.', 'Bell peppers, ground beef, rice, tomato sauce, cheese', 'Stuff peppers with mixture, bake until tender.', 'American', 50, 'https://via.placeholder.com/300x200?text=Stuffed+Bell+Peppers'),
(18, 'Greek Salad', 'Fresh salad with cucumbers, tomatoes, and feta cheese.', 'Cucumbers, tomatoes, olives, feta cheese, olive oil', 'Combine ingredients and drizzle with olive oil.', 'Greek', 15, 'https://via.placeholder.com/300x200?text=Greek+Salad'),
(19, 'Lentil Soup', 'Healthy and hearty lentil soup.', 'Lentils, carrots, celery, onion, vegetable broth', 'Cook lentils and vegetables in broth until tender.', 'Soup', 40, 'https://via.placeholder.com/300x200?text=Lentil+Soup'),
(20, 'Fish Tacos', 'Tasty fish tacos topped with fresh salsa.', 'Fish fillets, tortillas, cabbage, salsa', 'Cook fish, assemble in tortillas with toppings.', 'Mexican', 25, 'https://via.placeholder.com/300x200?text=Fish+Tacos'),
(21, 'Apple Pie', 'Classic dessert with a flaky crust and sweet apple filling.', 'Apples, sugar, flour, butter, cinnamon', 'Fill crust with apples and sugar, bake until golden.', 'Dessert', 60, 'https://via.placeholder.com/300x200?text=Apple+Pie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1000, 'ej2102004', 'joel@1234', '2024-10-16 04:44:33'),
(1001, 'edwinjoel210', '$2y$10$b2qlZLZAN1wMZ9GRRv/4tey9rCwtFaduvp2Yok5NxFeZI0v2tyZGS', '2024-10-16 04:44:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
