<?php

if (!function_exists('redirectAndExit')) {
    function redirectAndExit(string $url)
    {
        redirect($url);
        exit();
    }
}

if (!function_exists('redirect')) {
    function redirect(string $url)
    {
        header("Location: $url");
    }
}
