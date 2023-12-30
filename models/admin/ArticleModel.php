<?php

namespace models\admin;

use models\Model;

class ArticleModel extends Model
{


    function __construct()
    {
        parent::__construct();
    }

    /**
     * method@ArticleModel::getDataArticles($page, $sort) 
     *
     * return array
     * */ 
    function getDataArticles($page, $sort)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->select("select 
                                    articles.id, 
                                    from_unixtime(articles.create_date, '%d-%m-%Y') as date, 
                                    articles.title, 
                                    categories.title as category,
                                    articles.is_published,
                                    concat('/', categories.url, '/', articles.url) as link
                                    from articles 
                                    left join categories on categories.id = articles.category_id
                                    order by id $sort limit :limit, 25", [':limit' => $page]);
        
        return $result;
    }

    /**
     * method@ArticleModel::getCountInfoArticles()
     *  
     * return integer
     * */
    function getCountInfoArticles()
    {
        $result = $this->db->selectOne("select count(*) as count
                                    from articles
                                    where 1", []);
        return $result['count'];
    }

    /**
     * method@CategoryModel::getDataCategorys($page, $sort) 
     *
     * return array
     * */ 
    function getCategoriesForSelect()
    {
        $result = $this->db->select("select 
                                    id, 
                                    title
                                    from categories
                                    order by id ASC", [], 3);
        
        return $result;
    }

    /**
     * method@CategoryModel::getDataCategorys($page, $sort) 
     *
     * return array
     * */ 
    function getAuthorsForSelect()
    {
        $result = $this->db->select("select 
                                    id, 
                                    name
                                    from authors
                                    order by id ASC ", [], 3);
        
        return $result;
    }

    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getArticle($id)
    {
        $result = $this->db->selectOne("select * from articles where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addArticle($requset)
     * 
     * return true or false
     * */
    function addArticle($requset)
    {

        $result = $this->db->insert('articles', $requset);   
        return (intval($result) > 0) ? true : false;
    }

    /**
     * method@ArticleModel::editArticle($id,$requset)
     * 
     * return true or false
     * */
    function editArticle($id, $requset)
    {
        $result = $this->db->update('articles', $requset, "id = $id");
        return (intval($result) > 0) ? true : false;
    }



    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getArticleForDelete($id)
    {
        $result = $this->db->selectOne("select id, title from articles where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addUser()
     * 
     * return true or false
     * */
    function delArticle($id)
    {
        $result = $this->db->delete('articles', "id = $id");
        return (intval($result) > 0) ? true : false;
    }
}
