<?php

namespace controllers\Auth;

use controllers\Controller;

class LogoutController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function logout()
    {
        $this->session->destroy();
        return $this->view->redirect('login');
    }
}
