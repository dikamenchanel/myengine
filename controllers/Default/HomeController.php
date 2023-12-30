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
        $this->view->data['categories']  = $this->home->getCategories();
    
    }


    function index()
    {
        $this->view->data['mainPage']    = $this->home->getMainPage();
        $this->view->data['TrandingDay'] = $this->home->getPopularArticles();
        $this->view->data['articles']    = $this->home->getArticlesForMainPage();
        
        return $this->view->render('default/index.html');
    }
    
    function section($url)
    {
        if($this->home->checkPage($url))
        {
            return $this->goToPage($url);
        }

        if($this->home->checkCategory($url))
        {
           return $this->goToCategory($url);
        }

        return $this->view->error();
    }


    private function goToPage($url)
    {
        $page = $this->home->getPage($url);
        if($page)
        {
            $this->view->data['Page'] = $page;
            return $this->view->render('default/pages.html');
        }

        return $this->view->error();
    }



    private function goToCategory($url)
    {
        $category = $this->home->getCategory($url);
        if($category)
        {
            $this->view->data['Category'] = $category;
            $this->view->data['popularCategory'] = $this->home->getCategoryArticles($url);

            return $this->view->render('default/category.html');

        }

        return $this->view->error();
    }

    function article($catUrl, $urlBlog)
    {
        $Article = $this->home->getArticle($urlBlog);
        if($Article)
        {
            $this->view->data['Article'] = $Article;
            return $this->view->render('default/article.html');
        }

        return $this->view->error();
    }
    


}
