<?php
require 'db1.php';

// Handle remove item action
if (isset($_POST['remove_item'])) {
    $order_id = $_POST['order_id'];

    // Remove the selected order
    $query = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        echo "<script>alert('Pizza item removed successfully.');</script>";
    } else {
        echo "<script>alert('Failed to remove pizza item. Please try again.');</script>";
    }

    $stmt->close();
}

// Handle clear all orders action
if (isset($_POST['clear_all'])) {
    // Clear all data from orders table
    $query = "DELETE FROM orders";
    if ($conn->query($query)) {
        echo "<script>alert('All pizza orders have been cleared.');</script>";
    } else {
        echo "<script>alert('Failed to clear orders. Please try again.');</script>";
    }
}

// Handle submit order action
if (isset($_POST['submit_order'])) {
    // You can perform additional processing here, like saving the order to another table for order history

    // Clear the cart after order submission
    $query = "DELETE FROM orders";
    if ($conn->query($query)) {
        echo "<script>alert('Your order has been successfully accepted!');</script>";
    } else {
        echo "<script>alert('Failed to submit order. Please try again.');</script>";
    }
}

// Fetch all orders
$result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

$total_quantity = 0;
$total_price = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            
        }
        .menu-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #FFBF00;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }
        .order-details {
            flex: 1;
        }
        .order-quantity {
            font-weight: bold;
        }
        .order-price {
            color: #ff5733;
        }
        .remove-btn, .clear-btn, .submit-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .clear-btn {
            background-color: orange;
        }
        .submit-btn {
            background-color: green;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        a:hover {
            color: #333;
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
            color: #666;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #333;
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
                <a href="menu.php">Menu</a>
            </ul>
    </nav>
</head>
<body>
    <div class="menu-container">
        <h1>Your Orders</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Calculate total quantity and total price
                $total_quantity += $row['quantity'];
                $total_price += $row['quantity'] * $row['price'];

                echo "<div class='order-item'>";
                echo "<div class='order-details'>";
                echo "<h2>" . $row['pizza_name'] . "</h2>";
                echo "<p>Quantity: <span class='order-quantity'>" . $row['quantity'] . "</span></p>";
                echo "<p>Price: <span class='order-price'>" . ($row['price'] * $row['quantity']) . " rs</span></p>";
                echo "</div>";
                echo "<form method='post' action='vieworders.php'>";
                echo "<input type='hidden' name='order_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='remove_item' class='remove-btn'>Remove</button>";
                echo "</form>";
                echo "</div>";
            }

            // Display total quantity and total price
            echo "<hr>";
            echo "<h3>Total Quantity: $total_quantity</h3>";
            echo "<h3>Total Price: $total_price rs</h3>";
        } else {
            echo "<p>No orders placed yet.</p>";
        }
        ?>

        <div class="buttons">
            <form method="post" action="vieworders.php">
                <button type="submit" name="clear_all" class="clear-btn">Clear All</button>
            </form>

            <form method="post" action="vieworders.php">
                <button type="submit" name="submit_order" class="submit-btn">Submit Order</button>
            </form>
        </div>
    </div>
</body>
</html>
