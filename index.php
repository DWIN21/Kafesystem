<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KA'fe Coffee Shop</title>
    <link rel="shortcut icon" type="x-icon" href="Ka'fe logo.png">
    <link rel="stylesheet" href="css/login_tset.css"> <!-- Link to CSS file -->
</head>
<body>

    <header>
        <h1 class="logo">KA'fe Coffee Shop</h1>
        <nav class="navigation">
            <button class="btnLogin-popup">Sign In</button>
        </nav>
    </header>
    <section class="slideshow-container">
    <div class="mySlides fade">
        <img src="img/slideshow/slide_show0.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show5.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show1.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show2.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show3.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show4.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show6.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
        <img src="img/slideshow/slide_show7.jpg" style="width:100%">
    </div>

</section>
    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to KA'fe Coffee House</h1>
        <p>Your perfect place to relax and enjoy the best coffee in town</p>
        <button onclick="window.location.href='View_menu.php'">View Our Menu</button>
    </div>

    <!-- Featured Items Section -->
    <section class="section featured-items">
        <h2>Featured Items</h2>
        <?php
        include('conn/connection.php');

        $sql = "SELECT ItemName, Category, Price, ImageName, Description FROM MenuItem";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="featured-item">';
                echo '<img src="Admin/uploads/' . $row['ImageName'] . '" alt="' . $row['ItemName'] . '">';
                echo '<h3>' . $row['ItemName'] . '</h3>';
                echo '<p>' . $row['Description'] . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No items found.</p>';
        }

        $conn->close();
        ?>
    </section>

    <!-- About Us Section -->
    <section class="section about-us">
        <h2>About Us</h2>
        <p class="about">At KA'fe Coffee House, we believe in serving the best quality coffee and desserts to our customers. Our cozy atmosphere and friendly staff make us the perfect spot to unwind or catch up with friends. Come visit us and experience the difference!</p>
    </section>
<!-- Reviews Section -->
<section class="section reviews">
    <h2>Customer Reviews</h2>
    <div class="review">
        <img src="img/review/review3.jpg" alt="Reviewer 1">
        <h3>John Bryan</h3>
        <p>“Great coffee and amazing atmosphere! Will definitely come back.”</p>
    </div>
    <div class="review">
        <img src="img/review/review2.jpg" alt="Reviewer 2">
        <h3>Jane Smith</h3>
        <p>“The best latte I've ever had! Friendly staff and cozy environment.”</p>
    </div>
    <div class="review">
        <img src="img/review/review1.jpg" alt="Reviewer 3">
        <h3>Dennis Caronan</h3>
        <p>“A hidden gem in the city. Delicious pastries and excellent coffee.”</p>
    </div>
</section>

<!-- Contact Us Section -->
<section class="section contact">
    <h2>Contact Us</h2>
    <p>If you have any questions or feedback, feel free to reach out to us!</p>
    <p>Email: kafecoffeehouse@gmail.com</p>
    <p>Phone: 0956 490 2330</p>
    <p>Address: Chikuzai area, Along Public Market Road In Balanga City, Bataan.</p>
</section>

    <!-- Customer Login Modal -->
    <div id="loginModal" class="modal-container">
        <div class="modal">
            <span id="closeBtn" class="close-btn">&times;</span>
            <h2>Login</h2>
            <div class="login-form">
                <form action="" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit" name="Login">Login</button>
                </form>
                <?php
                if (isset($_POST['Login'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    if (!empty($username) && !empty($password)) {
                        $conn = new mysqli('localhost', 'root', 'Kafecoffeeshop', 'kafesystem');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $stmt = $conn->prepare("SELECT role FROM users WHERE username = ? AND password = ?");
                        $stmt->bind_param("ss", $username, $password);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $_SESSION['username'] = $username;
                            $_SESSION['role'] = $row['role'];
                            if ($row['role'] == 'admin') {
                                echo "<script>alert('Welcome, Admin $username!'); window.location.href='Admin/Admin_Dashboard.php';</script>";
                            } else {
                                echo "<script>alert('Welcome, Staff $username!'); window.location.href='Staff/Staff_Dashboard.php';</script>";
                            }
                        } else {
                            echo "<script>alert('Invalid Username or password!')</script><p style='color:red;'>Invalid username or password.</p>";
                        }

                        $stmt->close();
                        $conn->close();
                    } else {
                        echo "<p style='color:red;'>Please enter both username and password.</p>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.btnLogin-popup').addEventListener('click', function() {
            document.getElementById('loginModal').style.display = 'flex';
        });

        document.getElementById('closeBtn').addEventListener('click', function() {
            document.getElementById('loginModal').style.display = 'none';
        });

        window.addEventListener('click', function(event) {
            if (event.target == document.getElementById('loginModal')) {
                document.getElementById('loginModal').style.display = 'none';
            }
        });
    </script>
    <script src="js/slideshow.js"></script>
</body>
<footer>
    <p>&copy; 2024 Ka'fe. All rights reserved.</p>
</footer>
</html>