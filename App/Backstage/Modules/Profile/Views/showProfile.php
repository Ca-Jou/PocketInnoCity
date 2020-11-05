<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?= isset($title) ? $title : 'Pocket Inno City' ?></title>
    <link rel="stylesheet" href="/assets/css/common.css">
    <link rel="stylesheet" href="/assets/css/userInfo.css">
    <link rel="stylesheet" href="/assets/css/city.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <a href="index.php"><img class="logo" src="assets/img/logo.png" alt="logo"></a>
    <h1>PocketInnoCity</h1>
</header>
<section>
    <div class="userInfoPerso">
        <img src="/assets/img/profil.png" alt='photo de profil'>
        <h2><strong><?= $user['pseudo'] ?></strong></h2>
        <p><?= $city['name'] ?> (<?= $city['country'] ?>)</p>
    </div>
    <div class="userInfoPic">
        <div>
            <h3>Idées soumises</h3>
            <p><?= count($userIdeas) ?></p>
        </div>
        <div>
            <h3>Villes suivies</h3>
            <p><?= count($userSubs) ?></p>
        </div>
    </div>
</section>
<section class="suggestions">
    <h1>Mes Idées</h1>
    <?php
    if (!empty($userIdeas))
    {
        foreach ($userIdeas as $idea)
        {
            ?>
            <div class="cardHeart">
                <div>
                    <h2><?= $idea['title'] ?></h2>
                    <p><?= $idea['content'] ?></p>
                </div>
                <button role="button" onclick="toggleHeart(this)" class="dislike" name="button">
                    <svg viewBox="0 -20 480 480">
                        <path d="m348 8c-44.773438.003906-86.066406 24.164062-108 63.199219-21.933594-39.035157-63.226562-63.195313-108-63.199219-68.480469 0-124 63.519531-124 132 0 172 232 292 232 292s232-120 232-292c0-68.480469-55.519531-132-124-132zm0 0"/>
                        <path d="m348 0c-43 .0664062-83.28125 21.039062-108 56.222656-24.71875-35.183594-65-56.1562498-108-56.222656-70.320312 0-132 65.425781-132 140 0 72.679688 41.039062 147.535156 118.6875 216.480469 35.976562 31.882812 75.441406 59.597656 117.640625 82.625 2.304687 1.1875 5.039063 1.1875 7.34375 0 42.183594-23.027344 81.636719-50.746094 117.601563-82.625 77.6875-68.945313 118.726562-143.800781 118.726562-216.480469 0-74.574219-61.679688-140-132-140zm-108 422.902344c-29.382812-16.214844-224-129.496094-224-282.902344 0-66.054688 54.199219-124 116-124 41.867188.074219 80.460938 22.660156 101.03125 59.128906 1.539062 2.351563 4.160156 3.765625 6.96875 3.765625s5.429688-1.414062 6.96875-3.765625c20.570312-36.46875 59.164062-59.054687 101.03125-59.128906 61.800781 0 116 57.945312 116 124 0 153.40625-194.617188 266.6875-224 282.902344zm0 0"/>
                    </svg>
                </button>
            </div>
            <?php
        }
    }
    else
    {
        ?>
        <p>Vous n'avez pas encore soumis d'idée.</p>
        <?php
    }
    ?>

    <button type="button" name="button" class="logout"><a href="/signout/">Se déconnecter</a></button>
</section>