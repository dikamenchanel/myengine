<?php

namespace controllers\Admin;

use controllers\Controller;
use lib\Image;


class AdminController extends Controller
{

    public $url;
    public $image;

    private $Error;
    
    public function __construct()
    {
        parent::__construct();

        $this->view->data['user'] = $this->session->get('user_'.session_id());

        $this->url = BASE_URL.'admin/';
        $this->image = new Image();
       
        // $this->session->setCsrfToken();
        // $this->view->data['_token'] = $this->session->getCsrfToken();

        if(!$this->session->has('user_'.session_id()))
        {
            return $this->view->redirect('/login');
        }
    }


    function home()
    {
        $this->view->data['title']  = 'Its Admin Cararac.com';

        return $this->view->render('admin/index.html');
    }

}
