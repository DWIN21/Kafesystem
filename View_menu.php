<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="shortcut icon" type="x-icon" href="Ka'fe logo.png"> <!-- KA'fe logo added -->
    <link rel="stylesheet" href="css/login_tset.css"> <!-- Link to CSS file -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000; /* Black background color */
            color: #f8f4f0; /* Light text color */
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #333; /* Darker gray for header */
            color: #fff;
        }

        h1.logo {
            font-size: 2.5em;
            margin: 0;
            font-family: 'Georgia', serif;
            color: #f8f4f0; /* Light color for the logo text */
        }

        form {
            text-align: center;
            margin: 20px 0;
        }

        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #555; /* Darker border */
            border-radius: 5px;
            background-color: #333; /* Darker background for dropdown */
            color: #f8f4f0; /* Light text color */
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #111; /* Dark background for table */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #555; /* Darker border for rows */
        }

        th {
            background-color: #444; /* Darker header */
            color: #f8f4f0; /* Light text for contrast */
            font-weight: bold;
        }

        td {
            background-color: #222; /* Slightly lighter background for rows */
            color: #f8f4f0; /* Light text color */
        }

        .menu-image {
            width: 120px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.1);
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #444; /* Darker background */
            color: #f8f4f0; /* Light text color */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #555; /* Slightly lighter on hover */
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #333; /* Darker gray for footer */
            color: #f8f4f0;
            margin-top: 40px;
        }

        footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <header>
        <h1 class="logo">KA'fe Menu</h1>
        <form method="post" action="">
            <label for="category">Select Category:</label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <?php
                include('conn/connection.php');

                $sql_categories = "SELECT DISTINCT Category FROM menuitem";
                $result_categories = $conn->query($sql_categories);

                if ($result_categories->num_rows > 0) {
                    while ($row = $result_categories->fetch_assoc()) {
                        $selected = isset($_POST['category']) && $_POST['category'] == $row['Category'] ? 'selected' : '';
                        echo "<option value='" . $row['Category'] . "' $selected>" . $row['Category'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No categories available</option>";
                }
                ?>
            </select>
        </form>
        <!-- Back Button -->
        <button class="back-button" onclick="history.back()">Back</button> <!-- JavaScript to go back -->
    </header>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selected_category = isset($_POST['category']) ? $_POST['category'] : '';

            $sql = "SELECT * FROM menuitem";
            if ($selected_category) {
                $sql .= " WHERE Category='$selected_category'";
            }

            $result = $conn->query($sql);

            if (!$result) {
                die("Error executing query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='Admin/uploads/" . $row['ImageName'] . "' alt='" . $row['ItemName'] . "' class='menu-image'></td>";
                    echo "<td>" . $row['ItemName'] . "</td>";
                    echo "<td>" . $row['Price'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No items found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <footer>
        <p>San Jose, Blanga, Bataan.</p>
        <p><u>0956 490 2330</u></p>
        <p><u>kafecoffeehouse@gmail.com</u></p>
        <p>&copy; 2024 Ka'fe. All rights reserved.</p>
    </footer>
</body>

</html>
