<?php

namespace App\Controllers;

use DB;
use Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = DB::statement(
            'SELECT * FROM notifications WHERE idUtilisateur = :idUtilisateur AND isReadNotification = 0',
            ['idUtilisateur' => Auth::getSessionUserId()]
        );
        $this->render('notify/notification', ['notification' => $notification]);
    }
}
