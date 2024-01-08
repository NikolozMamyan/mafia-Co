<?php

function base_path(string $path = ''): string
{
    // Add auto /
    if ($path && $path[0] !== '/') {
        $path = '/' . $path;
    }

    return __DIR__ . '/../' . $path;
}
