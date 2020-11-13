<!-- Navbar -->
<nav class="navbar">
  <div class="content">
    <a href="index.php#home"><img src="assets/img/BBWLogo.png" alt="logo" class="logo"></a>

    <button class="menu-toggler">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="navbar-menu">
      <a href="index.php#home">Accueil</a>
      <a href="index.php#about">Beerbox?</a>
      <a href="beer_list.php">Liste des bieres</a>
      <?php
                if (empty($_SESSION)) {
                    ?>
      <a class="nav-link" href="login.php">Login</a>

      <a class="nav-link" href="signup.php">Sign Up</a>
      <?php
                }
                    ?>

      <?php
                if (isset($_SESSION['email']) && '1' == $_SESSION['rank']) {
                    ?>
      <a>Admin</a>
      <?php
                }
                ?>

      <?php
                if (isset($_SESSION['email'])) {
                    ?>
      <a href="profile.php" class="nav-link">Mon compte</a>

      <a href="?logout" class="nav-link">Se déconnecter</a>
      <?php
                }
                ?>


    </div>
  </div>
</nav>