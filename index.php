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

    if ($result && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //var_dump($row);
            echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor']. " beds: ".$row['beds']. "<br>";
        }
    }

    $conn->close();

?>