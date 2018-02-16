<?php

$autoLoader = require_once 'vendor/autoload.php';

// Instantiate the app
$app = new \Slim\App();

// Use Config
if (file_exists("config.php")) {
    require 'config.php';
} else {
    require 'config.temp.php';
}

// Set up database
require_once __DIR__ . '/src/utils/Database.php';

// Register routes
require_once __DIR__ . '/src/routes.php';

// Run app
$app->run();