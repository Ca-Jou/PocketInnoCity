<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($title) ? $title : 'PocketInnoCity' ?>
    </title>

    <meta charset="utf-8" />
</head>

<body>
<div id="wrap">
    <header>
        <h1><a href="/">Pocket Inno City</a></h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Home</a></li>
        </ul>
    </nav>

    <div id="content-wrap">
        <section id="main">
            <?php if ($visitor->hasFlash()) echo '<p style="text-align: center;">', $visitor->getFlash(), '</p>'; ?>

            <?= $content ?>
        </section>
    </div>

    <footer></footer>
</div>
</body>
</html>