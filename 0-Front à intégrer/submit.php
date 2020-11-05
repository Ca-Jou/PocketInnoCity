<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Soumettre une idée</title>
    <link rel="stylesheet" href="assets/css/submit.css">
    <link rel="stylesheet" href="assets/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">

  </head>
  <body>
    <header>
      <a href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    </header>
    <section class="formSection">
      <h1>Soumettre une idée</h1>
      <form class="form" action="index.html" method="post">

        <label for="title">Titre*</label>
        <input type="text" name="title">

        <label for="description">Description*</label>
        <textarea name="description"></textarea>

        <label for="localisation">Localisation</label>
        <input type="text" name="localisation">

        <label for="chooseCategory">Global / Ville</label>
        <select name="chooseCategory">
          <option value="global">Global</option>
          <option value="bordeaux">Bordeaux</option>
        </select>
        <input type="submit" name="" value="Envoyer">
        <p>* Champs obligatoires</p>

      </form>
    </section>
    <footer>
      <nav>
        <svg viewBox="0 0 375 24">
        <path d="M0 13.5L33.0303 6.42207C71.2669 -1.77148 110.781 -2.00275 149.111 5.74267V5.74267C174.584 10.89 200.641 12.5266 226.558 10.6068L256.681 8.37548C273.537 7.1269 290.462 7.13695 307.317 8.40556L375 13.5V23.5H0L0 13.5Z" fill="#DBECF5"/>
        </svg>
        <ul>
          <li><a href="world.php">Globe</a></li>
          <li><a href="intégré/cities.php">Mes villes</a></li>
          <li><a href="submit.php">Soumettre</a></li>
          <?php
            $users = 'Johanna';
            if ($users === null) {
                echo "<li><a href=''>Se connecter</a></li>";
            } else {
                echo '<li><a href="../App/Backstage/Modules/Profile/View/showProfile.php"><img src="assets/img/profilNav.png" alt="photo de profil"></a></li>';
            }
           ?>
        </ul>
      </nav>
      <script type="text/javascript" src="assets/js/script.js"></script>
    </footer>
  </body>
</html>
