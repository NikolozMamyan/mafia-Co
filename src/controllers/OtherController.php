<?php

namespace App\Controllers;

class OtherController extends Controller
{
    public function conditionIndex()
    {
        $this->render('other/conditionsGeneral');
    }

    public function mentionIndex()
    {
        $this->render('other/mentionLegale');
    }

    public function supportIndex()
    {
        $this->render('other/contactSupport');
    }
}