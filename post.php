<?php
require_once 'connexion.php';

$tag = $_POST['tag'];
$user = $_POST['user'];
$content = $_POST['content'];
$date = date('Y-m-d H:i:s');
$image = $_POST['image'];

$allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
$max_size = 2 * 1024 * 1024;

if (!empty($image)) {
    if (filter_var($image, FILTER_VALIDATE_URL)) {
        $image_info = getimagesize($image);
        $image_extension = image_type_to_extension($image_info[2], false);
        $image_size = $image_info[0] * $image_info[1];

        if (in_array($image_extension, $allowed_extensions)) {
            if ($image_size <= $max_size) {
                $image_content = file_get_contents($image);
                $image_name = uniqid('img_') . '.' . $image_extension;
                $image_dest = 'images/' . $image_name;
                file_put_contents($image_dest, $image_content);

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
                echo 'Le poids de l\'image est trop important';
            }
        } else {
            echo 'Le format de l\'image est incorrect';
        }
    } else {
        echo 'Le lien de l\'image est invalide';
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