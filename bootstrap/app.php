<?php

// Load configs
require_once __DIR__.'/configs.php';

// Import function helpers
// composer dump-autoload
// composer dumpautoload
require_once __DIR__.'/../vendor/autoload.php';

// Load routes list (use Route helper class)
require_once __DIR__.'/routes.php';

// Start sessions
session_start();