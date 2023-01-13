<?php
// PERMET DE DONNER LE NOM DE LA CONSTANTE  et la valeur de constante define nous permettre de se connceter avec phpmyadmin 
// C'est la convention pourquoi il faut crée les nom de constante en majuscule 

define("DB_NAME", "colyseums");

define("DB_USER", "root");

define("DB_PASSWORD", "");

define("DB_HOST", "localhost");
//Connexion a la base de données grace à PDO
$pdo = new PDO("mysql:dbname=" . DB_NAME . ";host=" . DB_HOST, DB_USER, DB_PASSWORD);

?>