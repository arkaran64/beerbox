<?php
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$user_id = $_SESSION['id'];

// if (isset($_SESSION['id']) && 1 === $_SESSION['id']) {
    ?>


<section class="my_users">
    <h2 class="section-title">Liste des membres :</h2>

    <div class="content">
        <?php echo
            displayAllUsers(); ?>
    </div>
    <div>
        <a class="back-btn"
            href="profile.php?id=<?php echo $user_id; ?>">retour</a>
    </div>

</section>


<?php
// }
require 'assets/footer.php';
