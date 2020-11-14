<?php

    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';

    if (isset($_POST['submit'])) {
        $name = htmlspecialchars($_POST['name']);
        $color = htmlspecialchars($_POST['color']);
        $country = htmlspecialchars($_POST['country']);
        $alchool = htmlspecialchars($_POST['alchool']);
        $description = htmlspecialchars($_POST['description']);
        $rate = htmlspecialchars($_POST['rate']);
        $comment = htmlspecialchars($_POST['comment']);
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
                    $sth = $db->prepare(' INSERT INTO beers (name, alchoolpercent, description, author_article, img) 
                    VALUES (:name, :alchoolpercent, :description, :author_article, :img),
                    INSERT INTO color (type) VALUES (:type), 
                    INSERT INTO country (country) VALUES (:country),');

                    $sth->bindValue(':name', $name);
                    $sth->bindValue(':color', $color);
                    $sth->bindValue(':country', $country);
                    $sth->bindValue(':alchoolpercent', $alchool);
                    $sth->bindValue(':description', $description);
                    $sth->bindValue(':author_article', $user_id);
                    $sth->bindValue(':img', $img_name);

                    $sth->execute();

                    $lastId = $db->lastInsertId();

                    $sth2 = $db->prepare('INSERT INTO rating (id_user, id_beer, rate, comment) VALUES (:id_user, :id_beer, :rate, :comment) ');

                    $sth2->bindValue(':id_beer', $lastId);
                    $sth2->bindValue(':rate', $rate);
                    $sth2->bindValue(':comment', $comment);

                    $sth->execute();

                    echo "<div class ='alert-success'> Bière enregistrée :)</div><br>";
                }
            }
        }
    } else {
        echo "<div class ='alert-alert'> une erreur s'est produite, veuillez recommencer la saisie.  </div>";
    }
