<?php
// Include the database connection file
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    // Simple input validation
    if (empty($user) || empty($pass) || empty($email)) {
        echo "All fields are required.";
        exit;
    }

    // Password encryption (you should use password_hash() for security)
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // Prepare SQL query to insert data into the table (replace 'users' with your table name)
    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?,?,?)");
    $stmt->bind_param("sss", $user, $hashed_password, $email);

    // Execute the query
    if ($stmt->execute()) {
        header("Location: login.php");
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Customer Registration</title>
    <style>
        body {
            height: 100%;
            width: 100%;
            font-family: 'Cedarville Cursive', cursive;
            background-color: #f2f2f2;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(2px);
        }

        h2 {
            text-align: center;
            
            /* color: whitesmoke; */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFBF00;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .input-group {
            margin-top: 15px;
            margin-right: 15px;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
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
    </style>
    <nav>
            <ul class="menu">
                <a href="index.php">Home</a>
                <a href="login.php">Login</a>
            </ul>
        </nav>
</head>

<body>
    <h2>Customer Registration</h2>
    <form method="post" action="">
        <div class="input-group">
            <label>Username:</label>
            <input type="text" id="username" name="username" required><br><br>
        </div>
        <div class="input-group">
            <label>Password:</label>
            <input type="password" id="password" name="password" required><br><br>
        </div>
        <div class="input-group">
            <label>Email:</label>
            <input type="email" id="email" name="email" required><br><br>
        </div>
        Have an account already? <a href="login.php">Log in</a>
        <input type="submit" value="Register">
    </form>
</body>

</html>

