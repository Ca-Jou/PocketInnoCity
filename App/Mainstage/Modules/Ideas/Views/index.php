<?php
foreach ($ideasList as $idea)
{
?>
    <h2><?= $idea['title'] ?></h2>
    <p><?= nl2br($idea['content']) ?></p>
<?php
}