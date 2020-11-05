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

<section>
    <section class="cities">
        <h1>Mes villes</h1>
        <?php
        if (!empty($userCities))
        {
            foreach ($userCities as $city)
            {
                ?>
                <div class="city">
                    <div>
                        <a href="/auth/city-<?= $city['cityID'] ?>.php"><h2><?= $city['name'] ?></h2></a>
                        <p><?= $city['country'] ?></p>
                    </div>
                    <svg viewBox="0 0 512 512">
                        <path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0"/>
                        <path d="m385.75 201.75-138.667969 138.664062c-4.160156 4.160157-9.621093 6.253907-15.082031 6.253907s-10.921875-2.09375-15.082031-6.253907l-69.332031-69.332031c-8.34375-8.339843-8.34375-21.824219 0-30.164062 8.339843-8.34375 21.820312-8.34375 30.164062 0l54.25 54.25 123.585938-123.582031c8.339843-8.34375 21.820312-8.34375 30.164062 0 8.339844 8.339843 8.339844 21.820312 0 30.164062zm0 0"/>
                    </svg>
                </div>
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

        <h1>Suivre d'autres villes</h1>

        <?php
        if (!empty($userSuggestions))
        {
            foreach ($userSuggestions as $city)
            {
                ?>
                <div class="city">
                    <div>
                        <a href="/auth/city-<?= $city['cityID'] ?>.php"><h2><?= $city['name'] ?></h2></a>
                        <p><?= $city['country'] ?></p>
                    </div>
                    <svg viewBox="0 0 512 512">
                        <path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0"/>
                        <path d="m368 277.332031h-90.667969v90.667969c0 11.777344-9.554687 21.332031-21.332031 21.332031s-21.332031-9.554687-21.332031-21.332031v-90.667969h-90.667969c-11.777344 0-21.332031-9.554687-21.332031-21.332031s9.554687-21.332031 21.332031-21.332031h90.667969v-90.667969c0-11.777344 9.554687-21.332031 21.332031-21.332031s21.332031 9.554687 21.332031 21.332031v90.667969h90.667969c11.777344 0 21.332031 9.554687 21.332031 21.332031s-9.554687 21.332031-21.332031 21.332031zm0 0"/>
                    </svg>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            Vous adhérez déjà à toutes les villes disponibles !
            <?php
        }
        ?>
</section>
