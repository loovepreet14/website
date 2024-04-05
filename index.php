<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Catalog</title>
    <style>
        /* CSS styles */
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Car Catalog</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
            </tr>
            <?php
            // Connect to database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cars_database";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from database
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["brand"]."</td>";
                    echo "<td>".$row["model"]."</td>";
                    echo "<td>".$row["year"]."</td>";
                    echo "<td>$".$row["price"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
