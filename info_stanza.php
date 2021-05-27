<?php
    require_once __DIR__ . '/database.php';

    $room_id = $_GET['id'];

    $sql = "SELECT * FROM `stanze` WHERE `id` = " . $room_id . ";";
    $result = $conn->query($sql);


    $rooms = [];

    if ($result && $result->num_rows > 0) {
        // output data of each row
        $rooms = $result->fetch_assoc();
    }

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>info stanze</title>
</head>
<body>

    <a href="/php-hotel-crud">Torna all'elenco delle stanze</a>

    <h1>Info stanza numero <?php echo $rooms['room_number']; ?></h1>

    <ul>
        <li>Numero di letti: <?php echo $rooms['beds']; ?></li>
        <li>Piano: <?php echo $rooms['floor']; ?></li>
    </ul>
</body>
</html>