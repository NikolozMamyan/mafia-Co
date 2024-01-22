<?php

namespace App\Controllers;

class ChatController extends Controller
{
    //voir websocket php pour le chat
    public function index() : void
    {
        $this->render('chatBox/chat');
    }
}
