<?php
require "header.php";

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    setcookie("theme", $_POST["theme"], time() + 86400 * 30);
    header("Location: dashboard.php");
    exit;
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
    background: linear-gradient(135deg,#2ebf91,#8360c3);
    font-family: Arial;
}
.card {
    width: 360px;
    padding: 30px;
    border-radius: 18px;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(15px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.35);
    color: #fff;
}
select, button {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: none;
    margin-top: 15px;
}
button {
    background: #4facfe;
    color: #fff;
    font-weight: bold;
}
</style>
</head>
<body>

<div class="card">
<h2 style="text-align:center">Select Theme</h2>

<form method="post">
    <select name="theme">
        <option value="light">Light Mode</option>
        <option value="dark">Dark Mode</option>
    </select>
    <button type="submit">Save</button>
</form>
</div>

</body>
</html>
