<?php
require 'db1.php';

session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

if (isset($_POST['add_to_cart'])) {
    $pizza_name = $_POST['pizza_name'];
    $pizza_price = $_POST['pizza_price'];
    $quantity = $_POST['quantity'];

    if ($quantity > 0) {
        // Prepare SQL query to insert order
        $query = "INSERT INTO orders (pizza_name, quantity, price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sid", $pizza_name, $quantity, $pizza_price);

        if ($stmt->execute()) {
            echo "<script>alert('Pizza added to cart successfully!');</script>";
        } else {
            echo "<script>alert('Failed to add pizza to cart. Please try again.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please select a valid quantity.');</script>";
    }
}
?>
<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Menu</title>
    <style>
        /* Add CSS styles for formatting */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
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

        .pizza-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .pizza-details {
            flex: 1;
        }

        .pizza-price {
            font-weight: bold;
            color: #ff5733;
        }

        /* Add a new style for the "View Orders" link */
        a.view-orders {
            text-decoration: none;
            background-color: grey;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        /* Change the link color on hover */
        a.view-orders:hover {
            background-color: Orange;
            color: white;
        }

        .menu-item {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* .menu-item img {
            max-width: 100%;
            height: auto;
        } */
        .menu-item img {
            width: 400px;
            height: 250px;
            object-fit: cover; /* This ensures the images maintain their aspect ratio within the fixed dimensions */
            margin-right: 10px;
            border-radius: 2px;
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
        image{
            width : 300px;
            height :300px;
        }

        

        
    </style>
    <nav>
            <ul class="menu">
                <a href="index.php">Home</a>
                <a href="menu.php">Menu</a>
                <a href="vieworders.php">View Orders</a>
                <a href="about.php">About us</a>
                <a href="contact.php">Contact</a>
                <a href="logout.php">Logout</a>
            </ul>
            
    </nav>
</head>

<body>
    <div class="menu-container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>   !</h2>
        
        <h1>Pizza Menu</h1>

        <!-- Pizza Item 1 -->
        <form method="post" action="menu.php">
            <article class="menu-item">
                <div class="pizza-item">
                    <div class="pizza-details">
                        <img src="Margherita.jpg" alt="Margherita Pizza">
                        <h2>Margherita Pizza</h2>
                        <p>Tomato sauce, mozzarella cheese, basil</p>
                    </div>
                    <div class="pizza-price">299 Rs </div>
                    <div class="pizza-quantity">
                        <input type="number" name="quantity" value="0" min="0">
                    </div>
                    <div class="pizza-action">
                        <input type="hidden" name="pizza_name" value="Margherita Pizza">
                        <input type="hidden" name="pizza_price" value="299">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </div>
                </div>
            </article>
        </form>

        <!-- Pizza Item 2 -->
        <form method="post" action="menu.php">
            <article class="menu-item">
                <div class="pizza-item">
                    <div class="pizza-details">
                        <img  src="pepperoni.jpg" alt="Pepperoni Pizza">
                        <h2>Pepperoni Pizza</h2>
                        <p>Tomato sauce, pepperoni, mozzarella cheese</p>
                    </div>
                    <div class="pizza-price">399 Rs </div>
                    <div class="pizza-quantity">
                        <input type="number" name="quantity" value="0" min="0">
                    </div>
                    <div class="pizza-action">
                        <input type="hidden" name="pizza_name" value="Pepperoni Pizza">
                        <input type="hidden" name="pizza_price" value="399">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </div>
                </div>
            </article>
        </form>

        <!-- Add more pizza items here -->
         <!-- Pizza Item 3 -->
        <form method="post" action="menu.php">
            <article class="menu-item">
                <div class="pizza-item">
                    <div class="pizza-details">
                        <img src="CHEESENCORNn.jpg" alt="Chesses & Corn Pizza">
                        <h2>Chesses & Corn Pizza</h2>
                        <p>Cheese I Golden Corn | Cheese n Corn Pizza</p>
                    </div>
                    <div class="pizza-price">249 Rs </div>
                    <div class="pizza-quantity">
                        <input type="number" name="quantity" value="0" min="0">
                    </div>
                    <div class="pizza-action">
                        <input type="hidden" name="pizza_name" value="Chesses & Corn Pizza">
                        <input type="hidden" name="pizza_price" value="299">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </div>
                </div>
            </article>
        </form>

        <!-- Pizza Item 4 -->
        <form method="post" action="menu.php">
            <article class="menu-item">
                <div class="pizza-item">
                    <div class="pizza-details">
                        <img src="vegCheeseBurstPizza.jpg" alt="VegCheeseBurstPizza">
                        <h2>Veg Cheese Burst Pizza</h2>
                        <p>bursting with cheese,mozzarella cheese </p>
                    </div>
                    <div class="pizza-price">349 Rs </div>
                    <div class="pizza-quantity">
                        <input type="number" name="quantity" value="0" min="0">
                    </div>
                    <div class="pizza-action">
                        <input type="hidden" name="pizza_name" value="VegCheeseBurstPizza">
                        <input type="hidden" name="pizza_price" value="349">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </div>
                </div>
            </article>
        </form>

    </div><br><br>
    <!-- Add a link to view orders -->
    <center>
        <a href="vieworders.php" class="view-orders">View Orders</a>
    </center>
</body>

</html>
