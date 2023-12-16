<?php ob_start(); ?>


<h1 class=""><?= $page->title ?></h1>
<?php require 'partials/auth.partial.php'; ?>


<?php
$content = ob_get_clean();
include __DIR__ . '/_main.php';
