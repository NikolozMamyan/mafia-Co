<?php

namespace App\Controllers;

/**
 * Class OtherController
 * @package App\Controllers
 */
class OtherController extends Controller
{
    /**
     * Display the index page for general conditions.
     */
    public function conditionIndex(): void
    {
        $this->render('other/conditionsGeneral');
    }

    /**
     * Display the index page for legal mentions.
     */
    public function mentionIndex(): void
    {
        $this->render('other/mentionLegale');
    }

    /**
     * Display the index page for contacting support.
     */
    public function supportIndex(): void
    {
        $this->render('other/contactSupport');
    }
}
