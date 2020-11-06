<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/submit.css">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="/"><img class="logo" src="/assets/img/logo.png" alt="logo"></a>
    <h1>PocketInnoCity</h1>
</header>
<section class="formSection">
    <h1>Soumettre une idée</h1>

    <?php if ($visitor->hasFlash())
    {
        ?>
        <section id="main">
            <p><?= $visitor->getFlash() ?></p>
        </section>
        <?php
    }
    ?>

    <form class="form" action="" method="post">

        <label for="title">Titre*</label>
        <input type="text" name="title" required placeholder="Plus d'espaces verts !">

        <label for="content">Description*</label>
        <textarea name="content" rows="5" required placeholder="Pour remettre la Nature au centre de nos vies, remettons-la au centre de nos villes ! Pour commencer, je propose la création d'un parc avec de l'herbe et des fleurs mellifères sur la place des Quinconces."></textarea>

        <label for="location">Lieu (adresse, quartier...)</label>
        <input type="text" name="location" placeholder="Place des Quinconces">

        <label for="city">Ville*</label>
        <select name="city" required>
            <option value="1">Global</option>
            <?php
            foreach($citiesList as $city)
            {
            ?>
                <option value="<?= $city['cityID'] ?>"><?= $city['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <p>* Champs obligatoires</p>
        <input type="submit" name="" value="Envoyer">
    </form>
</section>
