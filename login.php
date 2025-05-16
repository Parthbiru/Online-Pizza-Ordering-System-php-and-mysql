<?php
// Include the database connection file
include 'db.php';
session_start(); // Start the session

// When the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Basic input validation
    if (empty($user) || empty($pass)) {
        echo "Username and password are required.";
        exit;
    }

    // Prepare SQL query to check the user's credentials
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the hashed password from the database
        $stmt->bind_result($user_id,$hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($pass, $hashed_password)) {
            // Store user ID in session and redirect to a protected page
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $user;

            header("Location: menu.php");
            exit;
            // Start a session or redirect to a dashboard
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Customer Login</title>
    <style>
        body {
            font-family: 'Cedarville Cursive', cursive;
            background-color: #f2f2f2;
            text-align: center;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(2px);
        }

      
        form {
            max-width: 300px;
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
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
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

        .menu .align-right {
            margin-left: 50px;
        }
    </style>
    <nav>
            <ul class="menu">
                <a href="index.php">Home</a>
            </ul>
        </nav>
</head>

<body>
    <h2>Customer Login</h2>
    <form method="post" action="">
        <div class="input-group">
            <label>Username:</label>
            <input type="text" name="username" required><br><br>
        </div>
        <div class="input-group">
            <label>Password:</label>
            <input type="password" name="password" required><br><br>
        </div>
        <div class="input-group">
            <input type="submit" value="Login">
        </div>
    </form>
</body>

</html>
<?php
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = ""; // Replace with your database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
