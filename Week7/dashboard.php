<?php
require "header.php";

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

$theme = $_COOKIE["theme"] ?? "light";
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
    font-family: Arial;
    background: <?= $theme === "dark" ? "#2b1d0e" : "linear-gradient(135deg,#f7971e,#ffd200)" ?>;
    color: <?= $theme === "dark" ? "#fff3e0" : "#3e2723" ?>;
}
.card {
    width: 400px;
    padding: 35px;
    border-radius: 18px;
    background: <?= $theme === "dark" ? "rgba(62,39,35,0.9)" : "rgba(255,248,225,0.85)" ?>;
    backdrop-filter: blur(15px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.35);
    text-align: center;
}
a {
    display: block;
    margin-top: 15px;
    color: <?= $theme === "dark" ? "#ffb74d" : "#e65100" ?>;
    text-decoration: none;
}
a:hover {
    color: <?= $theme === "dark" ? "#ffe082" : "#bf360c" ?>;
}
</style>
</head>
<body>

<div class="card">
<h2>Welcome, <?= $_SESSION["student_name"] ?> !!! </h2>
<a href="preference.php">Change Theme</a>
<a href="logout.php">Logout</a>
</div>

</body>
</html>
