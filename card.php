<?php
$page = 'card';
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$id = $_GET['id'];

?>

<section id="beer_card">
    <div id="wrapper">
        <div class="wrapper-holder">

            <?php
        displayBeer($id);
    ?>
        </div>
    </div>
</section>



<?php require 'assets/footer.php';
