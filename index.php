<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SocialUp</title>
  <link rel="shortcut icon" href="images/logo-socialup.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php

  session_start();

  require_once 'connexion.php';

  if (!isset($_SESSION['id'])) { ?>
    <div class="modal">
      <dialog id="modalLogin">
        <form class="modal-sup">
          <h2>Vous devez soit :</h2>
          <div>
            <a href="account.php" class="btn-create-account">Créer votre compte</a>
            <a href="login.php" class="btn-account">Connectez-vous</a>
          </div>
        </form>
      </dialog>
    </div>
    <header>
      <div class="logo">
        <img src="images/name-socialup.png" alt="Logo" />
      </div>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <nav class="nav-bar">
        <ul>
          <li>
            <a href="login.php" class="btn-header-account">Connectez-vous</a>
          </li>
          <li>
            <a href="account.php" class="btn-header-create-account">Créer votre compte</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <div class="container-post-settings">
        <div class="container-settings-add">
          <div class="container-settings">
            <button class="btn-settings">
              Vos paramètres
            </button>
          </div>
        </div>
        <div class="container-post">
          <div class="container">
            <div class="dropdown">
              <button class="dropbtn">Tags</button>
              <div class="dropdown-content">
                <a href="#" class="tag-list">sport</a>
                <a href="#" class="tag-list">film</a>
                <a href="#" class="tag-list">culture</a>
                <a href="#" class="tag-list">social</a>
                <a href="#" class="tag-list">evenements</a>
                <a href="#" class="tag-list">série</a>
                <a href="#" class="tag-list">art</a>
                <a href="#" class="tag-list">animaux</a>
                <a href="#" class="tag-list">nature</a>
                <a href="#" class="tag-list">france</a>
              </div>
            </div>
          </div>
          <br />
          <?php
          $requete = $database->prepare("SELECT * FROM post INNER JOIN users ON post.user_id = users.id ORDER BY date DESC");
          $requete->execute();
          $posts = $requete->fetchAll(PDO::FETCH_ASSOC);

          foreach ($posts as $post) { ?>
            <div class="card-post">
              <div class="post">
                <div class="post-description">
                  <img alt="" style="width: 60px; height:60px;" src="<?php echo $post['image_profil']; ?>">
                  <p>
                    <?php echo $post['pseudo']; ?>
                  </p>
                </div>
                <br>
                <p>
                  <span class="tag">
                    <?php echo $post['tag']; ?>
                  </span>
                  <?php echo $post['content']; ?>
                </p>
                <br>
                <p>
                  <?php echo $post['date']; ?>
                </p>
                <br>
                <?php if (!empty($post['image'])): ?>
                  <img alt="" style="width: 100%; margin-top: 2%; margin-bottom: 2%" src="<?php echo $post['image']; ?>">
                <?php endif; ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </main>
    <?php
  } else {
    $user_id = $_SESSION['id'];

    $requete_pseudo = $database->prepare("SELECT pseudo FROM users INNER JOIN post ON post.user_id = users.id WHERE users.id = :user_id");
    $requete_pseudo->bindParam(':user_id', $user_id);
    $requete_pseudo->execute();
    $user = $requete_pseudo->fetch(PDO::FETCH_ASSOC);
    ?>
    <button id="showModal">
      <img src="images/icon-add.png" alt="Ajouter un post" class="change-color" />
    </button>
    <div class="modal">
      <dialog id="modalAdd">
        <form action="post.php" class="modal-add" method="POST">
          <h2>Ajouter un post</h2>
          <select name="tag">
            <option value="" disabled selected>Choisissez un tag</option>
            <option class="tag" value="sport">sport</option>
            <option class="tag" value="film">film</option>
            <option class="tag" value="culture">culture</option>
            <option class="tag" value="social">social</option>
            <option class="tag" value="evenements">evenements</option>
            <option class="tag" value="serie">série</option>
            <option class="tag" value="art">art</option>
            <option class="tag" value="animaux">animaux</option>
            <option class="tag" value="nature">nature</option>
            <option class="tag" value="france">france</option>
          </select>
          <input type="hidden" name="user" value="<?php echo $user_id; ?>">
          <h5>Message :</h5>
          <textarea id="message" name="content" rows="10" cols="50"></textarea>
          <h5>Image :</h5>
          <textarea name="image" placeholder="Entrez l'URL de l'image" rows="10" cols="50"></textarea>
          <div>
            <a href="index.php" class="cancel-btn">Annuler</a>
            <button class="confirm-btn" value="default">Poster</button>
          </div>
        </form>
      </dialog>
    </div>
    <header>
      <div class="logo">
        <img src="images/name-socialup.png" alt="Logo" />
      </div>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <nav class="nav-bar">
        <ul>
          <li>
            <a href="profil.php?pseudo=<?php echo $user['pseudo']; ?>" class="btn-header-create-account">Voir votre
              profil</a>
          </li>
        </ul>
      </nav>
    </header>
    <main class="container-main">
      <div class="container-post-settings">
        <div class="container-settings-add">
          <div class="container-settings">
            <button class="btn-settings">
              Vos paramètres
            </button>
          </div>
        </div>
        <div class="container-post">
          <div class="container-tag-list">
            <div class="dropdown">
              <button class="dropbtn">Tags</button>
              <div class="dropdown-content">
                <a href="#" class="tag-list" data-tag="sport">sport</a>
                <a href="#" class="tag-list" data-tag="film">film</a>
                <a href="#" class="tag-list" data-tag="culture">culture</a>
                <a href="#" class="tag-list" data-tag="social">social</a>
                <a href="#" class="tag-list" data-tag="evenements">evenements</a>
                <a href="#" class="tag-list" data-tag="serie">série</a>
                <a href="#" class="tag-list" data-tag="art">art</a>
                <a href="#" class="tag-list" data-tag="animaux">animaux</a>
                <a href="#" class="tag-list" data-tag="nature">nature</a>
                <a href="#" class="tag-list" data-tag="france">france</a>
              </div>
            </div>
            <button class="btn-reset" id="reset-btn">Reset</button>
          </div>
          <br />
          <?php

          $requete = $database->prepare("SELECT * FROM post INNER JOIN users ON post.user_id = users.id ORDER BY date DESC");
          $requete->execute();
          $posts = $requete->fetchAll(PDO::FETCH_ASSOC);

          foreach ($posts as $post) { ?>
            <div class="card-post">
              <div class="post">
                <div class="post-description">
                  <img alt="" style="width: 60px; height:60px;" src="<?php echo $post['image_profil']; ?>">
                  <p>
                    <?php echo $post['pseudo']; ?>
                  </p>
                </div>
                <br>
                <p>
                  <span class="tag">
                    <?php echo $post['tag']; ?>
                  </span>
                  <?php echo $post['content']; ?>
                </p>
                <br>
                <p>
                  <?php echo $post['date']; ?>
                </p>
                <?php if (!empty($post['image'])): ?>
                  <img alt="" style="width: 100%; margin-top: 2%; margin-bottom: 2%" src="<?php echo $post['image']; ?>">
                <?php endif; ?>
                <?php
                if ($_SESSION['id'] == $post['user_id']) {
                  ?>
                  <div class="icon-cross">
                    <div class="red-cross" onclick="openModal(<?php echo $post['id']; ?>)"></div>
                  </div>
                  <?php
                }
                ?>
              </div>
            </div>
            <div class="modal">
              <dialog class="modalSup<?php echo $post['id']; ?>">
                <form class="modal-sup" action="delete.php" method="POST">
                  <h2>Voulez-vous retirer ce post</h2>
                  <div>
                    <button class="cancel-btn" value="cancel" onclick="closeModal()">Non</button>
                    <a href="delete.php?id=<?php echo $post['id_post'] ?>" class="confirm-btn">Oui</a>
                  </div>
                </form>
              </dialog>
            </div>
          <?php } ?>
        </div>
      </div>
    </main>
    <?php
  }
  ?>
  <script src="script.js"></script>
</body>

</html>