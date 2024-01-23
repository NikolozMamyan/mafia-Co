<?php

namespace App\Controllers;

use DB;
use Map;
use Auth;

/**
 * Class NotificationController
 * @package App\Controllers
 */
class NotificationController extends Controller
{
    /**
     * Display the index page for notifications.
     */
    public function index()
    {
        // Fetch unread notifications for the current user
        $notifications = DB::fetch(
            'SELECT * FROM notifications '
                . 'INNER JOIN utilisateurs ON notifications.idUtilisateur = utilisateurs.idUtilisateur '
                . 'INNER JOIN utilisateurs as notified ON notifications.idUtilisateurNotif = notified.idUtilisateur '
                . 'INNER JOIN roles ON utilisateurs.idRole = roles.idRole '
                . 'INNER JOIN points ON utilisateurs.idpoint = points.idpoint '
                . 'WHERE notifications.idUtilisateur = :idUtilisateur AND isReadNotification = 0',
            ['idUtilisateur' => Auth::getSessionUserId()]
        );

        // Render the notification page with notification data
        $this->render('notify/notification', ['notifications' => $notifications]);
    }

    /**
     * Compute and create notifications for close users.
     */
    public static function computeNotifications()
    {
        // Get the current user
        $currentUser = Auth::getCurrentUser();

        // Get a list of close users within a certain distance
        $closeUsers = Map::haversineDistanceList([$currentUser], Map::getCloseUsers($currentUser['latitude'], $currentUser['longitude'], Map::MAX_DISTANCE), Map::MAX_DISTANCE);

        // Loop through close users and create notifications if not already existing
        foreach ($closeUsers as $closeUser) {
            $count = DB::fetch(
                'SELECT COUNT(*) FROM notifications WHERE idUtilisateur = :idUtilisateur AND idUtilisateurNotif = :idUtilisateurNotif',
                [
                    'idUtilisateur' => $currentUser['idUtilisateur'],
                    'idUtilisateurNotif' => $closeUser['idUtilisateur']
                ]
            )[0]['COUNT(*)'];

            // If the notification does not exist, create it
            if (!$count) {
                $result = DB::statement(
                    "INSERT INTO notifications(idUtilisateur, idUtilisateurNotif)"
                        . " VALUE(:idUtilisateur, :idUtilisateurNotif);",
                    [
                        'idUtilisateur' => $currentUser['idUtilisateur'],
                        'idUtilisateurNotif' => $closeUser['idUtilisateur'],
                    ]
                );
            }
        }
    }
}
