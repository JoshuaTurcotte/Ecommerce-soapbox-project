<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Box Company</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <nav>
            <a href="index.php" class="logo">The Box Company</a>
            <div id="loginBanner">
                <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
                    <a href="logout.php">Logout</a> | 
                    <a href="shoppingCart.php">Cart</a>
                <?php else: ?>
                    <a href="login.html">Login</a> | 
                    <a href="acctCreation.html">Create Account</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <h1>Discover Your Perfect Box</h1>
            <p>Explore our premium selection of boxes for all occasions.</p>
            <a href="catalogue.php" class="btn btn-primary">Shop Now</a>
        </section>

        <!-- Featured Products -->
        <!-- Add dynamic PHP code here to pull and display product information if desired -->

    </main>

    <footer class="footer">
        <p>&copy; 2024 The Box Company</p>
    </footer>
</body>
</html>
