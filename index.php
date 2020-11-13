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
                <div class="button">
                    <a href="login.php">Login</a>
                </div>
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

    <!-- CONTACT -->
    <section id="contact" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
	-->
                <div class="wow fadeInUp col-md-6 col-sm-12" data-wow-delay="0.4s">
                    <div id="google-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11316.446089029834!2d-0.5920038!3d44.83966215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe6b26bb3783851a9!2sTalis%20Business%20School!5e0!3m2!1sfr!2sfr!4v1603975097592!5m2!1sfr!2sfr"
                            allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">

                    <div class="col-md-12 col-sm-12">
                        <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>Contact Us</h2>
                        </div>
                    </div>

                    <!-- CONTACT FORM -->
                    <form action="#" method="post" class="wow fadeInUp" id="contact-form" role="form"
                        data-wow-delay="0.8s">

                        <!-- IF MAIL SENT SUCCESSFUL  // connect this with custom JS -->
                        <h6 class="text-success">Your message has been sent successfully.</h6>

                        <!-- IF MAIL NOT SENT -->
                        <h6 class="text-danger">E-mail must be valid and message must be longer than 1 character.</h6>

                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" id="cf-name" name="name" placeholder="Full name">
                        </div>

                        <div class="col-md-6 col-sm-6">
                            <input type="email" class="form-control" id="cf-email" name="email"
                                placeholder="Email address">
                        </div>

                        <div class="col-md-12 col-sm-12">
                            <input type="text" class="form-control" id="cf-subject" name="subject"
                                placeholder="Subject">

                            <textarea class="form-control" rows="6" id="cf-message" name="message"
                                placeholder="You're message..."></textarea>

                            <button type="submit" class="form-control" id="cf-submit" name="submit">Send
                                Message</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->

    <?php
    include 'assets/footer.php';
?>

</body>

</html>