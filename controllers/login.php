<?php
$doLogOut = $input->get('logout') ?? 0;
if ($doLogOut) {
  $session->logout();
  $session->redirect('/');
  exit ();
}

// check for login before outputting markup
if ($input->post->user && $input->post->pass) {
  $user = $sanitizer->username($input->post->user);
  $pass = $input->post->pass;

  if ($session->login($user, $pass)) {
    // login successful
    // $session->redirect("/pw1/admin/");
    $redirect_url = $session->get('login_redirect_url');
    if ($redirect_url) {
      $session->redirect($redirect_url);
      $session->remove('login_redirect_url');
    } else {
      $session->redirect('/');
    }
    // echo '<h2 class="success">Login successful</h2>';
  }
}

require 'views/login.view.php';
