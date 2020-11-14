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

            <div class="products">
                <?php
                        displayAllBeers();
                    ?>

            </div>
        </div>
    </div>
</section>


<?php include 'assets/footer.php';
