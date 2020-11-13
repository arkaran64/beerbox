<?php

    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';

    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $color = htmlspecialchars($_POST['color']);
        $type = htmlspecialchars($_POST['type']);
        $country = htmlspecialchars($_POST['country']);
        $description = htmlspecialchars($_POST['description']);
        $rate = htmlspecialchars($_POST['rate']);
        $file = $_FILES['img_url'];
        $user_id = $_SESSION['id'];

        if ($file['size'] <= 1000000) {
            $valid_ext = ['jpg', 'jpeg', 'png', 'gif'];
            $check_ext = strtolower(substr(strrchr($file['name'], '.'), 1));

            if (in_array($check_ext, $valid_ext)) {
                $img_name = uniqid().'_'.$file['name'];
                $upload_dir = './assets/uploads/';
                $upload_name = $upload_dir.$img_name;
                $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

                if ($move_result) {
                    $sth = $db->prepare(' INSERT INTO bieres (name, type, country, description, author_article, img) 
                    VALUES (:name, :type, :country, :description, :author_article, :img)');

                    $sth->bindValue(':name', $name);
                    $sth->bindValue(':type', $type);
                    $sth->bindValue(':country', $country);
                    $sth->bindValue(':description', $description);
                    $sth->bindValue(':author_article', $user_id);
                    $sth->bindValue(':img', $img_name);

                    $sth->execute();

                    $lastId = $db->lastInsertId();

                    $sth2 = $db->prepare('INSERT INTO couleur (id_beer, couleur) VALUES (:id_beer, :couleur), INSERT INTO note (id_user, id_beer, note) VALUES (:id_user, :id_beer, :note)');

                    $sth2->bindValue(':id_beer', $lastId);
                    $sth2->bindValue(':couleur', $color);
                    $sth2->bindValue(':note', $rate);

                    $sth->execute();

                    echo "<div class ='col-12 alert alert-success text-center'> Bière enregistrée :)</div><br>";
                }
            }
        }
    } else {
        echo "<div class ='col-10 alert alert-alert text-center'> une erreur s'est produite, veuillez recommencer la saisie.  </div>";
    }
