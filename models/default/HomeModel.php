<?php

namespace models\default;

use models\Model;

class HomeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }




    function getCategories()
    {
        $result = $this->db->getCache('Categories');
        
        if($result !== Null)
        {
            return $result;
        } else {
            
            $result = $this->db->select('select id, title, url from categories', []);
            
            $this->db->setCache('Categories', $result);
            
            return $result;
        }
    }




    function getMainPage()
    {
        $result = $this->db->getCache('MainPage');

        if($result !== Null)
        {
            return $result;
        } else {
            
            $result = $this->db->selectOne('select * from pages where type = :type', ['type' => 'main']);
            
            $this->db->setCache('MainPage', $result);
            
            return $result;
        }
    }




    function checkCategory($url)
    {    
        $result = $this->db->selectOne('select url from categories where url = :url', ['url' => $url]);
        return (intval($result) > 0) ? true : false;
    }




    function getCategory($url)
    {
        $result = $this->db->getCache('category_'.$url);

        if($result !== Null)
        {
            if($result->url === $url)
            {
                return $result;
            }
            return false;
        } else {
            
            $result = $this->db->selectOne('select * from categories where url = :url', ['url' => $url]);
            
            $this->db->setCache('category_'.$url, $result);
            
            return $result;
        }
    }

    


    function checkPage($url)
    {    
        $result = $this->db->selectOne('select url from pages where url = :url', ['url' => $url]);
        return (intval($result) > 0) ? true : false;
    }




    function getPage($url)
    {
        $result = $this->db->getCache('page_'.$url);

        if($result !== Null)
        {
            if($result->url === $url)
            {
                return $result;
            }
            return false;
        } else {
            
            $result = $this->db->selectOne('select * from pages where url = :url', ['url' => $url]);
            
            $this->db->setCache('pages_'.$url, $result);
            
            return $result;
        }
    }




    function getPopularArticles()
    {
        $result = $this->db->getCache('Popular_articles');
        
        if($result !== Null)
        {
            return $result;
        }else{
            $result = $this->db->select("SELECT 
                                            articles.id, 
                                            CONCAT('/',categories.url, '/', articles.url) as url, 
                                            articles.title, 
                                            articles.description, 
                                            articles.avatar
                                            FROM articles
                                            LEFT JOIN categories 
                                            ON categories.id = articles.category_id
                                            WHERE is_published = 1
                                            AND is_magnet = 1
                                            ORDER BY rating DESC LIMIT 3");
            $this->db->setCache('Popular_articles', $result);
            return $result;
        }
    }


    function getArticlesForMainPage($page=0)
    {

        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->getCache('articles_'.$page);
        
        if($result !== Null)
        {
            return $result;
        }else{
            $result = $this->db->select("SELECT 
                                            articles.id, 
                                            CONCAT('/',categories.url, '/', articles.url) as url, 
                                            articles.title, 
                                            articles.description, 
                                            articles.avatar,
                                            articles.views,
                                            articles.liked,
                                            categories.url as category_url,
                                            categories.title as category_title
                                            FROM articles
                                            LEFT JOIN categories 
                                            ON categories.id = articles.category_id
                                            WHERE is_published = 1
                                            ORDER BY rating DESC LIMIT :page, 25", ['page' => $page]);
            $this->db->setCache('articles_'.$page, $result);
            return $result;
        }
    }


    function getCategoryArticles($url, $page=0)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->getCache('category_articles_'.$url);
        
        if($result !== Null)
        {
            return $result;
        }else{
            $result = $this->db->select("SELECT 
                                            articles.id, 
                                            CONCAT('/',categories.url, '/', articles.url) as url, 
                                            articles.title, 
                                            articles.description, 
                                            articles.avatar 
                                            FROM articles
                                            LEFT JOIN categories 
                                            ON categories.id = articles.category_id
                                            WHERE categories.url = :url
                                            AND is_published = 1
                                            ORDER BY rating DESC LIMIT :page, 25", ['url' => $url, 'page' => $page]);
            $this->db->setCache('category_articles_'.$url, $result);
            return $result;
        }
    }




    function getArticle($url)
    {
        $result = $this->db->getCache('article_'.$url);

        if($result !== Null)
        {
            if($result->url === $url)
            {
                return $result;
            }
            return false;
        } else {
            
            $result = $this->db->selectOne('select * from articles where url = :url', ['url' => $url]);
            
            $this->db->setCache('article_'.$url, $result);
            
            return $result;
        }
    }
}
