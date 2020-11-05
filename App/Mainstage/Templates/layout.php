<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="#"><img class="logo" src="/assets/img/logo.png" alt="logo"></a>
</header>

<section id="main">
    <?php if ($visitor->hasFlash()) echo '<p style="text-align: center;">', $visitor->getFlash(), '</p>'; ?>
</section>

<?= $content ?>

<footer>
    <nav>
        <svg viewBox="0 0 375 24">
            <path d="M0 13.5L33.0303 6.42207C71.2669 -1.77148 110.781 -2.00275 149.111 5.74267V5.74267C174.584 10.89 200.641 12.5266 226.558 10.6068L256.681 8.37548C273.537 7.1269 290.462 7.13695 307.317 8.40556L375 13.5V23.5H0L0 13.5Z" fill="#DBECF5"/>
        </svg>
        <ul>
            <?php
            if (!$visitor->isAuthenticated())
            {
                echo "<li><a href='/signin/'>Se connecter</a></li>";
            }
            else
            {
                ?>
                <li><a href="/auth/city-1.php">Monde</a></li>
                <li><a href="/auth/cities.php">Mes villes</a></li>
                <li><a href="/auth/submit.php">Soumettre</a></li>
                <li><a href="/auth/profile.php"><img src="/assets/img/profilNav.png" alt=""></a></li>
                <?php
            }
            ?>
        </ul>
    </nav>
    <script type="text/javascript" src="/assets/js/script.js"></script>
</footer>
</body>
</html>
