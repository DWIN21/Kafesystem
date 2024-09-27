<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management</title>
    <link rel="shortcut icon" type="image/x-icon" href="Ka'fe logo.png">
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background: url('KAfe background.png') no-repeat center center fixed;
            background-size: cover;
            color: #4b3832;
            position: relative;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: cyan;
            color: #f5f0e1;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 43px;
            font-weight: bold;
            font-family: 'Times New Roman', cursive;
            color: rgb(81, 60, 32);
        }

        .navigation a {
            color: black;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            position: relative;
        }


        .navigation a:hover {
            color: #8e6e53;
        }

        .content {
            padding: 100px 20px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            width: 100%;
            max-width: 500px;
        }

        .form-container label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        .form-container input {
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #d9b38c;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #8e6e53;
            color: #f5f0e1;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            margin: 10px 0;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #7a5b46;
        }

        .inventory-section {
            width: 100%;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .inventory-section h2 {
            background-color: #d9b38c;
            padding: 10px;
            border-radius: 5px;
            color: #4b3832;
            text-align: center;
            margin-bottom: 20px;
        }

        .inventory-section ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .inventory-section li {
            background-color: #f5f0e1;
            margin: 10px 0;
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.3s;
        }

        .inventory-section li:hover {
            transform: scale(1.02);
        }

        .inventory-section li button {
            background-color: #8e6e53;
            color: #f5f0e1;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            padding: 5px 10px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .inventory-section li button:hover {
            background-color: #7a5b46;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            color: rgb(81, 60, 32);
        }
    </style>
</head>
<body>
    <header>
        <h1 class="logo">INVENTORY MANAGEMENT</h1>
        <nav class="navigation">
            <a href="Home_test.html">Home</a>
            <a href="Menu_test.html">Menu</a>
            <a href="Inventory_test.html">Inventory</a>
            <a href="POS_test.html">POS</a>
            <a href="Report_test.html">Report</a>
            <a href="About_us.html">About us</a>
        </nav>   
    </header>
    <main class="content">
        <div class="form-container">
            <h2>Add Product</h2>
            <label for="product-name">Product Name</label>
            <input type="text" id="product-name" placeholder="Product Name" required>
            <label for="product-quantity">Quantity</label>
            <input type="number" id="product-quantity" placeholder="Quantity" required>
            <label for="product-unit">Unit</label>
            <input type="text" id="product-unit" placeholder="Unit (e.g., kg, L, pcs)" required>
            <button>Add Product</button>
        </div>
        <div class="inventory-section">
            <h2>Raw Products</h2>
            <ul>
                <li>Example Product 1 - Quantity: 10 kg <button>-</button></li>
                <li>Example Product 2 - Quantity: 5 L <button>-</button></li>
                <li>Example Product 3 - Quantity: 20 pcs <button>-</button></li>
            </ul>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Ka'fe. All rights reserved.</p>
    </footer>
</body>
</html>