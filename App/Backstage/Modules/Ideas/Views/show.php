<<<<<<< Updated upstream
<section>
    <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
    </article>
    <article class="top">
        <?php
            if ($city->name() == 'Global')
            {
                $subtitle = 'Les idées pour inventer la ville de demain !';
            }
            else
            {
                $subtitle = 'Les idées pour améliorer '.$city->name().' !';
            }
        ?>
        <h2><?= $subtitle ?></h2>
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

<section class="citySection">
    <?php
    if ($city->name() == 'Global')
    {
        $subtitle = 'Les idées pour inventer la ville de demain !';
    }
    else
    {
        $subtitle = 'Les idées pour améliorer '.$city->name().' !';
    }
    ?>
    <h2><?= $subtitle ?></h2>
    <p class="pSection">Retrouvez ici toutes les idées, votez pour celles que vous préférez et faites les remonter dans la liste !</p>
>>>>>>> Stashed changes

        <?php
        if (!empty($cityIdeas))
        {
            foreach ($cityIdeas as $idea)
            {
                ?>
                <div class="cardHeart">
                    <div>
                        <h2><?= $idea['title'] ?></h2>
                        <p><?= $idea['content'] ?></p>
                    </div>
                    <span>
                        <svg viewBox="0 -28 512.00002 512">
                            <path d="m471.382812 44.578125c-26.503906-28.746094-62.871093-44.578125-102.410156-44.578125-29.554687 0-56.621094 9.34375-80.449218 27.769531-12.023438 9.300781-22.917969 20.679688-32.523438 33.960938-9.601562-13.277344-20.5-24.660157-32.527344-33.960938-23.824218-18.425781-50.890625-27.769531-80.445312-27.769531-39.539063 0-75.910156 15.832031-102.414063 44.578125-26.1875 28.410156-40.613281 67.222656-40.613281 109.292969 0 43.300781 16.136719 82.9375 50.78125 124.742187 30.992188 37.394531 75.535156 75.355469 127.117188 119.3125 17.613281 15.011719 37.578124 32.027344 58.308593 50.152344 5.476563 4.796875 12.503907 7.4375 19.792969 7.4375 7.285156 0 14.316406-2.640625 19.785156-7.429687 20.730469-18.128907 40.707032-35.152344 58.328125-50.171876 51.574219-43.949218 96.117188-81.90625 127.109375-119.304687 34.644532-41.800781 50.777344-81.4375 50.777344-124.742187 0-42.066407-14.425781-80.878907-40.617188-109.289063zm0 0"/>
                        </svg>
                    </span>
                </div>
            <?php
            }
        }
        else
        {
            ?>
            Pas encore d'idées à afficher...
            <?php
        }
        ?>
    </article>
</section>
