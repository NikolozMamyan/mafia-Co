<?php

namespace App\Controllers;

class NotificationController extends Controller
{
    public function index()
    {
        $this->render('notify/notification');
    }
}
