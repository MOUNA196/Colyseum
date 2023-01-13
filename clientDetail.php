<?php

require_once("models\Client.php");
//Récupération du paramétre _GET
$id = $_GET["id"];
$client = Client::readOne($id);
var_dump($client->tickets);


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
    <h1>Information du client </h1>
<table class="table table-hover table st">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>date de naissance </th>
                <th>numero de carte</th>
                <th>type de carte</th>
                <th>Promotion</th>
            </tr>
        </thead>
        <tbody>
        
                <tr>
                    <td><?= $client->lastName ?></td>
                    <td><?= $client->firstName ?></td>
                    <td><?= $client-> displayBirthDate() ?></td>
                    <td><?= $client->cardNumber ?></td>
                    <td><?= $client->cardType ?></td>
                    <td><?= $client->cardDiscount ?></td>
            </tr>
           
        </tbody>
    </table>
    <h1>Liste des tickets </h1>
<table class="table table-hover table st">
        <thead>
            <tr>
                <th>Prix</th>
               
            </tr>
        </thead>
        <tbody>
            <?php $totalPrice=0;
        foreach($client->tickets as $ticket) {
                $totalPrice += $ticket->price; ?>
                <tr>
                    <td><?=$ticket->price?></td>
                </tr>
                <?php } ?>
        </tbody>
        <tfoot>
            <td>
                Prix total: <?= $totalPrice ?>
            </td>
            <tfoot>
    </table>
    <?=$totalPrice ?>