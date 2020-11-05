<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Mes villes</title>
    <link rel="stylesheet" href="assets/css/common.css">
    <link rel="stylesheet" href="assets/css/city.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
  </head>
  <body>
    <header>
      <a href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    </header>
    <section class="cities">
      <h1>Mes villes suivies</h1>
      <div class="city">
        <div>
          <a href="city.php"><h2>Bordeaux</h2></a>
          <p>Bordeaux, au cœur de la région viticole, est une ville portuaire située sur la Garonne, dans le sud-ouest de la France.</p>
        </div>
        <svg viewBox="0 0 512 512">
          <path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0"/>
          <path d="m385.75 201.75-138.667969 138.664062c-4.160156 4.160157-9.621093 6.253907-15.082031 6.253907s-10.921875-2.09375-15.082031-6.253907l-69.332031-69.332031c-8.34375-8.339843-8.34375-21.824219 0-30.164062 8.339843-8.34375 21.820312-8.34375 30.164062 0l54.25 54.25 123.585938-123.582031c8.339843-8.34375 21.820312-8.34375 30.164062 0 8.339844 8.339843 8.339844 21.820312 0 30.164062zm0 0"/>
        </svg>
      </div>

      <h1>Suivre d'autres villes</h1>

      <div class="city">
        <div>
          <h2>Bordeaux</h2>
          <p>Bordeaux, au cœur de la région viticole, est une ville portuaire située sur la Garonne, dans le sud-ouest de la France.</p>
        </div>
        <svg viewBox="0 0 512 512">
          <path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0"/>
          <path d="m368 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/>
        </svg>
      </div>


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
