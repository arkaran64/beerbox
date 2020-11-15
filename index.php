<?php
require 'inc/connect.php';
require 'inc/functions.php';
include 'assets/head.php';
include 'assets/nav.php';
?>

<body>
    <!-- Accueil/titre -->
    <section id="home">
        <div class="content">
            <div class="mainTitle">
                <h1><span>BeerBox</span></h1>
                <?php echo empty($_SESSION['id']) ? '<div class="button">
                    <a href="login.php">Login</a>
                </div>' : ''; ?>
                <!-- <div class="button">
                    <a href="login.php">Login</a>
                </div> -->
            </div>
        </div>
    </section>

    <!-- BeerBox? -->
    <section id="about">
        <div class="about-section">
            <div class="inner-container">
                <h2> Bienvenue sur BeerBox!</h2>
                <p class="text">
                    Vous en avez assez d'oublier le nom d'une bière que vous avez dégusté dans un bar, ou lors d'un
                    soirée chez des amis? Impossible de vous souvenir du nom des bieres artisanales que vous
                    préferez?<br>
                    Voici <span>BeerBox</span>, votre cave a biere online! Désormais vous pourrez
                    répertorier vos bières préférées sur votre smartphone grace à <span>BeerBox</span>.
                    N'attendez plus un seconde, et rejoignez la communauté <span>BeerBox</span> depuis votre téléphone
                    en vous inscrivant <a href="signup.php"> ici</a> !
                </p>
            </div>
        </div>
    </section>

    <!-- slider -->

    <section id="slider">
        <div class="wrapper">
            <h2>Decouvrez certaines de nos bieres</h2>
            <div class="slick">
                <?php
        displayRandomPics();
        ?>
            </div>

        </div>
    </section>

    <!-- Footer -->

    <?php
    include 'assets/footer.php';
?>

</body>

</html>