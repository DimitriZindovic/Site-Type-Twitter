<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Profil</title>
  <link rel="shortcut icon" href="images/logo-socialup.png" type="image/x-icon">
</head>

<body>
  <header>
    <nav class="navbar-socialup">
      <div class="logo-nav">
        <a href="index.php"><img src="images/name-socialup.png" alt="Logo de SocialUp" /></a>
      </div>
    </nav>
  </header>
  <?php
  session_start();

  require_once 'connexion.php';

  $user_id = $_SESSION['id'];

  $requete_pseudo = $database->prepare("SELECT image_profil FROM users WHERE id = :user_id");
  $requete_pseudo->bindParam(':user_id', $user_id);
  $requete_pseudo->execute();
  $user = $requete_pseudo->fetch(PDO::FETCH_ASSOC);
  ?>
  <div class="container-avatar">
    <img alt="" src="<?php echo $user['image_profil']; ?>" class="avatar-profil">
  </div>

  <main>
    <div class="container-description">
      <?php
      $requete = $database->prepare("SELECT * FROM post INNER JOIN users ON post.user_id = users.id ORDER BY date DESC");
      $requete->execute();
      $posts = $requete->fetchAll(PDO::FETCH_ASSOC);

      $requete_prenom_nom = $database->prepare("SELECT nom, prenom FROM users WHERE id = :user_id");
      $requete_prenom_nom->bindParam(':user_id', $user_id);
      $requete_prenom_nom->execute();
      $utilisateur = $requete_prenom_nom->fetch(PDO::FETCH_ASSOC);
      ?>
      <h2 class="h2-profil">
        <?php echo $utilisateur['prenom']; ?>
        <?php echo $utilisateur['nom']; ?>
      </h2>
      <h3 class="h3-profil">Vos Posts</h3>
      <?php

      foreach ($posts as $post) {
        if ($_SESSION['id'] == $post['user_id']) { ?>
          <div class="card-post">
            <div class="post">
              <div class="post-description">
              </div>
            </div>
            <br>
            <p>
              <span class="tag">
                <?php echo $post['tag']; ?>
              </span>
              <?php echo $post['content']; ?>
            </p>
            <p> le
              <?php echo $post['date']; ?>
            </p>
            <?php if (!empty($post['image'])): ?>
              <img alt="" style="max-width: 100%; margin-top: 2%; margin-bottom: 2%" src="<?php echo $post['image']; ?>">
            <?php endif; ?>
            <div class="icon-cross">
              <div class="red-cross" onclick="openModal(<?php echo $post['id']; ?>)"></div>
            </div>
          </div>
          <div class="modal">
            <dialog class="modalSup<?php echo $post['id']; ?>">
              <div class="modal-cancel">
                <div class="cancel-btn" onclick="closeModal(<?php echo $post['id']; ?>)"></div>
              </div>
              <form class="modal-sup" action="delete.php" method="POST">
                <h2 class="h2-modal">Voulez-vous retirer ce post</h2>
                <div>
                  <a href="delete.php?id=<?php echo $post['id_post'] ?>" class="confirm-btn">Oui</a>
                </div>
              </form>
            </dialog>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </main>
  <script src="script.js"></script>
</body>

</html>