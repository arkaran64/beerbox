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
        <td>
            <form action="delete_users.php" method="post">
                <input type="hidden" name="id"
                    value="<?php echo $row['id']; ?>">
                <button type="submit" name="sub_delete">Supprimer</button>
            </form>
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
    </div>
    <br>

    <a class="btn-link"
        href="card.php?id=<?php echo $row['id']; ?>"
        class="card-link">Voir</a>
</div>

<?php
    }
}
function displayBeer($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM beers INNER JOIN color ON beers.id_color = color.color_id INNER JOIN country ON beers.id_country = country.country_id  WHERE beers.id = {$id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
        ?>

<div class="left-column">
    <img class="card-img-top"
        src="assets/uploads/<?php echo $row['img']; ?>"
        alt="Card image">
</div>
<div class="right-column">
    <div class="product-name">
        <h2 class="card-title"><?php echo $row['name']; ?>
        </h2>
    </div>
    <br>
    <div class="infos">
        <h2>Type: <?php echo $row['color_name']; ?>
        </h2>
        <br>
        <h2>Taux d'alchool : <?php echo $row['alchoolpercent']; ?>
        </h2>
        <br>
        <h2>Origine : <?php echo $row['country_name']; ?>
        </h2>
        <br>
        <h4>Description: </h4>
        <p><?php echo $row['description']; ?>
        </p>
    </div>

</div>


<?php
    }
}
function displayRate($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM beers LEFT JOIN rating  ON beers.id = rating.id_beer WHERE beers.id = {$id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
        ?>

<div class="testimonials">
    <h4><?php echo $row['rate']; ?>
    </h4>
    <p><?php echo $row['comment']; ?>
    </p>
</div>


<a class="btn" href="index.php#beer_list" class="card-link">Retour</a>
</div><?php
    }
}

function displayAllBeersByUser($user_id)
{
    global $db;
    $sql = $db->query("SELECT * FROM beers LEFT JOIN color ON beers.id_color = color.color_id LEFT JOIN country ON beers.id_country = country.country_id  WHERE beers.author_article = {$user_id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC); ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">N°</th>
            <th scope="col">Name</th>
            <th scope="col">type</th>
            <th scope="col">Alcohol%</th>
            <th scope="col">Pays</th>
            <th scope="col">Description</th>
            <th scope="col"></th>
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
        <td><?php echo $row['name']; ?>
        </td>
        <td><?php echo $row['color_name']; ?>
        </td>
        <td><?php echo $row['alchoolpercent']; ?>
        </td>
        <td><?php echo $row['country_name']; ?>
        </td>
        <td><?php echo $row['description']; ?>
        </td>
        <td><a
                href="edit_card.php?id=<?php echo $row['id']; ?>">Modifier</a>
        </td>
        <td><a
                href="delete_card.php?id=<?php echo $row['id']; ?>">Supprimer</a>
        </td>

        <?php
            } ?>
    </tbody>
</table>
<?php
}
function displayAllRatingsByUser($user_id)
{
    global $db;
    $sql = $db->query("SELECT * FROM rating LEFT JOIN beers ON beers.id = rating.id_beer WHERE rating.id_users = {$user_id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC); ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Note</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Bière</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
            while ($row = $sql->fetch()) {
                ?>
        <tr id="row-<?php echo $row['id']; ?>">
        </tr>
        <td scope="row"><?php echo $row['rating_id']; ?>
        </td>
        <td><?php echo $row['rate']; ?>
        </td>
        <td><?php echo $row['comment']; ?>
        </td>
        <td><a
                href="card.php?id=<?php echo $row['id_beer']; ?>"><?php echo $row['name']; ?></a>
        </td>
        <td><a
                href="delete_rate.php?id=<?php echo $row['rating_id']; ?>">Supprimer</a>
        </td>

        <?php
            } ?>
    </tbody>
</table>
<?php
}

function displayRandomPics()
{
    global $db;
    $sql = $db->query('SELECT * FROM beers ORDER BY RAND() LIMIT 3');
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $sql->fetch()) {
        ?>
<div class="card">
    <img class="slide-img"
        src="assets/uploads/<?php echo $row['img']; ?>"
        height=400px width=auto>
    <h3 class="dark-text"><?php echo $row['name']; ?>
    </h3>
</div>

<?php
    }
}

function displayRating($id)
{
    global $db;
    $sql = $db->query("SELECT r.*,b.id,u.firstname,u.lastname FROM rating AS r LEFT JOIN beers AS b ON r.id_beer = b.id LEFT JOIN users AS u ON r.id_users = u.id WHERE b.id = {$id}");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

    $rating = $sql->fetchAll();

    foreach ($rating as $rate) {?>
<div class="rating">
    <h4><?php echo $rate['rate']; ?>
    </h4>
    <p><?php echo $rate['comment']; ?>
    </p>
    <small><?php echo $rate['lastname']; ?>
        <?php echo $rate['firstname']; ?></small>
</div>
<?php
}
}
