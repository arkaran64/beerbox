<?php
require 'inc/connect.php';
require 'inc/functions.php';
include 'assets/head.php';
include 'assets/nav.php';
$beer_id = ($_GET['id']);
$user_id = $_SESSION['id'];

// Requete de selection
$sth = $db->prepare("SELECT * FROM beers LEFT JOIN color on beers.id = color.id WHERE id = {$beer_id}");
//$sth2 = $db->prepare("SELECT * FROM beers LEFT JOIN rating AS r ON r.id_beer=b.id WHERE id = {$beer_id}");
$sth->execute();
//$sth2->execute();

while ($data = $sth->fetch()) {
    ?>

<section id="edit_card">
    <div class="form-box">
        <form class="edit_card-form" action="edit_card_post.php" method="POST" enctype="multipart/form-data"
            class="edit-form">
            <h2>Modifier:</h2>
            <div class="textbox">
                <i class="fas fa-wine-bottle"></i>
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
            </div>

            <div class="textbox">
                <i class="fas fa-tint"></i>
                <select name="type" id="type">
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
                <input type="text" class="form-control" id="alchool_edit" name="alchool"
                    value="<?php echo $data['alchoolpercent']; ?>">
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

            <div class="textbox">
                <input type="hidden" name="beer_id"
                    value="<?php echo $beer_id; ?>">
                <input type="submit" class="btn" name="submit_mod" value="Modifier" />
            </div>
        </form>
    </div>

</section>


<?php
}

require 'assets/footer.php';
