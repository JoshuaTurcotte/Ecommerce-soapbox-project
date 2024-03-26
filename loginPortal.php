<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - The Box Company</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <nav>
            <a href="index.html" class="logo">The Box Company</a>
            <div id="loginBanner">
                <a href="login.html">Login</a> | 
                <a href="acctCreation.html">Create Account</a> | 
                <a href="#" id="cartLink">Cart</a>
            </div>
        </nav>
    </header>

    <main>
        <section class="login-section">
            <h2>Login to Your Account</h2>
            <form id="loginForm" action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <?php if(isset($_GET['error'])): ?>
                    <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php endif; ?>
                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>
            </form>
        </section>
    </main>

    <footer class="footer">
        <p>&copy; 2024 The Box Company</p>
    </footer>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            //implement login validation and redirection logic
            window.location.href = 'index.html';
        });
    </script>
</body>
</html>
