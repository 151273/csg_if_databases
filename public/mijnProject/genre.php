<?php

if (isset($_GET["g"])) {
    $genreId = $_GET["g"];
    require('php/database.php');

    $query = "SELECT * FROM Genre WHERE g_id=" . $genreId;

    if ($result = $DBverbinding->query($query)) {
        if ($result->num_rows == 1) {
            $genreInfo = mysqli_fetch_array($result);
            $result->free_result();
        } else {
            echo "Ongeldig genre!";
            exit();
        }
    }

    $films = [];
    $query = "SELECT * FROM Film WHERE g_id=" . $genreId;
    if ($result = $DBverbinding->query($query)) {
        while ($row = mysqli_fetch_array($result)) {
            array_push($films, $row);
        }
    }
} else {
    echo "Geen genre!";
}

?>
<?php
include "php/head.php";
include "php/header.php";
?>

<main>

    <div class="slideshow-container">
        <?php
        $total = sizeof($films);
        $huidig = 1;
        foreach ($films as $film) {
            $query = "SELECT COUNT(rating) AS ratingCount FROM Review WHERE f_id=" . $film["f_id"];
            if ($result = $DBverbinding->query($query)) {
                $ratingCount = mysqli_fetch_array($result);
                $result->free_result();
                if ($ratingCount["ratingCount"] > 0) {
                    $heeftRating = true;
                } else {
                    $heeftRating = false;
                }
            }
            if ($heeftRating) {
                $query = "SELECT AVG(rating) AS gemRating FROM Review WHERE f_id=" . $film["f_id"];
                if ($result = $DBverbinding->query($query)) {
                    $gemRating = mysqli_fetch_array($result);
                    $rating = ($gemRating["gemRating"] - 1.0) * 100;
                    $result->free_result();
                }
            }

            echo '<div class="mySlides fade">';
            echo '<div class="numbertext">' . $huidig . '/' . $total . '</div>';
            echo '<img src="' . $film["picture"] . '" style="width: 100%; border: solid 1.5px black;">';
            echo '<h1>' . $film["naam"] . '</h1>';
            echo '<p>' . $film["beschrijving"] . '</p>';
            echo ' <div class="rating">';

            if (isset($_GET["alreadyRated"])) {
                if ($_GET["alreadyRated"] == $film["f_id"]) {
                    echo '<p class="error">Je hebt al deze film gerated!</p>';
                }
            }
            if ($heeftRating) {
                echo '<p class="ratinglabel">Score: <strong>'. $rating . '%</strong></p>';
            } else {
                echo '<p class="ratinglabel">Nog geen rating!</p>';
            }
            echo '<form action="php/rate.php?v=2" method="post">
            <input type="hidden" name="film" value="' . $film["f_id"] . '">
            <input type="hidden" name="genre" value="' . $genreId . '">
            <button type="submit" value="1">Like</button>
            </form>
            <form action="php/rate.php?v=1" method="post">
            <input type="hidden" name="film" value="' . $film["f_id"] . '">
            <input type="hidden" name="genre" value="' . $genreId . '">
            <button type="submit" value="1">Dislike</button>
            </form>
            </div>';
            
            echo '</div>';
            $huidig++;
        }
        ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        // Next/previous controls
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        // Thumbnail image controls
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    <div id="Uitleg">
        <h5>Op deze pagina kan je 5 verschillende films van een genre beoordelen nadat je ze gezien hebt. Ook kan je kijken of een film je leuk lijkt door de uitleg en de beoordeling. </h5>
    </div>
</main>
<?php
include "php/footer.php";
?>