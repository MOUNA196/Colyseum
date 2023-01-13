<?php
require_once("conf.php");
require_once("models/Ticket.php");
class Client{
    public int $id;
    public string $lastName;
    public string $firstName;
    public string $birthDate;
    public bool $card;
    // On ajoute le "?" avant "int" pour dire qu'il est nullable : il peut recevoir la valeur NULL
    public ?int $cardNumber;
    // Exercice6
    public ?string $cardType;
    public ?int $cardDiscount;





 public static function readAll(int $limite):array{
// Permet d'aller chercher la variable $pdo à l'exterieur de la fonction (portée globale)
global $pdo;
//requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres avec un paramétre nommé :limite
 $sql = "SELECT*FROM clients LIMIT :limite";
//on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
$statement = $pdo->prepare($sql);
// Jonction entre le paramétre nommé: limite et la variable PHP $limite (de type INT)
$statement->bindParam(":limite", $limite, PDO::PARAM_INT);
// on demande au pdo d'executer la requete :: Execution de la requete
$statement->execute();
//recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
$clients = $statement->fetchAll(PDO::FETCH_CLASS, "Client");
return $clients;
}


public static function readOne(int $id):Client{
    global $pdo;
//requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres avec un paramétre nommé :limite
 $sql = "SELECT clients.id,
 clients.lastName,
 clients.firstName,
 clients.birthDate,
 clients.cardNumber,
 cardtypes.type AS cardType,
  cardTypes.discount AS cardDiscount 
  FROM clients 
  LEFT JOIN cards ON clients.cardNumber = cards.cardNumber
  LEFT JOIN cardtypes ON cards.cardTypesId=cardTypes.id
  WHERE clients.id=:id";
//on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
$statement = $pdo->prepare($sql);
// Jonction entre le paramétre nommé: limite et la variable PHP $limite (de type INT)
$statement->bindParam(":id",$id,PDO::PARAM_INT);
// on demande au pdo d'executer la requete :: Execution de la requete
$statement->execute();
//recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
// Récupération d'un objet de class client grace a fetch()
$statement->setFetchMode(PDO::FETCH_CLASS, "Client");
$client = $statement->fetch();
        $client->tickets = Ticket::readAllFromClient($id);

        return $client;
}





public static function readAllWithCard(){
global $pdo;
//requet SQL qui va nous permet d'afficher la liste des élèves ecriture de la requete SQL dans une chaine de caracteres avec un paramétre nommé :limite
 $sql = "SELECT*FROM clients WHERE cardNumber IS NOT NULL";
//on demande au pdo de preparer la requéte (statement un nom commun) // Préparation de la requete SQL
$statement = $pdo->prepare($sql);


// on demande au pdo d'executer la requete :: Execution de la requete
$statement->execute();
//recupération des données dans une variable $eleves  // et demande de les renvoyée sous forme d'un tableau associatif (PDO::FETCH_ASSOC)
$clients = $statement->fetchAll(PDO::FETCH_CLASS, "Client");
return $clients;
}






public function displayBirthDate(): string {
        //"1992-12-02";
       // "02/12/1992";
        $date = new DateTime($this -> birthDate);
        $dateOutput = $date->format("d / m / Y");
        return $dateOutput;
}

}
?>