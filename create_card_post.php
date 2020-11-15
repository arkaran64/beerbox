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
        var_dump($user_id);
        if ($file['size'] <= 10000000) {
            echo 'size is ok';
            $valid_ext = ['jpg', 'jpeg', 'png', 'gif'];
            $check_ext = strtolower(substr(strrchr($file['name'], '.'), 1));

            if (in_array($check_ext, $valid_ext)) {
                $img_name = uniqid().'_'.$file['name'];
                $upload_dir = './assets/uploads/';
                $upload_name = $upload_dir.$img_name;
                $move_result = move_uploaded_file($file['tmp_name'], $upload_name);
                var_dump($upload_dir, $move_result);
                if ($move_result) {
                    $sth = $db->prepare(' INSERT INTO beers (name, alchoolpercent, description, author_article, img,id_country,id_color) 
                    VALUES (:name, :alchoolpercent, :description, :author_article, :img,:id_country,:id_color)');

                    $sth->bindValue(':name', $name);
                    $sth->bindValue(':alchoolpercent', $alchool);
                    $sth->bindValue(':description', $description);
                    $sth->bindValue(':author_article', $user_id);
                    $sth->bindValue(':img', $img_name);
                    $sth->bindValue(':id_color', $color);
                    $sth->bindValue(':id_country', $country);
                    $sth->execute();

                    $lastId = $db->lastInsertId();
                    if (!empty($rate) || !empty($comment)) {
                        $sth2 = $db->prepare('INSERT INTO rating (id_users, id_beer, rate, comment) VALUES (:id_users, :id_beer, :rate, :comment) ');

                        $sth2->bindValue(':id_users', $user_id);
                        $sth2->bindValue(':id_beer', $lastId);
                        $sth2->bindValue(':rate', $rate);
                        $sth2->bindValue(':comment', $comment);

                        $sth2->execute();
                    }
                    header("Location:card.php?id={$lastId}&new");
                    echo "<div class ='alert alert-success'> Bière enregistrée :)</div><br>";
                }
            }
        }
    } else {
        echo "<div class ='alert-alert'> une erreur s'est produite, veuillez recommencer la saisie.  </div>";
    }
