<?php
    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $user_id = $_SESSION['id'];
    $member_id = ($_POST['id']);

    //requete de suppression
    if (isset($_POST['sub_delete'])) {
        $sth = $db->prepare("DELETE FROM users WHERE id =  {$member_id}");
        $sth->execute();
        $cleanup1 = $db->prepare("DELETE * FROM beers WHERE author_article ={$member_id}");
        $cleanup1->execute();
        $cleanup2 = $db->prepare("DELETE * FROM rating WHERE id_users ={$member_id}");
        $cleanup2->execute();
        header('Location:my_users.php?delete');
    }

?>


<div class="container">

    <div class="row">
        <?php
        echo '<div class="alert-success">
                <p> Utilisateur supprimé!</p>                    
             </div>';
        ?>
        <div class="row">
            <div>
                <a class="btn" href="profile.php">Retour</a>
            </div>
        </div>
    </div>
</div>