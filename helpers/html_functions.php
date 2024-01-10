<?php


if (!function_exists('e')) {
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
}

if (!function_exists('ec')) {
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

}
