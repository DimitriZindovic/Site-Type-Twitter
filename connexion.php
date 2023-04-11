<?php
try {
    $database = new PDO('mysql:host=localhost;dbname=social_up', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>