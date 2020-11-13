<?php
$page = 'login';
require 'inc/connect.php';
require 'assets/head.php';
include 'assets/nav.php';

if (isset($_POST['submit-login'])) {
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_pass = htmlspecialchars($_POST['user_password']);
    $sql = $db->query("SELECT * FROM users WHERE email = '{$user_email}'");
    if ($row = $sql->fetch()) {
        $db_id = $row['id'];
        $db_email = $row['email'];
        $db_pass = $row['password'];
        $db_rank = $row['rank'];

        if (password_verify($user_pass, $db_pass)) {
            $_SESSION['id'] = $db_id;
            $_SESSION['email'] = $db_email;
            $_SESSION['rank'] = $db_rank;

            header('Location: profile.php');

            $message = "<br><div class ='alert alert-success'><p> Vous êtes bien connectés!</p> <br> - <a href='profile.php?id=<?= {$user_id} ?>'>Mon compte</a> - </div>";
        } else {
            $message = "<div class ='alert alert-danger'> Mot de passe incorrect.</div>";
        }
    } else {
        $message = "<div class ='alert alert-danger'> Identifiant inconnu.</div>";
    }
}

?>
<section id="login">
    <div class="login-box">
        <form class="login-form"
            action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
            method="POST">
            <h2>Login</h2>
            <div class="textbox">
                <i class="fas fa-envelope"></i>
                <input type="text" name="user_email" placeholder="Email">
            </div>

            <div class="textbox">
                <i class="fas fa-lock"></i>
                <input type="password" name="user_password" placeholder="Password">
            </div>

            <input type="submit" class="btn" name="submit-login" value="Sign in">
        </form>


        <?php if (isset($message)) {
    echo "<div'> ".$message.' </p>';
} ?>

    </div>
</section>

<?php
include 'assets/footer.php';
