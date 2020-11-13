<?php

    require 'inc/connect.php';
    require 'inc/functions.php';
    require 'assets/head.php';
    include 'assets/nav.php';
    $beer_id = $_POST['beer_id'];
    $user_id = $_SESSION['id'];

    if (isset($_POST['submit_mod'])) {
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
                $imgname = uniqid().'_'.$file['name'];
                $upload_dir = './assets/uploads/';
                $upload_name = $upload_dir.$imgname;
                $move_result = move_uploaded_file($file['tmp_name'], $upload_name);

                if ($move_result) {
                    $sth = $db->prepare(" UPDATE beers 
                   SET name = :name, type = :type, country = :country, description = :description, author_article = :author_article, picture = :picture
                   WHERE id = {$beer_id} ");

                    $sth->bindValue(':name', $name);
                    $sth->bindValue(':type', $type);
                    $sth->bindValue(':country', $country);
                    $sth->bindValue(':description', $description);
                    $sth->bindValue(':author_article', $user_id);
                    $sth->bindValue(':picture', $imgname);

                    $sth->execute();

                    $lastId = $db->lastInsertId();

                    $sth2 = $db->prepare("UPDATE color SET id_beer = :id_beer, color = :color WHERE id = {$lastId} ,
                           UPDATE rating SET id_user = :id_user , id_beer = :id_beer, rate = :note WHERE id = {$lastId}");

                    $sth2->bindValue(':id_beer', $lastId);
                    $sth2->bindValue(':couleur', $color);
                    $sth2->bindValue(':note', $rate);

                    $sth->execute();

                    echo "<div class ='alert'> Modification enregistrée :)  </div>";
                } else {
                    echo "<div  class='alert'> Un problème est survenu !</div>";
                }
            }
        }
    }
