<?php
require_once("conf.php");
class Ticket
{
    public int $id;
    public int $price;
    public static function readAllFromClient(int $clientId): array
    {
        global $pdo;
        $sql = "SELECT id, price 
        FROM tickets 
        WHERE clientsId = :clientId";

        $statement = $pdo->prepare($sql);
        $statement->bindParam(":clientId", $clientId, PDO::PARAM_INT);
        $statement->execute();
        $liste = $statement->fetchAll(PDO::FETCH_CLASS, "Ticket");
        return $liste;
    }
}
?>