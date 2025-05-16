<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Add logic to handle the form submission (e.g., send an email, save to the database, etc.)
    echo "<script>alert('Thank you for contacting us!');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Reuse styles from the previous code */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(2px);
        }
        
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFBF00;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 20px;
            background-color: #ff5733;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: Orange;
        }
        
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            color: white;
            text-decoration: none;
        }

        header {
            background-color: #FFBF00;
            color: white;
            padding: 10px 20px;
        }

        .menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
        }

        .menu a {
            text-decoration: none;
            margin: 0 10px;
        }
        a {
            
            text-decoration: none;
            transition: color 0.2s ease;
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 3px;
        }

        a:hover {
            background-color: Orange;
            color: white;
        }
    </style>
    <nav>
        <ul class="menu">
            <a href="index.php">Home</a>
            <a href="menu.php">Menu</a>
            <a href="contact.php">Contact Us</a>
            <a href="about.php">About Us</a>
            <a href="logout.php">Logout</a>
        </ul>
    </nav>
</head>
<body>
    <div class="form-container">
        <h1>Contact Us</h1>
        <form method="post" action="contact.php">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
