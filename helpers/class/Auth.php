<?php

/**
 * Class Auth
 *
 * Handles user authentication-related actions in the application.
 */
class Auth
{
    /**
     * @var string SESSION_KEY The session key for storing the current user ID.
     */
    const SESSION_KEY = 'current_user_id';

    /**
     * @var array|null $user The currently authenticated user.
     */
    private static ?array $user = null;

    /**
     * Get the currently authenticated user.
     *
     * @return array|null The currently authenticated user as an associative array, or null if not authenticated.
     */
    public static function getCurrentUser(): ?array
    {
        $id = self::getSessionUserId();

        if (self::$user === null and $id) {
            self::$user = DB::fetch(
                "SELECT * FROM Utilisateurs JOIN Points ON utilisateurs.idPoint = points.idPoint WHERE idUtilisateur = :idUtilisateur LIMIT 1",
                ['idUtilisateur' => $id]
            );

            if (self::$user === false) {
                self::$user = null;
            } else if (self::$user) {
                self::$user = self::$user[0] ?? null;

                // Not found in records
                if (empty(self::$user)) {
                    self::removeSessionUserId();
                }
            }
        }
        return self::$user;
    }

    /**
     * Check if the user is authenticated; otherwise, redirect to the login page.
     *
     * @return void
     */
    public static function isAuthOrRedirect(): void
    {
        // Check user is auth
        if (!Auth::getCurrentUser()) {
            // Not Auth Or account not exists
            errors('Vous devez être connecté pour accéder à cette page.');
            redirectAndExit('/login.php');
        }
    }

    /**
     * Check if the user is a guest (not authenticated); otherwise, redirect to the profile page.
     *
     * @return void
     */
    public static function isGuestOrRedirect(): void
    {
        // Check user is guest (invité)
        if (Auth::getCurrentUser()) {
            redirectAndExit('/ProfilUser.php');
        }
    }

    /**
     * Get the session key for storing the user ID.
     *
     * @return string The session key.
     */
    public static function getSessionUserIdKey(): string
    {
        return self::SESSION_KEY;
    }

    /**
     * Get the user ID stored in the session.
     *
     * @return int|null The user ID, or null if not found in the session.
     */
    public static function getSessionUserId(): ?int
    {
        return $_SESSION[self::getSessionUserIdKey()] ?? null;
    }

    /**
     * Remove the user ID from the session.
     *
     * @return void
     */
    public static function removeSessionUserId(): void
    {
        unset($_SESSION[self::getSessionUserIdKey()]);
    }
}
