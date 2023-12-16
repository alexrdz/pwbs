<?php if (!$user->isLoggedin()): ?>
  <?php $session->set('login_redirect_url', $page->url); ?>
  <?php echo $user->isLoggedin() ? '<h2 class="success">Hello, ' . $user->name . '</h2>' : '<h2 class="danger">Hello, guest</h2>';
  if (!$user->isLoggedin()): ?>
    <form action='/login' method='post'>
        <?php if ($input->post->user) echo "<h2 class='error'>Login failed</h2>"; ?>
        <p><label>User <input type='text' name='user' /></label></p>
        <p><label>Password <input type='password' name='pass' /></label></p>
        <p><input type='submit' name='submit' value='Login' /></p>
    </form>
  <?php endif; ?>

  <?php else: ?>
    <h2>hello, <?= $user->name ?></h2>
    <p><a href="/login?logout=1">logout</a></p>
  <?php endif; ?>
