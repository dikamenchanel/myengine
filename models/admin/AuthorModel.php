<?php

namespace models\admin;

use models\Model;

class AuthorModel extends Model
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
    function getDataAuthors($page, $sort)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->select("select 
                                    id, 
                                    url, 
                                    name, 
                                    about_me,
                                    concat('/img/authors/',avatar) as avatar
                                    from authors
                                    order by id $sort limit :limit, 25", [':limit' => $page]);
        
        return $result;
    }

    /**
     * method@ArticleModel::getCountInfoArticles()
     *  
     * return integer
     * */
    function getCountInfoAuthors()
    {
        $result = $this->db->selectOne("select count(*) as count
                                    from authors
                                    where 1", []);
        return $result['count'];
    }

    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getAuthor($id)
    {
        $result = $this->db->selectOne("select * from authors where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addArticle($requset)
     * 
     * return true or false
     * */
    function addAuthor($requset)
    {

        $result = $this->db->insert('authors', $requset);   
        return (intval($result) > 0) ? true : false;
    }

    /**
     * method@ArticleModel::editArticle($id,$requset)
     * 
     * return true or false
     * */
    function editAuthor($id, $requset)
    {
        $result = $this->db->update('authors', $requset, "id = $id");
        return (intval($result) > 0) ? true : false;
    }



    /**
     * method@ArticleModel::getArticle($id)
     * 
     * return @array or false
     * */
    function getAuthorForDelete($id)
    {
        $result = $this->db->selectOne("select id, name from authors where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@ArticleModel::addUser()
     * 
     * return true or false
     * */
    function delAuthor($id)
    {
        $result = $this->db->delete('authors', "id = $id");
        return (intval($result) > 0) ? true : false;
    }
}
