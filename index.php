<html>
<head>
    <style>

    </style>
    <title>Saintiolo Pizza</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
<style>
    /* Algemene stijlen */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f9f9f9;
        color: #333;
    }

    .main-content {

    }

    header {
        background-color: #d35400;
        color: white;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
    }

    nav ul li {
        margin: 0 10px;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 5px;
    }

    nav ul li a:hover {
        background-color: #e65c00;
    }

    .text-container {
        text-align: center;
        margin: 20px;
    }

    .pizza-card-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin: 20px;
    }

    .pizza-card {
        background-color: #fff;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 300px;
        margin: 10px;
        border-radius: 5px;
    }

    .pizza-card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .pizza-card img {
        width: 100%;
        height: auto;
        border-radius: 5px 5px 0 0;
    }

    .pizza-card h1 {
        margin: 10px;
    }

    .pizza-card p {
        margin: 10px;
    }

    .pizza-card a {
        display: inline-block;
        background-color: #d35400;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        margin: 10px;
    }

    .pizza-card a:hover {
        background-color: #d35400;
    }

    footer {
        background-color: #d35400;
        color: white;
        text-align: center;
        padding: 20px;
        position: fixed;
        bottom: 0;
        width: 100%;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    /* Responsive Design */
    @media screen and (max-width: 600px) {
        .pizza-card-box {
            flex-direction: column;
            align-items: center;
        }

        .pizza-card p {
            font-size: 20px;
        }
        .pizza-card {
            width: 90%;
            margin: 10px auto;
        }

        nav ul {
            flex-direction: column;
        }

        nav ul li {
            margin: 10px 0;
        }
    }

</style>
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="login.php">login</a></li>
        </ul>
    </nav>
</header>
<div class="text-container">
    Waar koolhydraten een spirituele ervaring zijn!<br>Hier wordt elke bite een reis naar een dieper niveau!
</div>

<div class="pizza-card-box">
    <div class="pizza-card">
        <h1>Saintiolo Pizza</h1>
        <img src="img/pizza.jpg" alt="Saintiolo Pizza">
        <p>Tomato sauce, mozzarella cheese, ham, mushrooms, and black olives.</p>
        <a href="menu.php">Order Now</a>
    </div>
    <div class="pizza-card">
        <h1>Saintiolo Pizza</h1>
        <img src="img/pizza3.jpg" alt="Saintiolo Pizza">
        <p>Tomato sauce, mozzarella cheese, ham, mushrooms, and black olives.</p>
        <a href="menu.php">Order Now</a>
    </div><div class="pizza-card">
        <h1>Saintiolo Pizza</h1>
        <img src="img/pizza1.jpg" alt="Saintiolo Pizza">
        <p>Tomato sauce, mozzarella cheese, ham, mushrooms, and black olives.</p>
        <a href="menu.php">Order Now</a>
    </div>
</div>
<footer>
    <p>Copyright &copy; 2024 Saintiolo Pizza</p>
</footer>
</body>
</html>