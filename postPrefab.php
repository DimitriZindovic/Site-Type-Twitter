<?php
require_once "connexion.php";

$predefinedTag = "film";
$predefinedContent = "Contenu du post prédéfini";
$predefinedDate = "2023-05-22 12:00:00";
$predefinedImage = "";
$predefinedUserId = 1;

$stmt = $database->prepare("INSERT INTO post (tag, content, date, image, user_id) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$predefinedTag, $predefinedContent, $predefinedDate, $predefinedImage, $predefinedUserId]);
$stmt->closeCursor();

$database = null;
header("Location: index.php");
?>