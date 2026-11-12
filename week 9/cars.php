
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
</head>
<body>
    <h1>Cars</h1>
    <?php
    require_once "settings.php";
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if ($dbconn) {
        $query = "SELECT * FROM cars";
        $result = mysqli_query($dbconn, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr>
                        <th>Car ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Year</th>
                    </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['car_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['make']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['model']) . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['yom'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p>There are no cars to display.</p>";
            }
        } else {
            echo "<p>Something went wrong with the query.</p>";
        }

        mysqli_close($dbconn);
    } else {
        echo "<p>Unable to connect to the database.</p>";
    }
    ?>
</body>
</html>

