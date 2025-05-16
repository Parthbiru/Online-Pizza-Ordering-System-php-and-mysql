<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Biru's Pizza</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            background: url('pepperoni1.jpg') no-repeat center center fixed;
            background-size: cover;
            

        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #FF0000;
            font-size: 60px;
            margin-bottom: 20px;
            font-family: 'Perpetua';
            -webkit-text-stroke: 1px #F8F8F8;
	        text-shadow: 0px 2px 4px red;

        }

        h4 {
            color: white;
            margin-bottom: 20px;
            font-family: 'Cedarville Cursive', cursive;
            /* -webkit-text-stroke: 1px #F8F8F8; */
        }

        p {
            color: #666;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 20px;
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

        /* Base button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #FFBF00;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
        }

        /* Hover effect */
        .button:hover {
            background-color: #FF0000 ;
        }

        /* Active effect */
        .button:active {
            background-color: black;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <a href="index.php">Home</a>
                <a href="login.php" class="align-right">Login</a>
                <a href="register.php" class="align-right">Register</a>
               
            </ul>
        </nav>
    </header>
</body>
<h1 style="margin-left:15%;margin-top: 15%;"> Food For </h1>
<h1 style="margin-left:15%;"> Your Soul</h1>
<h4 style="margin-left:15%;">It's about good food and fresh ingredients.</h4>
<a href="register.php">
    <button class="button" style="margin-left:15%;"> Register Here...!!!</button>
</a>

</html>
