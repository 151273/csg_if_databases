<?php
error_reporting(E_ALL & ~E_NOTICE);
require('php/database.php');

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
?>
<!DOCTYPE html>
<html>

<head>
    <title>Rate a film!</title>
    <link rel="stylesheet" type="text/css" href="css/design.css">
    <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Top Navigation Menu -->
    <div class="topnav">
        <a href="#home" class="active"><img id= "logo" src="images/logo_small.png"></a>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
             <a href="#Actie">Actie</a>
             <a href="#Komedie">Komedie</a>
             <a href="#Romantiek">Romantiek</a>
             <a href="#Sci-fi">Sci-fi</a>
             <a href="#Fantasie">Fantasie</a>
             <a href="#Voorhethelegezin">Voor het hele gezin</a>      
        </div>
        <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    
        <script>
            /* Toggle between showing and hiding the navigation menu links when the user clicks on the hamburger menu / bar icon */
            function myFunction() {
                var x = document.getElementById("myLinks");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </div>
    <div id="container">
        <h1>
            <?php echo 'een <strong>klein</strong> stukje PHP'; ?>
        </h1>
        <img src="images/klinkt logisch.png">
    </div>
</body>

</html>