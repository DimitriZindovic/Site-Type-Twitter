<?php
require_once "connexion.php";

$requete = $database->prepare("SELECT * FROM post ORDER BY id_post DESC LIMIT 1");
$requete->execute();

$users = $requete->fetch(PDO::FETCH_ASSOC);

echo json_encode($users);

?>