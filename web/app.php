<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use Silex\Application;

$app = new Application();
$app['debug'] = true;

require __DIR__ . '/../config.php';

require __DIR__ . '/../controllers/login.php';

$app->run();
