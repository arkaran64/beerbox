<?php

    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $user_id = $_SESSION['id'];

    if (isset($_POST['submit_update'])) {
        $update_email = ($_POST['user_email_edit']);
        $update_firstname = ($_POST['user_firstname_edit']);
        $update_lastname = ($_POST['user_lastname_edit']);
        $update_address = ($_POST['user_address_edit']);

        $sth = $db->prepare("UPDATE users SET email = :email, firstname = :firstname, lastname = :lastname, user_address = :user_address  WHERE id = {$user_id}");
        $sth->bindValue(':email', $update_email);
        $sth->bindValue(':firstname', $update_firstname);
        $sth->bindValue(':lastname', $update_lastname);
        $sth->bindValue(':user_address', $update_address);

        $sth->execute();

        echo '<div class="alert">Votre compte a bien été mis à jour!</div>';
    } else {
        echo '<div class="alert">Erreur de mise à jour!</div>';
    }
