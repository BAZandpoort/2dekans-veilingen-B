<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once DATABASE . '/connect.php';
require_once ROUTES;
require_once LIB . '/util/util.php';


// Cookie security
//ini_set('session.name', PHPSESSID_NAME); // Set a custom PHPSESSID name to prevent any automated attacks dealing with the default PHPSESSID name.
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.use_strict_mode', '1'); 
/* 
* session.use_strict_mode prevents session fixation attacks by not accepting uninitialized session IDs sent by the browser, recommended to be enabled by PHP docs .
* (The code that regenerates the session ID in the login and register page are not needed then I think?) 
*/



session_start();

$uri = explode('?', $_SERVER['REQUEST_URI'])[0];

$route = array_key_exists($uri, $routes) ? $routes[$uri] : $routes['/404'];

$userid = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

$data = fetch('SELECT * FROM user_profile WHERE userid = ?', [
  'type' => 'i',
  'value' => $userid,
]);
$theme = $data ? THEME_MAPPING[$data['theme']] : THEME_MAPPING['default'];
?>


<!DOCTYPE html>
<!-- Dark: dark  Light: garden -->
<html lang="en" data-theme='<?php echo $theme ?>'

<head>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.3/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="./tailwind.config.js"></script>
  <script src="https://kit.fontawesome.com/58a210823e.js" crossorigin="anonymous"></script>
  <title><?php echo $route['title']; ?></title>
</head>

<body>
  <div class="h-screen">
    <?php $route['nav'] ? include COMPONENTS . '/nav.php' : null; ?>

    <div class="container mx-auto">
      <?php include PUBLIC_S . '/' . $route['view']; ?>
    </div>

    <?php $route['footer'] ? include COMPONENTS . '/footer.php' : null; ?>
  </div>
</body>
</html>