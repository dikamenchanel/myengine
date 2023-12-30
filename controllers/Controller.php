<?php

namespace controllers;

use lib\View;
use lib\Session;
use lib\Validate;

class Controller
{
    public $user;
    public $view;
    public $session;
    public $validate;

    function __construct()
    {
        $this->view     = new View();
        $this->session  = new Session();
        $this->validate = new Validate();
    }
}
