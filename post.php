<?php
require_once 'connexion.php';

if ($_POST['content'] != " ") {
    $data = [
        'tag' => $_POST['tag'],
        'content' => $_POST['content'],
        'image' => $_POST['image'],
        'date' => date('Y-m-d H:i:s')
    ];

    $requete_image = $database->prepare("INSERT INTO post(tag, content, image, date) VALUES (:tag, :content, :image, :date)");
    $requete_image->execute($data);

    $requete = $database->prepare("INSERT INTO post(tag, content, image, date) VALUES (:tag, :content, :image, :date)");
    $requete->execute($data);

    if 

    if ($requete) {
        header('Location: index.php');
    } else {
        echo 'Une erreur est survenue';
    }
    ;
} else {
    echo 'Veuillez rentrez tous les champs';
}
?>