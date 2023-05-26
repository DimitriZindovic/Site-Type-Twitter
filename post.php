<?php
require_once 'connexion.php';

$tag = $_POST['tag'];
$user = $_POST['user'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$image = $_FILES['image'];

$max_size = 2 * 1024 * 1024;

if (!empty($image['tmp_name'])) {
    if ($image['size'] <= $max_size) {
        $image_dest = 'images/' . uniqid('img_');
        move_uploaded_file($image['tmp_name'], $image_dest);

        $data = [
            'tag' => $tag,
            'content' => $content,
            'image' => $image_dest,
            'date' => $date,
            'user' => $user
        ];

        $requete = $database->prepare("INSERT INTO post(tag, content, image, date, user_id) VALUES (:tag, :content, :image, :date, :user)");
        $requete->execute($data);

        if ($requete) {
            header('Location: index.php');
        } else {
            echo 'Une erreur est survenue';
        }
    } else {
        echo 'Le poids de l\'image est trop important. Veuillez choisir une image dont la taille est inférieure à 2MO.';
    }
} else {
    $data = [
        'tag' => $tag,
        'content' => $content,
        'date' => $date,
        'user' => $user
    ];

    $requete = $database->prepare("INSERT INTO post(tag, content, date, user_id) VALUES (:tag, :content, :date, :user)");
    $requete->execute($data);

    if ($requete) {
        header('Location: index.php');
    } else {
        echo 'Une erreur est survenue';
    }
}
?>