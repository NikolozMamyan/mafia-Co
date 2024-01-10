<?php

namespace App\Controllers;

use DB;

class HomeController extends Controller
{
    public function index() : void
    {
        $this->render('home/index');
    }
}