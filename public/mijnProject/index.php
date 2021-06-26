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
    <body style="background-image: url('images/achtergrond.jpg');">
</head>

<body>
    <!-- Top Navigation Menu -->
    <div class="topnav">
        <a href="#home" class="active"><img id="logo" src="images/logo_small.png"></a>
        <!-- Navigation links (hidden by default) -->
        <div id="myLinks">
            <a href="index.php">Home</a>
            <a href="html/actie.html">Actie</a>
            <a href="html/komedie.html">Komedie</a>
            <a href="html/romantiek.html">Romantiek</a>
            <a href="html/sci-fic.html">Sci-fi</a>
            <a href="html/fantasie.html">Fantasie</a>
            <a href="html/voorhethelegezin.html">Voor het hele gezin</a>
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
    
        <h1> Welkom bij rate a film!</h1>
        
            <?php echo 'Op deze website kun je verschillende films raten. Dit zijn films die horen bij de genres die je kan raten zijn actie films, romantische films, films voor het hele gezin, fantasie films en komedie films. '; ?>
        
    <div id="Filmtop3">
        <p>Top 3 Actiefilms:</p>
        <ul> 
         <li>top1</li>
         <li>top2</li>
         <li>top3</li>  
        </ul>
    </div>


<!--<img class= Voor src="images/website.jpg">-->

</html>