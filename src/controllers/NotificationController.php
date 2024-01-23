<?php

namespace App\Controllers;

use DB;
use Map;
use Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DB::fetch(
            'SELECT * FROM notifications '
                . 'INNER JOIN utilisateurs ON notifications.idUtilisateur = utilisateurs.idUtilisateur '
                . 'INNER JOIN utilisateurs as notified ON notifications.idUtilisateurNotif = notified.idUtilisateur '
                . 'INNER JOIN roles ON utilisateurs.idRole = roles.idRole '
                . 'INNER JOIN points ON utilisateurs.idpoint = points.idpoint '
                . 'WHERE notifications.idUtilisateur = :idUtilisateur AND isReadNotification = 0',
            ['idUtilisateur' => Auth::getSessionUserId()]
        );
        $this->render('notify/notification', ['notifications' => $notifications]);
    }

    public static function computeNotifications()
    {
        //NotificationController::computeNotifications();

        $currentUser = Auth::getCurrentUser();
        $closeUsers = Map::haversineDistanceList([$currentUser], Map::getCloseUsers($currentUser['latitude'], $currentUser['longitude'], Map::MAX_DISTANCE), Map::MAX_DISTANCE);

        foreach ($closeUsers as $closeUser) {
            //dd($currentUser, $closeUsers);
            $count = DB::fetch(
                'SELECT COUNT(*) FROM notifications WHERE idUtilisateur = :idUtilisateur AND idUtilisateurNotif = :idUtilisateurNotif',
                [
                    'idUtilisateur' => $currentUser['idUtilisateur'],
                    'idUtilisateurNotif' => $closeUser['idUtilisateur']
                ]
            )[0]['COUNT(*)'];

            //dd($count);
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
