<?php
$page = 'profile';
require 'inc/connect.php';
require 'inc/functions.php';
include 'assets/head.php';
include 'assets/nav.php';
$user_id = $_SESSION['id'];

$sql1 = $db->query("SELECT COUNT(*) FROM beers WHERE beers.author_article = {$user_id}");
$compteur = $sql1->fetchColumn();

// Requete de selection
$sth = $db->prepare("SELECT * FROM users WHERE id = {$user_id}
    ");

$sth->execute();

$result = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $userData => $data) {
    ?>
<section id="edit_user">
    <?php
       if (isset($_GET['signup'])) {
           $message = 'Vous bien enrgistré.';
           echo "<div'> ".$message.' </p>';
       } ?>

    <div class="edit-page">
        <div class="edit-info">

            <div class="item">
                <a href="create_card.php" class="btn ">Ajouter une bière</a>
            </div>

            <div class="item">
                <a href="my_beers.php" class="btn ">Voir mes bières <span class="badge badge-primary badge-pill"></span>
                </a>
            </div>

            <div class="item">
                <?php
                    if (isset($_SESSION['email']) && '1' == $_SESSION['rank']) {
                        ?>
                <a href='my_users.php' class='btn'>Voir membres</a>
                <?php
                    } ?>
            </div>
        </div>

        <div class="edit-box">
            <form class="edit-form" action="edit_user.php" method="POST">
                <?php
            if (isset($_SESSION['email']) && '1' == $_SESSION['rank']) {
                ?>
                <h2 class="section-title">Compte Admin</h2>

                <?php
            } else {
                ?>
                <h2 class="section-title">Mon compte</h2>
                <?php
            } ?>
                <div class="textbox">
                    <i class="fas fa-envelope"></i>
                    <input type="text" name="user_email_edit"
                        value="<?php echo $data['email']; ?>">
                </div>

                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_firstname_edit"
                        value="<?php echo $data['firstname']; ?>">
                </div>

                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" name="user_lastname_edit"
                        value="<?php echo $data['lastname']; ?>">
                </div>

                <div class="textbox">
                    <i class="icon fas fa-home"></i>
                    <input type="text" name="user_address_edit"
                        value="<?php echo $data['user_address']; ?>">
                </div>

                <div class="submitbox">
                    <input type="hidden" name="id"
                        value="<?php echo $data['id']; ?>"
                        ?>
                    <input type="submit" name="submit_update" class="btn" value="Mettre à jour">
                </div>

            </form>
            <?php
}  ?>
            <br>
            <div class="back">
                <a class="btn-back" href="index.php">Retour</a>
            </div>

</section>

<?php include 'assets/footer.php';
