<?php

namespace controllers;

use abstracts\BaseController;

class PagesController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'pages';
    }

    public function home()
    {
        $this->render('home');
    }

    public function error()
    {
        $this->render('error');
    }
}