# Bootstrapped Processwire Installation
You'll need to install Processwire CMF in the root directory of your site.

The bootstrapped Processwire installation should be located in `/pw`.

Login to your Processire site and configure with the usual templates, fields, modules, etc.

## Working with the bootstrapped Processwire installation
The easiest way to get started is to create a page in your Processwire admin. Once the page is created, you will need to create a controller in the `controllers` directory with the same name as the template file of your page. For example, if your page is called `about` and uses the `basic-page` template, then you will need to create a controller called `basic-page.php`. In that controller, you can then require the view file of your page.

Included in this repo is a `basic-page.php` controller and a `basic-page.view.php` view file.

You will need to follow these steps for all templates used in your PW page creation.

### working with custom routes and post data
If you would like a route that is not part of your PW site, you can create a route in the `index.php` file at the root of the site using the following code:

```
$router->get('/ranom-page', 'controllers/random.php');
```

You can also create data processing / form handling routesusing the `post` method:

```
$router->get('/create-new-page', 'controllers/create.php');
```

In your controllers you will have access to all the data you need from Processwire to build your app or site, such as `$page`, `$pages`, `$session`, `$user`, `$users` etc.
