<?php

namespace App\Controllers;

use DB;
use Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DB::fetch(
            'SELECT * FROM notifications '
                . 'INNER JOIN utilisateurs ON notifications.idUtilisateur = utilisateurs.idUtilisateur '
                . 'INNER JOIN roles ON utilisateurs.idRole = roles.idRole '
                . 'INNER JOIN points ON utilisateurs.idpoint = points.idpoint '
                . 'WHERE notifications.idUtilisateur = :idUtilisateur AND isReadNotification = 0',
            ['idUtilisateur' => Auth::getSessionUserId()]
        );
        $this->render('notify/notification', ['notifications' => $notifications]);
    }
}
