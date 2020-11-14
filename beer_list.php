<?php
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
//$user_id = $_SESSION['id'];

?>


<!-- Liste des Bieres -->
<section id="beers_list">
    <div class="product-filter">
        <h2>Liste des bières</h>


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
