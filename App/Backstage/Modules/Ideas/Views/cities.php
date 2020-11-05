<section>
    <article class="presentation">
        <h1>PocketInnoCity</h1>
        <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
    </article>
    <article class="top">
        <h2>Mes villes</h2>
        <ol>
            <?php
            if (!empty($citiesList))
            {
                foreach ($citiesList as $city)
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
