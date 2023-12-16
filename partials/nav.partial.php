<nav>
  <ul>
    <?php echo $home->and($home->children)->implode(' ', "<li><a href='{url}'>{title}</a></li>"); ?>
  </ul>
</nav>
