<?php
// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', '2dekans-veilingen');

// Import aliases
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROUTES', ROOT . '/routes.php');
define('PUBLIC_R', ROOT . '/public');
define('SRC', ROOT . '/src');
define('COMPONENTS', SRC . '/components');
define('DATABASE', SRC . '/database');
define('LIB', SRC . '/lib');
define('PUBLIC_S', SRC . '/public');
define('PHPSESSID_NAME', 'rfg8bp0u4qmckt6ah25s1frqr4'); // Set a custom PHPSESSID name to prevent any automated attacks dealing with the default PHPSESSID name

define('ADMIN', 'admin');
define('MEMBER', 'member');
define('GUEST', 'guest');

define('ERROR_MAPPING', [
  'missing' => 'Missing email or password',
  'empty' => 'Empty email or password',
  'invalid' => 'Invalid email or password',
  'password' => 'Passwords do not match',
  
]);

define('SUCCES_MAPPING', [
  'success' => 'You have been succesfully registered',
]);

define('USER_STRUCTURE', [
  'id' => null,
  'username' => null,
  'email' => null,
  'theme' => null,
]);

define('THEME_MAPPING', [
  'default' => 'dark',
  'dark' => 'dark',
  'light' => 'garden',
]);

?>
