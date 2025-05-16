<?php
require 'db1.php';

session_start(); // Start the session

// Check if the user is an admin (you can add your admin authentication logic here)
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php"); // Redirect to login if not logged in or not an admin
    exit;
}

// Fetch all users from the database
$query = "SELECT username, email FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User List</title>
    <style>
        /* Add CSS styles for formatting */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            backdrop-filter: blur(2px);
        }

        .menu-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFBF00;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #FFBF00;
            color: #fff;
        }

        td {
            background-color: #fff;
        }

        a {
            text-decoration: none;
            background-color: grey;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }

        a:hover {
            background-color: orange;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h2>Welcome, Admin!</h2>
        <h1>List of Users</h1>

        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
