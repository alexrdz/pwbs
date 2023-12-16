<?php

$id = $input->post->id;
$p = $pages->get($id);

$p->of(false);
foreach ($input->post as $key => $value) {
  if($key === 'id') continue;
  $p[$key] = $value;
}
$p->save();

$name = $p->name === 'home' ? '/' : $p->name;
$session->location($name);
