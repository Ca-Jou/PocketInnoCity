<<<<<<< Updated upstream
=======
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/city.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="/"><img class="logo" src="/assets/img/logo.png" alt="logo"></a>
    <h1>PocketInnoCity</h1>
</header>

>>>>>>> Stashed changes
<section>
    <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
    </article>
    <article class="top">
        <h2>Mes villes</h2>
        <ol>
            <?php
            if (!empty($userCities))
            {
                foreach ($userCities as $city)
                {
                    ?>
                    <li><a href="/auth/city-<?= $city['cityID'] ?>.html"><?= $city['name'] ?> (<?= $city['country'] ?>)</a></li>
                    <?php
                }
            }
            else
            {
                ?>
                Vous n'avez adhéré à aucune ville.
                <?php
            }
            ?>
        </ol>
    </article>
</section>
