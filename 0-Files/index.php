<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pocket Inno City</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
  </head>

  <body>
    <header>
      <a href="#"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    </header>
    <section>
      <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le future de ta ville et du monde !</p>
        <img src="assets/img/gens.png" alt="image de conversation" class="pictureHomePage">
        <p>Participe aux sondages,</p>
        <p>Et <strong>réinvente</strong> ton lieu de vie !</p>
      </article>
      <article class="top">
        <h2>Top Idée</h2>
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
        <img class="imgNav" src="assets/img/nav.png" alt="nav">
        <ul>
          <li><a href="#">Globe</a></li>
          <li><a href="#">Bordeaux</a></li>
          <li><a href="submit.php">Soumettre</a></li>
          <?php
            $users = 'Johanna';
            if ($users === null) {
                echo "<li><a href=''>Se connecter</a></li>";
            } else {
                echo '<li><a href="userInfo.php"><img src="assets/img/profilNav.png" alt=""></a></li>';
            }
           ?>
        </ul>
      </nav>
    </footer>
  </body>
</html>
