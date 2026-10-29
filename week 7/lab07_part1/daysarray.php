
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>task 2</title>
</head>
<body>
    <h1>PHP Variables, arrays and operators</h1>

    <?php
    $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

    echo "The days of the week in English are:<br>";

    for ($i = 0; $i < count($days); $i++) {
        echo $days[$i];

        if ($i < count($days) - 1) {
            echo ", ";
        } else {
            echo ".";
        }
    }
    echo "<br> <br>";

    $days = array( "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" );
    echo "the days of the week in French are:<br>";
    for ($i = 0; $i < count($days); $i++) {
        echo $days[$i];

        if ($i < count($days) - 1) {
            echo ", ";
        } else {
            echo ".";
        }
    }
    ?>
</body>
</html>
