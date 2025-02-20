<?php

namespace controllers\Admin;

use controllers\Admin\AdminController;
use models\admin\UserModel;
use lib\Table;
use lib\Form;


class UsersController extends AdminController
{

    public function __construct()
    {
        parent::__construct();

        $this->user = new UserModel();
        $this->session->setCsrfToken();
        $this->view->data['_token'] = $this->session->getCsrfToken();
        
        // if($this->session->get('user_'.session_id())['role'] != 'Admin')
        // {
        //     return $this->view->redirect('admin');
        // }
    }


    function default($urlCategory, $i=0)
    {
        
        $url = $this->url.$urlCategory;
        
        $users = $this->user->getAllUsers($i, 'DESC');
        $Table = new Table();
        $Table->generateTable($users);
        $Table->addStyle([0 => 'width:20%;', 6 => 'width:40%;justify-content:space-around;color:']);
        $Table->addAction($url);
    
        $this->view->data['title'] = 'USERS ';
        $this->view->data['Table']   = $Table;
        $this->view->data['addIcon'] = "fa-solid fa-user-plus fa-2xl";
        $this->view->data['addUrl']  = $url.'/add';

        $countUsers = $this->user->getCountInfoUsers();

        if($countUsers > PGN_ADMIN )
        {
            $len = round($countUsers / PGN_ADMIN);
            $this->view->data['Pagination'] = array('url' => $url, 'active' => $i, 'len' => $len);
        }
        

        return $this->view->render('admin/index.html');
    }

    function addAction($urlCategory)
    {
        $Form = new Form();

        $Form->action = 'add';
        $Form->addInput('user_id', 'text', 'Url');
        $Form->addSelect('user_role', ['1' => 'Moderator', '2' => 'Admin'], 'User Rule');
        $Form->addInput('user_name', 'checkbox', 'ON Your File');
        $Form->addInput('user_ro', 'file');
        $Form->addSelect('user', ['1' => 'Moderator', '2' => 'Admin'], 'Choose User Rule');
        $Form->addTinymce('tinymce', '', 'Choose User Rule');
        $this->view->data['Form']  = $Form;

        return $this->view->render('admin/index.html');
    }

}
