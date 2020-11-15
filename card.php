<?php
$page = 'card';
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$id = $_GET['id'];
$user_id = $_SESSION['id'];

if (isset($_POST['submit']) && (!empty($_POST['rate']) || !empty($_POST['comment']))) {
    $rate = $_POST['rate'];
    $comment = $_POST['comment'];

    $sth = $db->prepare('INSERT INTO rating (id_users,id_beer, rate, comment) VALUES (:id_users, :id_beer, :rate, :comment)');
    $sth->bindValue(':id_users', $user_id);
    $sth->bindValue(':id_beer', $id);
    $sth->bindValue(':rate', $rate);
    $sth->bindValue(':comment', $comment);

    $sth->execute();
}

?>

<section id="beer_card">
    <?php if (isset($_GET['new'])) {
    echo '<div class="alert alert-success
        ">
                <p> Votre bière a bien été ajouté, voici un aperçu de votre entrée !</p>                    
             </div>';
}
?>
    <div class="content">

        <div class="card">
            <?php
        displayBeer($id);

    ?>
        </div>

    </div>
    <a class="btn" href="beer_list.php" class="card-link">Retour</a>
</section>
<section class="form_comment" id="beer_comment">
    <div class="form-box">
        <form
            action="<?php $_SERVER['REQUEST_URI']; ?>"
            method="post">

            <div class="textbox">
                <i class="fab fa-ravelry"></i>
                <input type="number" class="form-control" min=0 max=10 name="rate" id="rate" placeholder="note /10">
            </div>
            <div class="textbox">
                <i class="far fa-file-alt"></i>
                <textarea class="form-control" name="comment" rows="2" placeholder="Votre commentaire" id="comment"
                    required></textarea>
            </div>
            <div class="textbox">
                <label class="form-check-label" for="gridCheck">
                    J'accepte les CGU
                </label>
                <input class="form-check-input" type="checkbox" id="gridCheck">
            </div>
            <input type="submit" class="btn " name="submit" value="Noter/Commenter" />
        </form>
    </div>
</section>

<div id="beer_ratings">
    <?php displayRating($id); ?>
</div>


<?php require 'assets/footer.php';
