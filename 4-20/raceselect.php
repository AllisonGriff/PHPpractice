<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Select</title>
</head>
<body>
 <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $conn = mysqli_connect("db.luddy.indiana.edu","i308s26_griffian","", "i308s26_griffian");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $getYears = "SELECT UNIQUE race_year FROM B_race ORDER BY race_year DESC";
    $result = mysqli_query($conn, $getYears);
?>

    <form action="raceinfo.php" method="post">
        <select name="race" id="race">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?php echo $row['race_year']; ?>"><?php echo $row['race_year']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
        