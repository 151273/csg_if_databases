<!-- Top Navigation Menu -->
<div class="topnav">
    <a href="#home" class="active"><img id="logo" src="images/logo_small.png"></a>
    <!-- Navigation links (hidden by default) -->
    <div id="myLinks">
        <a href="index.php">Home</a>
        <?php

        ?>
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