<?php

namespace models\admin;

use models\Model;

class PageModel extends Model
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
    function getDataPages($page, $sort)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->select("select 
                                    id, 
                                    from_unixtime(create_date, '%d-%m-%Y') as date, 
                                    concat('/',url) as url,
                                    type,
                                    title,
                                    description,
                                    is_published
                                    from pages
                                    order by id $sort limit :limit, 25", [':limit' => $page]);
        
        return $result;
    }

    /**
     * method@ArticleModel::getCountInfoArticles()
     *  
     * return integer
     * */
    function getCountInfoPages()
    {
        $result = $this->db->selectOne("select count(*) as count
                                    from pages
                                    where 1", []);
        return $result['count'];
    }

    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getPage($id)
    {
        $result = $this->db->selectOne("select * from pages where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addArticle($requset)
     * 
     * return true or false
     * */
    function addPage($requset)
    {

        $result = $this->db->insert('pages', $requset);   
        return (intval($result) > 0) ? true : false;
    }

    /**
     * method@ArticleModel::editArticle($id,$requset)
     * 
     * return true or false
     * */
    function editPage($id, $requset)
    {
        $result = $this->db->update('pages', $requset, "id = $id");
        return (intval($result) > 0) ? true : false;
    }



    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getPageForDelete($id)
    {
        $result = $this->db->selectOne("select id, title from pages where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addUser()
     * 
     * return true or false
     * */
    function delPage($id)
    {
        $result = $this->db->delete('pages', "id = $id");
        return (intval($result) > 0) ? true : false;
    }
}
