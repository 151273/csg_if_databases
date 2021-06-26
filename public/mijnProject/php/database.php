<?php
$servernaam = "localhost";
$gebruikersnaam = "username";
$wachtwoord = "password";
$database = "films";

error_reporting(E_ALL & ~E_NOTICE);

//maak databaseverbinding met de gegevens uit database.php
$DBverbinding = mysqli_connect($servernaam, $gebruikersnaam, $wachtwoord, $database);
// Controleer de verbinding
if (!$DBverbinding) {
    // Geef de foutmelding die de server teruggeeft en stop met de uitvoer van PHP (die)
    die("Verbinding mislukt: " . mysqli_connect_error());
} else {
    // Dit gedeelte laat je normaliter weg, maar is hier ter illustratie toegevoegd
    //echo '<i>verbinding database succesvol</i>';
}
