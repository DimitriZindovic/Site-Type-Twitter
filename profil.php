<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Profil</title>
  <link rel="shortcut icon" href="images/logo-socialup.png" type="image/x-icon" />
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

  $user_id = $_SESSION['id'];

  ?>
  <div class="container-avatar">
    <img src="images/image-profil-full.jpeg" alt="Avatar" class="avatar-profil" />
  </div>

  <main>
    <div class="container-description">
      <?php
      require_once 'connexion.php';

      $requete = $database->prepare("SELECT * FROM post INNER JOIN users ON post.user_id = users.id WHERE post.user_id = $user_id ORDER BY date DESC");
      $requete->execute();
      $posts = $requete->fetchAll(PDO::FETCH_ASSOC);

      $requete_prenom_nom = $database->prepare("SELECT users.prenom, users.nom FROM users INNER JOIN post ON post.user_id = users.id WHERE users.id = :user_id");
      $requete_prenom_nom->bindParam(':user_id', $user_id);
      $requete_prenom_nom->execute();
      $utilisateur = $requete_prenom_nom->fetch(PDO::FETCH_ASSOC);
      ?>
      <h2 class="h2-profil">
        <?php echo $utilisateur['prenom']; ?>
        <?php echo $utilisateur['nom']; ?>
        </hZ>
        <h3 class="h3-profil">Vos Posts</h3>
        <?php
        foreach ($posts as $post) { ?>
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
            <img style="width: 100%; margin-top: 2%; margin-bottom: 2%;" src="<?php echo $post['image']; ?>">
            <div id="icon-cross">
              <div class="red-cross" onclick="openModal(<?php echo $post['id']; ?>)"></div>
            </div>
          </div>
          <div class="modal">
            <dialog id="modalSup<?php echo $post['id']; ?>">
              <form class="modal-sup" action="delete.php" method="POST">
                <h2>Voulez-vous retirer ce post</h2>
                <div>
                  <button id="cancel-btn" value="cancel" onclick="closeModal()">Non</button>
                  <button id="confirm-btn" value="default" type="submit"><a
                      href="delete-profil.php?id=<?php echo $post['id_post'] ?>">Oui</a></button>
                </div>
              </form>
            </dialog>
          </div>
          <?php
        }
        ?>
    </div>
  </main>
  <script src="script.js"></script>
</body>

</html>