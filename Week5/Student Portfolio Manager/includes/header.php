<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Portfolio Manager</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        html, body {
            height: 100%;
            margin: 0;
            background: #eef2f7;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(135deg, #11998e, #38ef7d);

            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
            padding: 12px;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #4e54c8;
            font-weight: 600;
        }

        nav a:hover {
            color: #000;
        }

        .container {
            flex: 1;
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        button {
            background: #4e54c8;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #3c40a4;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

<header>
    <h1>Student Portfolio Manager</h1>
    <p>Manage students and portfolios easily</p>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add_student.php">Add Student</a>
    <a href="upload.php">Upload Portfolio</a>
    <a href="students.php">View Students</a>
</nav>
