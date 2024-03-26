<?php
session_start();

$db = new PDO('sqlite:boxCo.db');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT id, password FROM users WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $user['id'];

            header("Location: index.php");
            exit;
        } else {
            $error = "Password is incorrect.";
            header("Location: login.html?error=" . urlencode($error));
            exit;
        }
    } else {
        $error = "No account found with that email.";
        header("Location: login.html?error=" . urlencode($error));
        exit;
    }
} else {
    header("Location: login.html");
    exit;
}
?>
