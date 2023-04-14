<?php
session_start();

require_once "connexion.php";

$email = $_POST['email'];
$password = $_POST['password'];

$requete = $database->prepare('SELECT * FROM users WHERE email = :email');
$requete->execute(['email' => $email]);
$user = $requete->fetch();

if (!$user) {
    echo "Nom d'utilisateur incorrect";
} else {
    if (password_verify($password, $user['password'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header('Location: index.php');
    } else {
        echo "Mot de passe incorrect";
    }
}
?>