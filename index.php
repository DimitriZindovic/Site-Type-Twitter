<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SocialUp</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="shortcut icon" href="images/logo-socialup.png" type="image/x-icon" />
</head>

<body>
  <div class="modal">
    <dialog id="modalAdd">
      <form action="post.php" class="modal-add" method="POST">
        <h2>Ajouter un post</h2>
        <select name="tag">
          <option value="" disabled selected>Choisissez un tag</option>
          <option name="tag" value="sport">Sport</option>
          <option name="tag" value="film">Film</option>
          <option name="tag" value="culture">Culture</option>
          <option name="tag" value="social">Social</option>
          <option name="tag" value="evenements">Evenements</option>
          <option name="tag" value="serie">Série</option>
          <option name="tag" value="art">Art</option>
          <option name="tag" value="animaux">Animaux</option>
          <option name="tag" value="nature">Nature</option>
          <option name="tag" value="france">France</option>
        </select>
        <h5>Message :</h5>
        <textarea id="message" name="content" rows="10" cols="50"></textarea>
        <h5>Image :</h5>
        <textarea id="message" name="image" rows="10" cols="50"></textarea>
        <div>
          <button id="cancel-btn" value="cancel"><a href="index.php">Annuler</a></button>
          <button id="confirm-btn" value="default">Poster</button>
        </div>
      </form>
    </dialog>
  </div>
  <div class="modal">
    <dialog id="modalLogin">
      <form class="modal-sup">
        <h2>Vous devez soit :</h2>
        <div>
          <button class="btn-create-account" value="cancel">
            <a href="account.php">Créer votre compte</a>
          </button>
          <button class="btn-account" value="default">
            <a href="login.php">Connectez-vous</a>
          </button>
        </div>
      </form>
    </dialog>
  </div>
  <button id="showModal">
    <img src="images/icon-add.png" alt="Ajouter un post" class="change-color" />
  </button>
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
          <button class="btn-create-account">
            <a href="profil.php">Voir votre profil</a>
          </button>
        </li>
        <li>
          <button class="btn-account">
            <a href="login.php  ">Connectez-vous</a>
          </button>
        </li>
        <li>
          <button class="btn-create-account">
            <a href="account.php">Créer votre compte</a>
          </button>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="container-post-settings">
      <div class="container-settings-add">
        <div class="container-settings">
          <button class="btn-settings">
            <img src="images/icon-settings.png" alt="Boutton de paramètres" class="change-color" />
            Vos paramètres
          </button>
        </div>
      </div>
      <div class="container-post">
        <div class="container">
          <div class="dropdown">
            <button class="dropbtn">Tags</button>
            <div class="dropdown-content">
              <a href="#" class="tag-list">Sport</a>
              <a href="#" class="tag-list-1">Film</a>
              <a href="#" class="tag-list-2">Culture</a>
              <a href="#" class="tag-list">Social</a>
              <a href="#" class="tag-list">Evenements</a>
              <a href="#" class="tag-list">Série</a>
              <a href="#" class="tag-list">Art</a>
              <a href="#" class="tag-list">Animaux</a>
              <a href="#" class="tag-list">Nature</a>
              <a href="#" class="tag-list">France</a>
            </div>
          </div>
        </div>
        <br />
        <?php
        require_once 'connexion.php';

        $requete = $database->prepare("SELECT * FROM post ORDER BY date DESC");
        $requete->execute();

        $requete_user = $database->prepare("SELECT pseudo, prenom FROM users);
        $requete_user->execute();

        $posts = $requete->fetchAll(PDO::FETCH_ASSOC);
        $users = $requete_user->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) { ?>
          <div class="card-post">
            <div class="post">
              <div class="post-description">
              </div>
            </div>
            <br>
            <p>
              <span class="tag-1 tag">
                <?php echo $post['tag']; ?>
              </span>
              <?php echo $post['content']; ?>
            </p>
            <img style="width: 100%; margin-top: 2%; margin-bottom: 2%;" src="<?php echo $post['image']; ?>">
            <p>
              <?php echo $post['date']; ?>
            </p>
            <div id="icon-cross">
              <div class="red-cross"></div>
              </a>
            </div>
          </div>
          <div class="modal">
            <dialog id="modalSup">
              <form class="modal-sup">
                <h2>Voulez-vous retirer ce post</h2>
                <div>
                  <button id="cancel-btn" value="cancel"><a href="index.php">Non</a></button>
                  <button id="confirm-btn" value="default"><a
                      href="delete.php?id=<?php echo $post['id'] ?>">Oui</a></button>
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