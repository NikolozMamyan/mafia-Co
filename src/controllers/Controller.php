<?php

namespace App\Controllers;

abstract class Controller
{
    /**
     * Get the base path for views.
     *
     * @return string The base path for views.
     */
    protected function getViewsBasePath(): string
    {
        return base_path('/views/');
    }

    /**
     * Render a view.
     *
     * @param string $view The view file name.
     * @param array $data The data to pass to the view.
     */
    public function render(string $view, array $data = []): void
    {
        extract($data); // Convert array key:value to $key = value variables
        require_once $this->getViewsBasePath() . $view . '.php';
    }
}
