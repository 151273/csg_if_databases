<?php

if (isset($_GET['v'])) {
    require('database.php');

    $waarde = $_GET['v'];
    if ($waarde == 1 || $waarde == 2) {
        // Check
        $uid = $_SERVER['REMOTE_ADDR']; // Gebruik IP adres ofzo

        $query = "SELECT uid FROM Review WHERE f_id=$film";
        $gebruikers = [];
        $gereviewd = false;
        if ($result = $DBverbinding->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($gebruikers, $row);
            }
        }

        foreach ($gebruikers as $gebruiker) {
            if ($uid == $gebruiker) {
                $gereviewd = true;
            }
        }


        
        $genre = $_POST['genre'];
        $film = $_POST['film'];

        if ($gereviewd) {
            // Verstuur rating
            $query = "INSERT INTO Review (f_id, rating, uid) VALUES ($film, '$waarde', '$uid')";
            if ($result = $DBverbinding->query($query)) {
                header("Location: ../genre.php?g=" . $genre);
            } else {
                exit();
            }
        } else {
            header("Location: ../genre.php?g=" . $genre."&alreadyRated=".$film);
        }
    }
}
