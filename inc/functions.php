<?php

function shorten_text($text, $max = 120, $append = '&hellip;')
{
    if (strlen($text) <= $max) {
        return $text;
    }
    $return = substr($text, 0, $max);
    if (false === strpos($text, ' ')) {
        return $return.$append;
    }

    return $return.$append;

    return preg_replace('\w+$/', ' ', $return).$append;
}

function displayAllUsers()
{
    global $db;
    $sql = $db->query('SELECT * FROM users WHERE NOT rank = 1');
    $sql->setFetchMode(PDO::FETCH_ASSOC); ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">N°ID</th>
            <th scope="col">Email</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($row = $sql->fetch()) {
                ?>
        <tr id="row-<?php echo $row['id']; ?>">
        </tr>
        <td scope="row"><?php echo $row['id']; ?>
        </td>
        <td><?php echo $row['email']; ?>
        </td>
        <td><?php echo $row['firstname']; ?>
        </td>
        <td><?php echo $row['lastname']; ?>
        </td>
        <td><?php echo $row['user_address']; ?>
        </td>
        <td><a
                href="delete_users.php?id=<?php echo $row['id']; ?>">Supprimer</a>
        </td>
        </tr>
        <?php
            } ?>
    </tbody>
</table>
<?php
}

function displayAllBeers()
{
    global $db;
    $sql = $db->query('SELECT * FROM beers');
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
        ?>
<div class="product-card">
    <div class="product-image">
        <img class="card-img-top"
            src="assets/uploads/<?php echo $row['img']; ?>"
            alt="Card image">
    </div>
    <div class="product-info">
        <h5 class="card-title"><?php echo $row['name']; ?>
        </h5>
        <h6><?php echo $row['country']; ?>
        </h6>
    </div>
    <div class="card-body">
        <button class="btn-link"
            href="card.php?id=<?php echo $row['id']; ?>"
            class="card-link">Voir</button>
    </div>
</div>




<?php
    }
}

function displayBeer($id)
{
    global $db;
    $sql = $db->query("SELECT b.*,t.type,r.rate FROM beers AS b INNER JOIN type AS t ON t.id_beer=b.id 
  INNER JOIN rating AS r ON r.id_beer = b.id WHERE b.id = {$id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
        ?>
<header id="header">
    <h2 class="title"><?php echo $row['name']; ?>">:</h2>
</header>
<hr>
<section class="bar">
    <div class="bar-frame">
        <ul class="breadcrumbs">
            <li><a href="index.php">Home</a></li>
            <li><a href="beer_list.php">Liste des bières</a></li>
            <li><a
                    href="card.php?id=<?php echo $row['name']; ?>"></a>
            </li>
        </ul>
    </div>
</section>
<section id="main">
    <div class="details-info">
        <div class="image">
            <img src="assets/uploads/<?php echo $row['img']; ?>"
                alt="Card image">
        </div>
        <div class="description">
            <div class="head">
                <h1 class="itle"><?php echo $row['name']; ?>
                </h1>
                <h2><?php echo $row['type']; ?>
                </h2>
            </div>
            <div class="section">
                <div class="row">
                    <h2><?php echo $row['type']; ?>,<?php echo $row['country']; ?>
                    </h2>
                </div>
                <div class="row">
                    <h3><?php echo $row['alchoolpercent']; ?>
                    </h3>
                </div>
            </div>
            <div class="entry">
                <p><?php echo $row['description']; ?>
                </p>
            </div>
            <div class="testimonials">
                <h4><?php echo $row['rate']; ?>
                </h4>
                <p><?php echo $row['comment']; ?>
                </p>
                <p><span><?php echo $row['author-article']; ?></span>
                </p>
            </div>
        </div>
    </div>
</section>
<a class="btn" href="index.php#beer_list" class="card-link">Retour</a>
</div><?php
    }
}

function displayAllBeersByUser($user_id)
{
    global $db;
    $sql = $db->query("SELECT b.*,t.type,r.rating FROM beers AS b INNER JOIN type AS t ON c.id_beer=b.id INNER JOIN rating AS r ON r.id_beer = b.id WHERE b.author_article = {$user_id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC); ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Name</th>
            <th scope="col">Color</th>
            <th scope="col">Type</th>
            <th scope="col">Alcohol %</th>
            <th scope="col">Region</th>
            <th scope="col">Description</th>
            <th scope="col">Rate</th>
            <th scope="col">Comment</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($row = $sql->fetch()) {
                ?>
        <tr id="row-<?php echo $row['id']; ?>">
        </tr>
        <td scope="row"><?php echo $row['id']; ?>
        </td>
        <td><?php echo $row['name']; ?>
        </td>
        <td><?php echo $row['year']; ?>
        </td>
        <td><?php echo $row['grapes']; ?>
        </td>
        <td><?php echo $row['country']; ?>
        </td>
        <td><?php echo $row['region']; ?>
        </td>
        <td><?php echo $row['description']; ?>
        </td>
        <td><a
                href="edit_card.php?id=<?php echo $row['id']; ?>">Modifier</a>
        </td>
        <td><a
                href="delete_article.php?id=<?php echo $row['id']; ?>">Supprimer</a>
        </td>
        </tr>
        <?php
            } ?>
    </tbody>
</table>
<?php
}

function randomPics()
{
}
