<?php
require "db.php";
require "header.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = $_POST["student_id"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM students WHERE student_id = :sid");
    $stmt->execute([":sid" => $student_id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && password_verify($password, $student["password_hash"])) {
        $_SESSION["logged_in"] = true;
        $_SESSION["student_name"] = $student["full_name"];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg,#1d2671,#c33764);
    font-family: Arial;
}
.card {
    width: 380px;
    padding: 35px;
    border-radius: 18px;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(15px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.35);
    color: #fff;
}
input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 10px;
    border: none;
}
button {
    width: 100%;
    padding: 14px;
    border-radius: 12px;
    border: none;
    background: #00f2fe;
    color: #fff;
    font-weight: bold;
}
.error { color: #ffd1d1; text-align: center; }
a { color: #fff; text-decoration: none; }
</style>
</head>
<body>

<div class="card">
<h2 style="text-align:center">Login</h2>

<form method="post">
    <input type="text" name="student_id" placeholder="Student ID">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

<p class="error"><?= $error ?></p>
<p style="text-align:center"><a href="register.php">Create Account</a></p>
</div>

</body>
</html>
