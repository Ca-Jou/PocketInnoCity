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
</header>
<section class="formSection">
    <h1>Soumettre une idée</h1>
    <form class="form" action="" method="post">

        <label for="title">Titre*</label>
        <input type="text" name="title">

        <label for="content">Description*</label>
        <textarea name="content"></textarea>

        <label for="location">Localisation</label>
        <input type="text" name="location">

        <label for="city">Ville</label>
        <select name="city">
            <?php
            foreach($citiesList as $city)
            {
            ?>
                <option value="<?= $city['cityID'] ?>"><?= $city['name'] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" name="" value="Envoyer">
        <p>* Champs obligatoires</p>
    </form>
</section>
