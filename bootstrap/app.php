<?php

// Base app path (on filesystem)
define('APP_BASE_PATH', realpath(__DIR__.'/../'));

// Default locale
define('APP_LOCALE', 'fr'); // fr, en, es, de, ...


// Import function helpers
// composer dump-autoload
// composer dumpautoload
require_once __DIR__.'/../vendor/autoload.php';

// Start sessions
session_start();