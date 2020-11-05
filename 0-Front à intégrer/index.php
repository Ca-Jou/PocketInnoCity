<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Pocket Inno City</title>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/homePage.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    </header>
    <section>
      <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
        <img src="assets/img/gens.png" alt="image de conversation" class="pictureHomePage">
        <p>Participe aux sondages,</p>
        <p>Et <strong>réinvente</strong> ton lieu de vie !</p>
      </article>
      <article class="top">
        <h2>Top Idée dans le monde</h2>
        <ol>
          <li>Des Potagers partagés</li>
          <li>Trocs de fruits et legumes</li>
          <li>Plus d’espace pieton dans les villes</li>
          <li>Atelier Zero dechet entre voisin</li>
          <li>Trocs de fruits et legumes</li>
        </ol>
      </article>
    </section>
    <footer>
      <nav>
        <svg viewBox="0 0 375 24">
        <path d="M0 13.5L33.0303 6.42207C71.2669 -1.77148 110.781 -2.00275 149.111 5.74267V5.74267C174.584 10.89 200.641 12.5266 226.558 10.6068L256.681 8.37548C273.537 7.1269 290.462 7.13695 307.317 8.40556L375 13.5V23.5H0L0 13.5Z" fill="#DBECF5"/>
        </svg>
        <ul>
          <li><a href="world.php">Globe</a></li>
          <li><a href="cities.php">Mes villes</a></li>
          <li><a href="submit.php">Soumettre</a></li>
          <?php
            $users = 'Johanna';
            if ($users === null) {
                echo "<li><a href=''>Se connecter</a></li>";
            } else {
                echo '<li><a href="userInfo.php"><img src="assets/img/profilNav.png" alt="photo de profil"></a></li>';
            }
           ?>
        </ul>
      </nav>
      <script type="text/javascript" src="assets/js/script.js"></script>
    </footer>
  </body>
</html>
