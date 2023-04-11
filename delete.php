<?php
require_once 'connexion.php';

$data = [
    'id' => $_GET['id']
];

$requete = $database->prepare('DELETE FROM post WHERE id = :id');
$requete->execute($data);

header('Location: index.php');
?>