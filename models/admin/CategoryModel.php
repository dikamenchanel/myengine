<?php

namespace models\admin;

use models\Model;

class CategoryModel extends Model
{


    function __construct()
    {
        parent::__construct();
    }

    /**
     * method@CategoryModel::getDataCategorys($page, $sort) 
     *
     * return array
     * */ 
    function getDataCategories($page, $sort)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->select("select 
                                    id, 
                                    concat('/', url) as url, 
                                    title 
                                    from categories
                                    order by id $sort limit :limit, 25", [':limit' => $page]);
        
        return $result;
    }

    

    /**
     * method@CategoryModel::getCountInfoCategorys()
     *  
     * return integer
     * */
    function getCountInfoCategories()
    {
        $result = $this->db->selectOne("select count(*) as count
                                    from categories
                                    where 1", []);
        return $result['count'];
    }

    /**
     * method@CategoryModel::getCategory($id)
     * 
     * return @array or false
     * */
    function getCategory($id)
    {
        $result = $this->db->selectOne("select * from categories where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@CategoryModel::addCategory($requset)
     * 
     * return true or false
     * */
    function addCategory($requset)
    {

        $result = $this->db->insert('categories', $requset);   
        return (intval($result) > 0) ? true : false;
    }

    /**
     * method@CategoryModel::editCategory($id,$requset)
     * 
     * return true or false
     * */
    function editCategory($id, $requset)
    {
        $result = $this->db->update('categories', $requset, "id = $id");
        return (intval($result) > 0) ? true : false;
    }



    /**
     * method@CategoryModel::getCategory($id)
     * 
     * return @array or false
     * */
    function getCategoryForDelete($id)
    {
        $result = $this->db->selectOne("select id, title from categories where id = :id", [':id' => $id]);
        return (intval($result) > 0) ? $result : false;
    }

    /**
     * method@CategoryModel::addUser()
     * 
     * return true or false
     * */
    function delCategory($id)
    {
        $result = $this->db->delete('categories', "id = $id");
        return (intval($result) > 0) ? true : false;
    }
}
