<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    //naka parameterize para safe sa sql inject
    $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['users'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $_SESSION['error'] = "Invalid email or password.";
    header("Location: index.php");
    exit;
}

header("Location: index.php");
exit;
?>