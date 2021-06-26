<?php

if (isset($_GET['v'])) {
    require('database.php');
    
    $waarde = $_GET['v'];
    if ($waarde == 1 || $waarde == 2) {
        $film = $_POST['film'];
        $uid = $_SERVER['REMOTE_ADDR']; // Gebruik IP adres ofzo
        $query = "INSERT INTO Review (f_id, rating, uid) VALUES ($film, '$waarde', '$uid')";
        if ($result = $DBverbinding->query($query)) {
            header("Location: ../genre.php?g=weetikniet");
        }
        else {
            exit();
        }
    }
}
