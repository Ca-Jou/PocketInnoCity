<div id="content-wrap">
    <section id="main">
        <?php if ($visitor->hasFlash()) echo '<p style="text-align: center;">', $visitor->getFlash(), '</p>'; ?>
    </section>
</div>
<article class="presentation">
    <h1>PocketInnoCity</h1>
    <p>L’application qui fait bouger le futur de ta ville et du monde !</p>
    <img src="assets/img/gens.png" alt="image de conversation" class="pictureHomePage">
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

