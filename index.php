<?php
    require_once("models/Client.php");
    require_once("models/Show.php");

    $clients = Client::readAll(20);
    $clients = Client::readAllWithCard();
$shows = show::readAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <title>Colyseum</title>
</head>

<body>
  
    <table class="table table-hover table st">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>date de naissance </th>
                <th>numero de carte</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($clients as $client) { ?>
                <tr>
                    <td><?= $client->lastName ?></td>
                    <td><?= $client->firstName ?></td>
                    <td><?= $client-> displayBirthDate() ?></td>
                    <td><?= $client->cardNumber ?></td>
                    <td>
                        <a href="clientDetail.php?id=<?=
                        $client->id ?>">
                        <button class="btn btn-success">Afficher</button>
                    </td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <h1>client avec carte</h1>
    <table class="table table-hover table st">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>date de naissance </th>
                <th>numero de carte</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($clientsWithCard as $client) { ?>
                <tr>
                    <td><?= $client->lastName ?></td>
                    <td><?= $client->firstName ?></td>
                    <td><?= $client-> displayBirthDate() ?></td>
                    <td><?= $client->cardNumber ?></td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>
    <h1>Show</h1>
    </table>
    <table class="table table-hover table st">
        <thead>
            <tr>
                <th>Titres</th>
                <th>Artiste</th>
                <th>date</th>
                <th>Type de show</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($shows as $show) { ?>
                <tr>
                    <td><?= $show->title ?></td>
                    <td><?= $show->performer ?></td>
                    <td><?= $show-> displayBirthDate()?></td>
                    <td><?= $show->showType ?></td>
            </tr>
            <?php }
            ?>
        </tbody>
    </table>    
</body>

</html>