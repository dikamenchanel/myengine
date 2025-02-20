<?php

namespace controllers\Default;

use controllers\Controller;
use models\default\HomeModel;


class HomeController extends Controller
{
    private $home;


    function __construct()
    {
        parent::__construct();
        $this->home = new HomeModel();
    }


    function index()
    {
        $menu = $this->home->getDataTags();

        
        return $this->view->render('default/index.html', ['title' => "Its Cararac.com"]);
    }

    function about()
    {
        echo "About Page US";
    }
    
    function category($url)
    {
        $category = $this->home->getCategory($url);
    
        if($category)
        {
            return $this->view->render('default/category.html', ['title' => "Its Cararac.com", 'car' => $category->title]);
        }

        return $this->view->error();
    }
}
