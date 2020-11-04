<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Soumettre une idée</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <header>
      <a href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    </header>
    <section class="formSection">
      <h1>Soumettre une idée</h1>
      <form class="form" action="index.html" method="post">

        <label for="title">Titre</label>
        <input type="text" name="title">

        <label for="description">Description</label>
        <textarea name="description"></textarea>

        <label for="localisation">Localisation</label>
        <input type="text" name="localisation">

        <label for="chooseCategory">GLobal / Ville</label>
        <select name="chooseCategory">
          <option value="global">Global</option>
          <option value="bordeaux">Bordeaux</option>
        </select>

      </form>
    </section>
    <footer>
      <nav>
        <img class="imgNav" src="assets/img/nav.png" alt="nav">
        <ul>
          <li><a href="#">Globe</a></li>
          <li><a href="#">Bordeaux</a></li>
          <li><a href="">Soumettre</a></li>
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
    </footer>
  </body>
</html>
