<?php

require 'inc/functions.php';
require 'inc/connect.php';
include 'assets/head.php';
include 'assets/nav.php';
$page = 'create_card';
$id = $_SESSION['id'];

if (isset($_GET['e']) && '1' == $_GET['e']) {
    echo "<div class='col-12 alert alert-danger text-center'> Tous les champs n'ont pas été renseignés. </div>";
} elseif (isset($_GET['e']) && '2' == $_GET['e']) {
    echo "<div class='col-12 alert alert-danger text-center'> Le fichier téléchargé est trop grand (10Mb maximum). </div>";
} elseif (isset($_GET['e']) && '3' == $_GET['e']) {
    echo "<div class='col-12 alert alert-danger text-center'> Le fichier téléchargé est invalide (Seules les images sont acceptées). </div>";
} elseif (isset($_GET['e']) && '4' == $_GET['e']) {
    echo "<div class='col-12 alert alert-danger text-center'> Une erreur est survenue ! </div>";
}
?>

<section id="create_beer">
    <div class="form-box">
        <form action="create_card_post.php" method="POST" enctype="multipart/form-data" class="edit-form">
            <h2>Ajouter une bière</h2>
            <div class="textbox">
                <i class="fas fa-wine-bottle"></i>
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
            </div>

            <div class="textbox">
                <i class="fas fa-tint"></i>
                <input type="text" class="form-control" name="type" id="type" placeholder="type">
            </div>

            <div class="textbox">
                <i class="far fa-flag"></i>
                <input type="text" class="form-control" name="country" id="country" placeholder="country">
            </div>

            <div class="textbox">
                <i class="far fa-file-alt"></i>
                <textarea class="form-control" name="description" rows="3" placeholder="Description" id="description"
                    required placeholder="description"></textarea>
            </div>

            <div class="textbox">
                <i class="far fa-file-image"></i>
                <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif">
            </div>

            <div class="textbox">
                <i class="fab fa-ravelry"></i>
                <input type="text" class="form-control" name="rate" id="rate" placeholder="rate">
            </div>

            <div class="textbox">
                <i class="fas fa-comment"></i>
                <input type="text" class="form-control" name="comment" id="comment" placeholder="comment">
            </div>

            <div class="textbox">
                <label class="form-check-label" for="gridCheck">
                    J'accepte les CGU
                </label>
                <input class="form-check-input" type="checkbox" id="gridCheck">
            </div>

            <input type="hidden" name="user_id"
                value="<?php echo $id; ?>">
            <input type="submit" class="btn " name="submit" value="Créer!" />

            <br>
            <a class="back"
                href="profile.php?id=<?php echo $user_id; ?>">Retour</a>
        </form>
    </div>
    <br>
</section>

<?php include 'assets/footer.php';
