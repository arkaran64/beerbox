<?php
require 'inc/connect.php';
require 'inc/functions.php';
require 'assets/head.php';
include 'assets/nav.php';
$beer_id = ($_GET['id']);
$user_id = $_SESSION['id'];

// Requete de selection
$sth = $db->prepare("SELECT b.*,c.couleur,n.note FROM bieres AS b INNER JOIN couleur AS c ON c.id_beer=b.id INNER JOIN note AS n ON n.id_beer = b.id WHERE b.id = {$beer_id}");

$sth->execute();

while ($data = $sth->fetch()) {
    ?>

<section id="edit_card">
    <div class="edit_card-box">
        <form class="edit_card-form" action="edit_card_post.php" method="POST" enctype="multipart/form-data"
            class="edit-form">
            <h2>Modifier:</h2>
            <div class="textbox">
                <i class="fas fa-wine-bottle"></i>">
                <input type="text" class="form-control" name="name" id="name_edit"
                    value="<?php echo $data['name']; ?>">
            </div>
            <div class="textbox">
                <i class="fas fa-tint"></i>
                <input type="text" class="form-control" name="color" id="color_edit"
                    value="<?php echo $data['type']; ?>">
            </div>
            <div class="textbox">
                <i class="far fa-flag"></i>
                <input type="text" class="form-control" id="country_edit" name="country"
                    value="<?php echo $data['country']; ?>">
            </div>
            <div class="textbox">
                <i class="far fa-file-alt"></i>
                <textarea class="form-control" name="description" rows="5"
                    value="<?php echo $data['description']; ?>"
                    id="desc_edit" required></textarea>
            </div>
            <div class="textbox">
                <i class="far fa-file-image"></i>
                <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif"
                    value="<?php echo $data['image_url']; ?> ">
            </div>

            <div class="textbox">
                <input type="hidden" name="beer_id"
                    value="<?php echo $beer_id; ?>">
                <input type="submit" class="btn" name="submit_mod" value="Modifier" />
            </div>
        </form>
    </div>

    <section id="edit_card">
        <h2 class="section-title">Modifier:</h2>
        <div class="content">
            <form action="edit_card_post.php" method="POST" enctype="multipart/form-data" class="edit-form">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name_edit"
                        value="<?php echo $data['name']; ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="type" id="type_edit"
                        value="<?php echo $data['type']; ?>">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="country_edit" name="country"
                        value="<?php echo $data['country']; ?>">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" rows="5"
                        value="<?php echo $data['description']; ?>"
                        id="desc_edit" required></textarea>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="rate" id="rat_edit"
                        value="<?php echo $data['note']; ?>">
                </div>

                <div class="form-group">
                    <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif"
                        value="<?php echo $data['image_url']; ?> ">
                </div>

                <div class="textbox">
                    <input type="hidden" name="beer_id"
                        value="<?php echo $beer_id; ?>">
                    <input type="submit" class="btn" name="submit_mod" value="Modifier" />
                </div>
            </form>
        </div>
        <br>
        <div class="back">
            <a class="btn"
                href="my_beers.php?id=<?php echo $user_id; ?>">Retour</a>
        </div>

    </section>


    <?php
}

require 'assets/footer.php';
