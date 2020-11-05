<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/homePage.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="/"><img class="logo" src="/assets/img/logo.png" alt="logo"></a>
</header>
<section>
    <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
        <img src="/assets/img/gens.png" alt="image de conversation" class="pictureHomePage">
        <p>Participe aux sondages,</p>
        <p>Et <strong>réinvente</strong> ton lieu de vie !</p>
    </article>
    <article class="top">
        <h2>Top Idées</h2>
        <ol>
            <?php
            foreach ($ideasList as $idea)
            {
                ?>
                <li><?= $idea['title'] ?></li>
                <?php
            }
            ?>
        </ol>
    </article>
</section>
