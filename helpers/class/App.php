<?php

/**
 * Class App
 *
 * Handles application-wide functionalities.
 */
class App
{
    /**
     * @var string $locale The current application locale.
     */
    private static string $locale = APP_LOCALE; // APP_LOCALE is set in /bootstrap/configs.php

    /**
     * Report an exception and terminate the application (if in debug mode).
     *
     * @param Exception|string $exception The exception or error message.
     *
     * @return void
     */
    public static function report(Exception|string $exception): void
    {
        if (is_string($exception)) {
            $exception = new Exception($exception);
        }

        self::reportSilent($exception);

        if (self::isDebug()) {
            echo '<h1>Exception</h1>';

            echo $exception->getMessage();
            echo '<br>';

            foreach ($exception->getTrace() as $trace) {
                echo $trace['file'].':'.$trace['line'];
                echo '<br>';
            }

            exit();
        }
    }

    /**
     * Report an exception silently (without terminating the application).
     *
     * @param Exception|string $exception The exception or error message.
     *
     * @return void
     */
    public static function reportSilent(Exception|string $exception): void
    {
        if (is_string($exception)) {
            $exception = new Exception($exception);
        }

        // TODO LOGS in a file for developers
    }

    /**
     * Check if the application is in debug mode.
     *
     * @return bool Returns true if the application is in debug mode, false otherwise.
     */
    public static function isDebug(): bool
    {
        return APP_DEBUG;
    }

    /**
     * Terminate the application by removing errors, success messages, and old data from the session.
     *
     * @return void
     */
    public static function terminate(): void
    {
        // Remove errors, success, and old data
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
    }

    /**
     * Get the current application locale.
     *
     * @return string The current application locale.
     */
    public static function getLocale(): string
    {
        return self::$locale;
    }

    /**
     * Set the application locale.
     *
     * @param string $locale The new application locale.
     *
     * @return void
     */
    public static function setLocale(string $locale): void
    {
        self::$locale = $locale;
    }
}
