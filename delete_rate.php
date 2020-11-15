<?php
    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $user_id = $_SESSION['id'];
    $rate_id = ($_GET['id']);

    //requete de suppression
$sth = $db->prepare("DELETE FROM rating WHERE rating_id =  {$rate_id} AND id_users = {$user_id}");
            $sth->execute();

            header('Location:profile.php?deleterate');

?>



<div class="container">
    <div class="row">
        <div>
            <a class="btn" href="profile.php">Retour</a>
        </div>
    </div>
</div>