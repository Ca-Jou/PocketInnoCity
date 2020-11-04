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
        <ol>
            <?php
            if (!empty($cityIdeas))
            {
                foreach ($cityIdeas as $idea)
                {
                ?>
                    <li><?= $idea['title'] ?></li>
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
        </ol>
    </article>
</section>
