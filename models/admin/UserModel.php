<?php

namespace models\admin;

use models\Model;

class UserModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getUserMail($mail)
    {
        $result = $this->db->selectOne('select * from users left join user_role on user_role.role_id = users.user_role where user_mail = :mail', ['mail' => $mail]);
        
        return $result;
    }



    function getAllUsers($page, $sort)
    {
        $page = (int)$page * PGN_ADMIN;

        $result = $this->db->select("select 
                                    users.user_id, 
                                    from_unixtime(users.create_date, '%d-%m-%Y') as create_date, 
                                    users.first_name, 
                                    users.last_name, 
                                    users.user_mail, 
                                    user_role.role_user 
                                    from users 
                                    left join user_role on user_role.role_id = users.user_role 
                                    order by user_id $sort limit :limit, 25", [':limit' => $page]);
        
        return $result;
    }

    function getCountInfoUsers()
    {
        $result = $this->db->selectOne("select count(*) as count
                                    from users
                                    where 1", []);
        return $result['count'];
    }

    function checkedMail($mail)
    {
        $result = $this->db->selectOne('select * from users where user_mail = :mail', ['mail' => $mail]);
        
        return (intval($result) > 0) ? true : false;
    }



    function addUser($mail, $uname, $lname, $ip, $password, $hash1, $hash2)
    {
        $result = $this->db->insert('users', [ 
                                    'user_mail' => $mail, 
                                    'first_name' => $uname, 
                                    'last_name' => $lname, 
                                    'user_ip' => $ip, 
                                    'user_password' => $password, 
                                    'create_date' => time(), 
                                    'user_hash1' => $hash1, 
                                    'user_hash2' => $hash2, 
                                    'user_role' => 0
                                    ]);
        
        return (intval($result) > 0) ? true : false;
    }

    function checkUserEmail($mail)
    {
        $result = $this->db->selectOne('select user_mail from users where user_mail = :user_mail', ['user_mail' => $mail ]);

        return (intval($result) > 0) ? true : false;
    }


}
