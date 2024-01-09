<?php

/**
 * Escape HTML
 *
 * @param string $text
 * @return string
 */
function e(string $text): string
{
    return htmlspecialchars($text);
}

/**
 * Escape HTML and echo
 *
 * @param string $text
 * @return void
 */
function ec(string $text): void
{
    echo e($text);
}

function dump(...$args)
{
    foreach ($args as $arg) {
        var_dump($arg);
        echo "\n<br>";
    }
}

function dd(...$args)
{
    dump($args);
    exit();
}
