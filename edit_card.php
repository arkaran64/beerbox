<?php
require 'inc/connect.php';
require 'inc/functions.php';
include 'assets/head.php';
include 'assets/nav.php';
$beer_id = ($_GET['id']);
$user_id = $_SESSION['id'];

// Requete de selection
$sql1 = $db->query("SELECT * FROM beers LEFT JOIN color on beers.id_color = color.color_id LEFT JOIN country ON beers.id_country = country.country_id WHERE beers.id = {$beer_id}");
//$sth2 = $db->prepare("SELECT * FROM beers LEFT JOIN rating AS r ON r.id_beer=b.id WHERE id = {$beer_id}");
$beer = $sql1->fetch(PDO::FETCH_ASSOC);

$sql2 = $db->query('SELECT * FROM color');
$color = $sql2->fetchAll(PDO::FETCH_ASSOC);

$sql3 = $db->query('SELECT * FROM country');
$country = $sql3->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="edit_card">
    <div class="form-box">
        <form class="edit_card-form" action="edit_card_post.php" method="POST" enctype="multipart/form-data"
            class="edit-form">
            <h2>Modifier:</h2>
            <div class="textbox">
                <i class="fas fa-wine-bottle"></i>
                <input type="text" class="form-control" name="name" id="name"
                    value="<?php echo $beer['name']; ?>">
            </div>

            <div class="textbox">
                <i class="fas fa-tint"></i>
                <select name="type" id="type">
                    <option
                        value="<?php echo $beer['id_color']; ?>"
                        selected>
                        -- <?php echo $beer['color_name']; ?>
                        --
                    </option>
                    <?php foreach ($color as $c) { ?>
                    <option
                        value=" <?php echo $c['color_id']; ?>">
                        <?php echo $c['color_name']; ?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="textbox">
                <i class="far fa-flag"></i>
                <select name="country" id="country">
                    <option
                        value="<?php echo $beer['id_country']; ?>">
                        --<?php echo $beer['country_name']; ?>--
                    </option>
                    <?php foreach ($color as $c) { ?>
                    <option
                        value=" <?php echo $c['color_id']; ?>">
                        <?php echo $c['color_name']; ?>
                    </option>
                    <?php } ?>

                </select>
            </div>

            <div class="textbox">
                <i class="fas fa-percent"></i>
                <input type="text" class="form-control" id="alchool_edit" name="alchool"
                    value="<?php echo $beer['alchoolpercent']; ?>">
            </div>

            <div class="textbox">
                <i class="far fa-file-alt"></i>
                <textarea class="form-control" name="description" rows="3" placeholder="Description" id="description"
                    required
                    placeholder="description"><?php echo $beer['description']; ?></textarea>
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

require 'assets/footer.php';
