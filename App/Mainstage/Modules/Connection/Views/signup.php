<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/signup.css">
    <link rel="stylesheet" href="/assets/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>

<body>
<header>
    <a href="/"><img class="logo" src="/assets/img/logo.png" alt="logo"></a>
    <h1>PocketInnoCity</h1>
</header>
<section class="formSection">
    <h1>S'inscrire</h1>

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

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" required placeholder="OKBoomer">

        <label for="mail">Adresse mail</label>
        <input type="email" name="mail" required placeholder="jean.dupont@laposte.net">

        <label for="city">Ville</label>
        <input type="text" name="city" required placeholder="Bordeaux">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" required placeholder="********">

        <input type="submit" name="" value="S'inscrire">
    </form>
</section>