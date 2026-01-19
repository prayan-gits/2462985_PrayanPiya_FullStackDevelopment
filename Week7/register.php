<?php
require "db.php";
require "header.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_id = trim($_POST["student_id"]);
    $full_name = trim($_POST["firstname"] . " " . $_POST["lastname"]);
    $password = $_POST["password"];

    if (empty($student_id) || empty($full_name) || empty($password)) {
        $error = "All fields are required!";
    } else {
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO students (student_id, full_name, password_hash)
                 VALUES (:sid, :name, :pass)"
            );
            $stmt->execute([
                ":sid" => $student_id,
                ":name" => $full_name,
                ":pass" => password_hash($password, PASSWORD_BCRYPT)
            ]);
            $success = "Registration successful!";
        } catch (PDOException $e) {
            $error = "Student ID already exists!";
        }
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
    background: linear-gradient(135deg,#667eea,#764ba2);
    font-family: Arial;
}
.card {
    width: 420px;
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
    background: #4facfe;
    color: #fff;
    font-weight: bold;
}
.message { text-align: center; }
.error { color: #ffd1d1; }
.success { color: #d4ffd4; }
a { color: #fff; text-decoration: none; }
</style>
</head>
<body>

<div class="card">
<h2 style="text-align:center">Register</h2>

<form method="post">
    <input type="text" name="student_id" placeholder="Student ID">
    <input type="text" name="firstname" placeholder="First Name">
    <input type="text" name="lastname" placeholder="Last Name">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>

<div class="message error"><?= $error ?></div>
<div class="message success"><?= $success ?></div>

<p style="text-align:center"><a href="login.php">Go to Login</a></p>
</div>

</body>
</html>
