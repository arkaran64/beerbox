<?php
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
//$user_id = $_SESSION['id'];

?>


<!-- Liste des Bieres -->
<section id="beers_list">
    <div id="wrapper">
        <div class="wrapper-holder">
            <header id="header">
                <h2 class="title">Liste des bières:</h2>
            </header>
            <hr>
            <div class="bar">
                <div class="bar-frame">
                    <ul class="breadcrumbs">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="beer_list.php">Liste des bieres</a></li>
                    </ul>
                </div>
            </div>
            <div class="products">
                <?php
                        displayAllBeers();
                    ?>

            </div>
        </div>
    </div>
</section>


<?php include 'assets/footer.php';
