<?php
require 'inc/connect.php';
require 'inc/functions.php';
include 'assets/head.php';
include 'assets/nav.php';
$beer_id = ($_GET['id']);
$user_id = $_SESSION['id'];

// Requete de selection
$sth = $db->prepare("SELECT * FROM beers LEFT JOIN color AS c ON c.id_beer=b.id WHERE id = {$beer_id}");

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

</section>


<?php
}

require 'assets/footer.php';
