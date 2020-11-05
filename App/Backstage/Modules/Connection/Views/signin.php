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
    <h1>Se connecter</h1>
    <form class="form" action="" method="post">

        <label for="login">Pseudo</label>
        <input type="text" name="login">

        <label for="password">Mot de passe</label>
        <input type="password" name="password">

        <input type="submit" name="" value="Connexion">
    </form>
</section>