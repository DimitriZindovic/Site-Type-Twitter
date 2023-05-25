<?php
require_once "connexion.php";

if ($_POST['pseudo'] != " " && $_POST['password'] != " ") {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'pseudo' => $_POST['pseudo'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
    ];

    $image = $_FILES['image_profil'];
    $max_size = 2 * 1024 * 1024;

    if (!empty($image['tmp_name'])) {
        $image_extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($image_extension, $allowed_extensions)) {
            if ($image['size'] <= $max_size) {
                $image_dest = 'images/' . uniqid('img_') . '.' . $image_extension;
                move_uploaded_file($image['tmp_name'], $image_dest);
                $data['image_profil'] = $image_dest;
            } else {
                echo 'Le poids de l\'image est trop important. Veuillez choisir une image dont la taille est inférieure à 2MO.';
                exit;
            }
        } else {
            echo 'Le format de l\'image est incorrect. Veuillez choisir une image au format JPG, PNG ou GIF.';
            exit;
        }
    }

    $requete = $database->prepare('INSERT INTO users(nom, prenom, pseudo, image_profil, email, password) VALUES (:nom, :prenom, :pseudo, :image_profil, :email, :password)');
    $requete->execute($data);

    if ($requete) {
        header('Location: login.php');
    } else {
        echo 'Une erreur est survenue';
    }

} else {
    echo 'Veuillez remplir tous les champs';
}
?>