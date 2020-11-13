<?php
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$user_id = $_SESSION['id'];

?>


<section class="my_beers">
    <h2 class="section-title">Mes vins :</h2>

    <div class="content">
        <?php echo
            displayAllBeersByUser($user_id);
        ?>
    </div>
    <div>
        <a class="back-btn"
            href="profile.php?id=<?php echo $user_id; ?>">retour</a>
    </div>

</section>


<?php require 'assets/footer.php';
