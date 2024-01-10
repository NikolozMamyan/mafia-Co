<?php

define('APP_BASE_PATH', realpath(__DIR__ . '/../'));

// Import function helpers
require_once __DIR__ . '/../helpers/path_functions.php';
require_once __DIR__ . '/../helpers/redirect_functions.php';
require_once __DIR__ . '/../helpers/session_functions.php';
require_once __DIR__ . '/../helpers/Auth.php';
require_once __DIR__ . '/../helpers/html_functions.php';
require_once __DIR__ . '/../helpers/App.php';

// Start sessions
session_start();
