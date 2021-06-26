<!-- Top Navigation Menu -->
<div class="topnav">
    <a href="index.php" class="active"><img id="logo" src="img/logo_small.png"></a>
    <!-- Navigation links (hidden by default) -->
    <div id="myLinks">
        <a href="index.php">Home</a>
        <?php

        require "php/database.php";

        $query = "SELECT * FROM Genre ORDER BY genre";
        $genres = [];
        if ($result = $DBverbinding->query($query)) {
            while ($row = mysqli_fetch_array($result)) {
                array_push($genres, $row);
            }
        }

        foreach($genres as $genre) {
            echo' <a href="genre.php?g='.$genre["g_id"].'">'.$genre["genre"].'</a>';
        }

        ?>
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