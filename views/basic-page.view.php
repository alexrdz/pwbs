<?php ob_start(); ?>


<h1><?= $page->title ?></h1>
<?= $page->body ?>



<?php
$content = ob_get_clean();
include __DIR__ . '/_main.php';
