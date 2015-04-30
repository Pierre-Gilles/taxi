<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app['debug'] = true;

require __DIR__ . '/../config.php';

/**
 * Requiring all the controllers
 */
require __DIR__ . '/../controllers/security.php';
require __DIR__ . '/../controllers/home.php';
require __DIR__ . '/../controllers/login.php';
require __DIR__ . '/../controllers/contact.php';
require __DIR__ . '/../controllers/signup.php';
require __DIR__ . '/../controllers/country_redirect.php';

/**
 * Starting app
 */
$app->run();

