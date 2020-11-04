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
        <img class="imgNav" src="/assets/img/nav.png" alt="nav">
        <ul>
            <?php
            if (!$visitor->isAuthenticated())
            {
                echo "<li><a href='/signin/'>Se connecter</a></li>";
            }
            else
            {
                ?>
                <li><a href="/auth/city-1.html">Monde</a></li>
                <li><a href="/auth/cities.html">Mes villes</a></li>
                <li><a href="submit.php">Soumettre</a></li>   <!-- TODO: modif route -->
                <li><a href="../../../../../0-Front%20à%20intégrer/userInfo.php"><img src="/assets/img/profilNav.png" alt=""></a></li>     <!-- TODO: modif route -->
                <?php
            }
            ?>
        </ul>
    </nav>
</footer>
</body>
</html>
