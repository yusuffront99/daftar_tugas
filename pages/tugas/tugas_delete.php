<?php 
    include_once("../database/database.php");
    $database = new Database;
    $connection = $database->getConnection();

    $id = $_GET['id'];
    $deleteSQL = "DELETE FROM tugas WHERE `tugas`.`id` = ?";
    $statement = $connection->prepare($deleteSQL);
    $statement->bindParam(1, $id);
    $statement->execute();
    header('Location: main.php?page=tugas');

?>
