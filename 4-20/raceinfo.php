<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Race Info</title>
</head>
<body>

<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $conn = mysqli_connect("db.luddy.indiana.edu","i308s26_griffian","", "i308s26_griffian");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $raceYear = $_POST['race'];

    $getRaceInfo = "SELECT te.tname, re.ev_name, re.finish, re.fin_time FROM B_results AS re JOIN B_race AS ra ON re.race_id = ra.id JOIN B_team AS te ON re.team_id = te.id WHERE ra.race_year = $raceYear ORDER BY re.finish ASC";
    $result = mysqli_query($conn, $getRaceInfo);

    ?>

    <table border="1">
        <tr>
            <th>Team Name</th>
            <th>Event Name</th>
            <th>Finish Position</th> 
            <th>Finish Time</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['tname']; ?></td>
                <td><?php echo $row['ev_name']; ?></td>
                <td><?php echo $row['finish']; ?></td>
                <td><?php echo $row['fin_time']; ?></td>
            </tr>
        <?php } ?>

    
</body>
</html>