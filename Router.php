<?php
class Router
{
  protected $routes = [];
  protected $wire;
  public $vars;

  public function __construct()
  {
    global $wire;

    $this->vars = [
      'page' => $wire->page,
      'user' => $wire->user,
      'users' => $wire->users,
      'pages' => $wire->pages,
      'cache' => $wire->cache,
      'session' => $wire->session,
      'input' => $wire->input,
      'sanitizer' => $wire->sanitizer,
      'modules' => $wire->modules,
    ];
  }

  public function get($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'GET',
    ];
  }

  public function post($uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => 'POST',
    ];
  }

  public function route($uri)
  {
    extract($this->vars);
    $page = $this->vars['pages']->get($uri);
    $home = $pages->get('/');

    if ($page->id) {
      $controller = $page->template->name;
      return require "controllers/{$controller}.php";
    }

    if ($page->id === 0) {
      foreach ($this->routes as $route) {
        if ($route['uri'] === $uri && $route['method'] === $_SERVER['REQUEST_METHOD']) {
          require $route['controller'];
          return;
        }
      }

      // remove segments one by one to see if this is a page template that supports segments
      // TODO: make recursive
      $uriparts = explode('/', $uri);
      $last_segment = array_pop($uriparts);
      $new_uri = implode('/', $uriparts);
      $template = $this->vars['pages']->get($new_uri)->template;

      if ($template->urlSegments) {
        $page = $this->vars['pages']->get($new_uri);
        return require "controllers/{$template}.php";
      }

      $this->abort();
    }
  }

  protected function abort($code = 404)
  {
    http_response_code($code);
    extract($this->vars);
    require "views/{$code}.view.php";
    exit ();
  }

  protected function abortIfMissingPage($uri)
  {
    if ($this->vars['pages']->get($uri)->name === 'http404' || !$this->vars['pages']->get($uri)->name) {
      $this->abort();
    }
  }
}
