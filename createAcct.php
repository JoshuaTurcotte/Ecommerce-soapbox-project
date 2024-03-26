<?php
$db = new PDO('sqlite:boxCo.db');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];

    //basic validation
    if (empty($firstName) || empty($lastName) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($password)) {
        //redirect back to acctCreation.html with an error
        header('Location: acctCreation.html?error=validationerror');
        exit;
    }

    //check if the user already exists
    $checkQuery = "SELECT * FROM users WHERE email = :email";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        //user already exists
        header('Location: acctCreation.html?error=userexists');
        exit;
    }

    //hash the password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //insert new user into the database
    $query = "INSERT INTO users (firstName, lastName, email, phoneNumber, password) VALUES (:firstName, :lastName, :email, :phoneNumber, :passwordHash)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
    $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_STR);
    $stmt->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);

    if ($stmt->execute()) {
        //account creation successful
        header('Location: login.html?success=accountcreated');
    } else {
        //account creation failed
        header('Location: acctCreation.html?error=accountcreationfailed');
    }
} else {
    //not a POST request: Redirect to accountCreation.html
    header('Location: acctCreation.html');
    exit;
}
?>
