<?php

class App
{
    private static string $locale = APP_LOCALE; // APP_LOCALE is set in /boostrap/configs.php

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

    public static function reportSilent(Exception|string $exception): void
    {
        if (is_string($exception)) {
            $exception = new Exception($exception);
        }

        // TODO LOGS in a file for devs
    }

    public static function isDebug(): bool
    {
        return APP_DEBUG;
    }

    public static function terminate() : void
    {
        // Remove errors, success and old data
        unset($_SESSION['errors']);
        unset($_SESSION['success']);
        unset($_SESSION['old']);
    }

    public static function getLocale(): string
    {
        return self::$locale;
    }

    public static function setLocale(string $locale): void
    {
        self::$locale = $locale;
    }
}
