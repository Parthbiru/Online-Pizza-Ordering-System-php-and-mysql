<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
        
        .about-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFBF00;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
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

        h1, p {
            margin-bottom: 20px;
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
    <!-- <div class="about-container">
        <h1>About Us</h1>
        <p>Welcome to our pizza restaurant! We are passionate about bringing you the best pizza in town, using the freshest ingredients and traditional recipes.</p>
        <p>Our mission is to make every meal a memorable experience, whether you're dining with us or ordering for delivery. Thank you for choosing us for your pizza cravings!</p>
    </div> -->
    <div class="about-container">
        <h1>About Us</h1>
        <p>Welcome to Biru's Pizza, your go-to destination for delicious, freshly-made pizzas delivered right to your door!</p>

        <p>Founded with the mission to make pizza ordering fast, easy, and affordable, we are proud to offer an exceptional online pizza delivery service. Whether you're craving a classic Margherita, a cheesy Pepperoni, or a gourmet Veggie Delight, we've got you covered with a wide range of mouth-watering options.</p>

        <p>We believe in using only the freshest ingredients, from hand-picked vegetables to the finest meats and cheeses. Our pizzas are prepared with love and baked to perfection, ensuring every bite is a taste of heaven.</p>

        <p>With our user-friendly online platform, you can browse our menu, customize your pizza, and place your order within minutes. Once your order is confirmed, our team works swiftly to prepare and deliver your pizza while it’s still hot and fresh. You can track your order in real time, so you'll always know when your pizza is arriving!</p>

        <p>At Biru's Pizza, customer satisfaction is our top priority. We are committed to providing you with not just great food, but an exceptional experience from the moment you visit our website to when your pizza reaches your doorstep.</p>

        <p>Thank you for choosing Biru's pizza. <b>We look forward to serving you again and again!</b></p>
    </div>
</body>
</html>
