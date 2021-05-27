<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "dbhotel";

    // Connect
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        die();
    }

    $sql = "SELECT * FROM `stanze` ";
    $result = $conn->query($sql);

    $rooms = [];
    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
            $rooms[] = $row;
        }
    }

    //var_dump($rooms);

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista stanze</title>
</head>
<body>
    <h1>Lista stanze</h1>

    <ul>
        <?php foreach($rooms as $room) { ?>
            <li>
                numero stanza: <?php echo $rooms['room_number']; ?> <br>
                piano: <?php echo $rooms['floor']; ?> <br>
                <a href="">Vedi info stanza</a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>