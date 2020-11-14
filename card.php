<?php
$page = 'card';
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$id = $_GET['id'];

?>

<section id="beer_card">

    <div class="content">

        <div class="card">
            <?php
        displayBeer($id);

    ?>
        </div>

    </div>
    <a class="btn" href="beer_list.php" class="card-link">Retour</a>
</section>


<?php require 'assets/footer.php';
