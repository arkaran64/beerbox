<?php
    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $user_id = $_SESSION['id'];
    $beer_id = ($_GET['id']);

    //requete de suppression
            $sth = $db->prepare("DELETE FROM beers WHERE id =  {$beer_id}");
            $sth->execute();

?>



<div class="container">
    <?php
        echo '<div class="alert-success
        ">
                <p> Article supprimé!</p>                    
             </div>';
        ?>
    <div class="row">
        <div>
            <a class="btn" href="profile.php">Retour</a>
        </div>
    </div>
</div>