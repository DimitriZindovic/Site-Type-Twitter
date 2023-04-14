<?php
require_once "connexion.php";

if ($_POST['pseudo'] != " " && $_POST['password'] != " ") {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'pseudo' => $_POST['pseudo'],
        'image_profil' => $_POST['image_profil'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ];

    $requete = $database->prepare('INSERT INTO users(nom, prenom, pseudo, image_profil, email, password) VALUES (:nom, :prenom, :pseudo, :image_profil, :email, :password)');
    $requete->execute($data);

    if ($requete) {
        header('Location: index.php');
    } else {
        echo 'Une erreur est survenue';
    }

} else {
    echo 'Veuillez remplir tous les champs';
}
?>