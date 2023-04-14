<?php
require_once 'connexion.php';

$data = [
    'id' => $_GET['id']
];

$requete = $database->prepare('DELETE FROM post WHERE id_post = :id');
$requete->execute($data);

header("Location: profil.php");
?>