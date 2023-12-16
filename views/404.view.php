<?php ob_start(); ?>

<h1>Sorry, page not found</h1>
<p><a href="/">home</a></p>

<?php
$content = ob_get_clean();
include __DIR__ . '/_main.php';
