<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue - The Box Company</title>
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
        <!-- Newly Released Boxes -->
        <section class="boxes">
            <h2>Newly Released Boxes</h2>
            <div class="product-list">
                <?php
                // Assume $db is PDO object
                $db = new PDO('sqlite:boxCo.db');
                $query = "SELECT * FROM products ORDER BY id DESC";
                $result = $db->query($query);

                foreach ($result as $row) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($row['imageUrl']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                    echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                    echo '<p>$' . htmlspecialchars(number_format($row['price'], 2)) . '</p>';
                    echo '<button onclick="addToCartOrRedirect(' . $row['id'] . ')" class="btn">Add to Cart</button>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 The Box Company</p>
    </footer>

    <script>
    function addToCartOrRedirect(productId) {
        <?php if(isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']): ?>
            //user is logged in, add the product to cart
            //note: Implement the AJAX request to add-to-cart PHP script here
            alert("Product " + productId + " added to cart.");
        <?php else: ?>
            //user is not logged in, redirect to the login page
            window.location.href = 'login.html';
        <?php endif; ?>
    }
    </script>
</body>
</html>
