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
                <input type="text" class="form-control" name="name" id="name" placeholder="nom">
            </div>

            <div class="textbox">
                <i class="fas fa-tint"></i>
                <select name="color" id="color">
                    <option value="">--Choisir une option--</option>
                    <option value="1">Blonde</option>
                    <option value="2">Blanche</option>
                    <option value="3">Rousse</option>
                    <option value="4">Brune</option>
                    <option value="5">IPA</option>
                </select>
            </div>

            <div class="textbox">
                <i class="far fa-flag"></i>
                <select name="country" id="country">
                    <option value="">--Choisir un pays--</option>
                    <option value="1">Allemagne</option>
                    <option value="2">Belgique</option>
                    <option value="3">Espagne</option>
                    <option value="4">Etats-Unis</option>
                    <option value="5">France</option>
                    <option value="6">Irlande</option>
                    <option value="7">Mexique</option>
                    <option value="8">Pays-Bas</option>
                    <option value="9">Japon</option>
                    <option value="10">Royaume-Uni</option>

                </select>
            </div>

            <div class="textbox">
                <i class="fas fa-percent"></i>
                <input type="text" class="form-control" id="alchool_edit" name="alchool" placeholder="Taux d'alchool">
            </div>

            <div class="textbox">
                <i class="far fa-file-alt"></i>
                <textarea class="form-control" name="description" rows="3" placeholder="Description" id="description"
                    required placeholder="description"></textarea>
            </div>

            <div class="textbox">
                <i class="far fa-file-image"></i>
                <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif" placeholder="image">
            </div>

            <div class="textbox">
                <i class="fab fa-ravelry"></i>
                <input type="text" class="form-control" name="rate" id="rate" placeholder="note /10">
            </div>

            <div class="textbox">
                <i class="fas fa-comment"></i>
                <input type="text" class="form-control" name="comment" id="comment" placeholder="commentaire">
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
