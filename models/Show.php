<?php
require_once("conf.php");

class Show {
    public int $id;
    public string $title;
    public string $performer;
    public string $date;
    public string $showType;
    public static function readAll():array{
        // Permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
global $pdo;
//requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres avec un paramétre nommé :limite
 $sql = "SELECT shows.id,title, performer,`date`,`showtypes`.`type` AS `showType` FROM shows INNER JOIN showtypes ON shows.showtypesId=showtypes.id";
//on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
$statement = $pdo->prepare($sql);

// on demande au pdo d'executer la requete :: Execution de la requete
$statement->execute();
//recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
$liste = $statement->fetchAll(PDO::FETCH_CLASS, "Show");
return $liste;
    }

    public function displayBirthDate(): string {
        //"1992-12-02";
       // "02/12/1992";
        $date = new DateTime($this -> date);
        $dateOutput = $date->format("d / m / Y");
        return $dateOutput;
}

   
}










?>