<?php

namespace controllers\Admin;

use controllers\Admin\AdminController;
use models\admin\CategoryModel;
use lib\Table;
use lib\Form;


class CategoriesController extends AdminController
{
    public $category;

    public function __construct()
    {
        parent::__construct();

        $this->category = new CategoryModel();

        // if($this->session->get('user_'.session_id())['role'] != 'Admin')
        // {
        //     return $this->view->redirect('admin');
        // }
    }


    function default($urlCategory, $i=0)
    {
        $url = $this->url.$urlCategory;

        $categories = $this->category->getDataCategories($i, 'DESC');

        $Table = new Table();

        $Table->generateTable($categories);

        $Table->addStyle([0 => 'width:10%;',1 => 'width:10%;']);
        $Table->addLink(1);
        $Table->addAction($url);

        $this->view->data['title']   = 'Categories ';
        $this->view->data['Table']   = $Table;
        $this->view->data['Access']  = ($this->session->has('Access')) ? $this->session->get('Access') : false;
        $this->view->data['addIcon'] = "fa-solid fa-list-check fa-2xl";
        $this->view->data['addUrl']  = $url.'/add';

        $this->session->remove('Access');
        
        $countCategories = $this->category->getCountInfoCategories();

        if($countCategories > PGN_ADMIN )
        {
            $len = round($countCategories / PGN_ADMIN);
            $this->view->data['Pagination'] = array('url' => $url, 'active' => $i, 'len' => $len);
        }
    
        return $this->view->render('admin/index.html');
    }


    function addAction($urlCategory)
    {
        $Form = new Form();

        $Form->action = $this->url.$urlCategory.'/add';
        $Form->addSubmit('Сохранить', 'btn');
        $Form->addInput('title', '', 'text', 'Заголовок Раздела');
        $Form->addInput('url', '', 'text', 'Url Раздела');
        $Form->addTextarea('description', '', 'Краткое описание Раздела');

        if($this->session->has('Error'))
        {
            $Form->formError($this->session->get('Error'));
        }
        $this->session->remove('Error');
        
        $this->view->data['Form']    = $Form;
        $this->view->data['backUrl'] = $this->url.$urlCategory;

        return $this->view->render('admin/index.html');
        
    }

    function insert($request)
    {
        $error = array();
        if(empty($request['title']))
        {
            $error[] = ['title', 'Ваше поле Заголовок пустое так не должно быть!'];
            $error[] = ['url', 'Ваше поле Улр пустое так не должно быть!'];
        }
        
        if(empty($request['url']))
        {
            $request['url'] = $this->validate->parseUrl($request['title']);
        }else{
            $request['url'] = $this->validate->parseUrl($request['url']);
        }
        

        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания статьи, это очень важно!'];
        }


        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect('/admin/categories/add');
        }
       
        unset($request['csrf']);
        $request['create_date'] = time();

        if($this->category->addCategory($request))
        {
        
            $this->session->set('Access', "Запись прошла успешно, данные в Базе!");
            return $this->view->redirect('/admin/categories');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect('/admin/categories/add');

    }


    function editAction($urlCategory, $id)
    {
        $Category = $this->category->getCategory($id);
       
        if($Category)
        {
            $Form = new Form(); 
            
            $category['update_date'] = (!empty($category['update_date'])) ? date('Y-m-d', $category['update_date']):'';

            $Form->addSubmit('Сохранить', 'btn');
            $Form->action =  $this->url.$urlCategory.'/edit';
            $Form->addInput('id', $Category['id'], 'hidden');
            $Form->addInput('title', $Category['title'], 'text', 'Заголовок статьи');
            $Form->addInput('url', $Category['url'], 'text', 'Url статьи');
            $Form->addInput('update_date', '', 'date', 'Было Обновленно');
            $Form->addTextarea('description', $Category['description'], 'Краткое описание');
            

            if($this->session->has('Error'))
            {
                $Form->formError($this->session->get('Error'));
            }
            $this->session->remove('Error');
       
            $this->view->data['Form']  = $Form;
            $this->view->data['deleteUrl']  = $this->url.$urlCategory."/delete/$id";
            $this->view->data['backUrl']    = $this->url.$urlCategory;

            return $this->view->render('admin/index.html');
        }
        return $this->view->error();
    }


    function update($request)
    {
        $id = $request['id'];

        $error = array();
        if(empty($request['title']))
        {
            $error[] = ['title', 'Ваше поле Заголовок пустое так не должно быть!'];
            $error[] = ['url', 'Ваше поле Улр пустое так не должно быть!'];
        }
        
        if(empty($request['url']))
        {
            $request['url'] = $this->validate->parseUrl($request['title']);
        }else{
            $request['url'] = $this->validate->parseUrl($request['url']);
        }
        
        


        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания статьи, это очень важно!'];
        }
        
        if(!empty($request['update_date']))
        {
            $request['update'] = strtotime($request['update_date']);
        }else{
            $request['update_date'] = NULL;
        }


        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect("/admin/categories/edit/{$id}");
        }

        unset($request['id']);
        unset($request['csrf']);

        if($this->category->editCategory($id, $request))
        {
            $this->session->set('Access', "Обновление прошло замечательно, не переживайте)!");
            return $this->view->redirect('/admin/categories');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/categories/edit/{$id}");

    }



    function removeAction($urlCategory, $id)
    {
        $Category = $this->category->getCategoryForDelete($id);
       
        if($Category)
        {
            $Form = new Form(); 

            if($this->session->has('Error'))
            {
                $this->view->data['ErrorDelete'] = $this->session->get('Error');
            }
            $this->session->remove('Error');

            $this->view->data['deleteData'] = array('keys' => array_keys($Category), 'values' => array_values($Category));
            $this->view->data['deleteUrl']  = $this->url.$urlCategory."/delete";
            $this->view->data['editUrl']    = $this->url.$urlCategory."/edit/$id";
            $this->view->data['backUrl']    = $this->url.$urlCategory;

            return $this->view->render('admin/index.html');
        }
        return $this->view->error();
    }

    function delete($request)
    {
        $id = $request['id'];
        if($this->category->delCategory($id))
        {
            $this->session->set('Access', "Вы удалили, данные из Базе ) !!");
            return $this->view->redirect('/admin/categories');
        }
        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/categories/delete/{$id}");
    }

}
