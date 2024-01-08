<?php

require_once __DIR__ . '/../bootstrap/app.php';

function base_path(string $path = ''): string
{
    // Add auto /
    if ($path && $path[0] !== '/') {
        $path = '/' . $path;
    }

    return APP_BASE_PATH . $path;
}
