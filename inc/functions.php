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
    <br>

    <a class="btn-link"
        href="card.php?id=<?php echo $row['id']; ?>"
        class="card-link">Voir</a>
</div>
</div>



<?php
    }
}
function displayBeer($id)
{
    global $db;
    $sql = $db->query("SELECT * FROM beers AS b LEFT JOIN color AS c ON c.id_beer=b.id 
   WHERE b.id = {$id}");
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
        <h2>Type: <?php echo $row['type']; ?>
        </h2>
        <br>
        <h2>Taux d'alchool : <?php echo $row['alchoolpercent']; ?>
        </h2>
        <br>
        <h2>Origine : <?php echo $row['country']; ?>
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
    $sql = $db->query("SELECT * FROM beers AS b LEFT JOIN rating AS r ON r.id_beer=b.id  WHERE b.id = {$id}");
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
    $sql = $db->query("SELECT * FROM beers AS b LEFT JOIN color AS c ON c.id_beer=b.id WHERE b.author_article = {$user_id}");
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
        <td><?php echo $row['type']; ?>
        </td>
        <td><?php echo $row['alchoolpercent']; ?>
        </td>
        <td><?php echo $row['country']; ?>
        </td>
        <td><?php echo $row['description']; ?>
        </td>
        <td><a
                href="edit_card.php?id=<?php echo $row['id']; ?>">Modifier</a>
        </td>
        <td><a
                href="delete_article.php?id=<?php echo $row['id']; ?>">Supprimer</a>
        </td>

        <?php
            } ?>
    </tbody>
</table>
<?php
}
