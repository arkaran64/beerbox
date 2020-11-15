<?php

    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $beer_id = $_POST['beer_id'];
    $user_id = $_SESSION['id'];

    if (isset($_POST['submit_mod'])) {
        $name = htmlspecialchars($_POST['name']);
        $color = htmlspecialchars($_POST['type']);
        $country = htmlspecialchars($_POST['country']);
        $alchool = htmlspecialchars($_POST['alchool']);
        $description = htmlspecialchars($_POST['description']);
        $rate = htmlspecialchars($_POST['rate']);
        $comment = htmlspecialchars($_POST['comment']);
        $file = $_FILES['img_url'];

        if (empty($file['name'])) {
            echo 'file vide';
            $sth = $db->prepare(" UPDATE beers SET name=:name, alchoolpercent=:alchoolpercent, description=:description, author_article=:author_article,id_color=:id_color, id_country=:id_country WHERE id = {$beer_id}");
            echo 'requete ok';
            $sth->bindValue(':name', $name);
            $sth->bindValue(':id_color', $color);
            $sth->bindValue(':id_country', $country);
            $sth->bindValue(':alchoolpercent', $alchool);
            $sth->bindValue(':description', $description);
            $sth->bindValue(':author_article', $user_id);

            if ($sth->execute()) {
                echo 'execute ok !';
            }

            $sth2 = $db->prepare('INSERT INTO rating (id_user, id_beer, rate, comment) VALUES (:id_user, :id_beer, :rate, :comment) ');

            if (!empty($rate) || !empty($comment)) {
                $sth2->bindValue(':id_user', $user_id);
                $sth2->bindValue(':id_beer', $beer_id);
                $sth2->bindValue(':rate', $rate);
                $sth2->bindValue(':comment', $comment);

                $sth->execute();
            }
            header('Location:profile.php?edit');
        } else {
            if ($file['size'] <= 10000000) {
                $valid_ext = ['jpg', 'jpeg', 'png', 'gif'];
                $check_ext = strtolower(substr(strrchr($file['name'], '.'), 1));

                if (in_array($check_ext, $valid_ext)) {
                    $imgname = uniqid().'_'.$file['name'];
                    $upload_dir = './assets/uploads/';
                    $upload_name = $upload_dir.$imgname;
                    $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

                    if ($move_result) {
                        $sth = $db->prepare(" UPDATE beers SET name=:name, alchoolpercent=:alchoolpercent, description=:description, author_article=:author_article, img=:img,id_color=:id_color, id_country=:id_country WHERE id = {$beer_id}");

                        $sth->bindValue(':name', $name);
                        $sth->bindValue(':id_color', $color);
                        $sth->bindValue(':id_country', $country);
                        $sth->bindValue(':alchoolpercent', $alchool);
                        $sth->bindValue(':description', $description);
                        $sth->bindValue(':author_article', $user_id);
                        $sth->bindValue(':img', $imgname);

                        $sth->execute();

                        $sth2 = $db->prepare('INSERT INTO rating (id_user, id_beer, rate, comment) VALUES (:id_user, :id_beer, :rate, :comment) ');

                        if (!empty($rate) || !empty($comment)) {
                            $sth2->bindValue(':id_user', $user_id);
                            $sth2->bindValue(':id_beer', $beer_id);
                            $sth2->bindValue(':rate', $rate);
                            $sth2->bindValue(':comment', $comment);

                            $sth->execute();
                        }
                    }
                    header('Location: profile.php?edit');
                    echo "<div class ='alert'> Modification enregistrée :)  </div>";
                } else {
                    echo "<div  class='alert'> Un problème est survenu !</div>";
                }
            }
        }
    }
