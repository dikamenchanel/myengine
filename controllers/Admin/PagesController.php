<?php

namespace controllers\Admin;

use controllers\Admin\AdminController;
use models\admin\PageModel;
use lib\Table;
use lib\Form;


class PagesController extends AdminController
{
    public $page;

    public function __construct()
    {
        parent::__construct();

        $this->page = new PageModel();

        // if($this->session->get('user_'.session_id())['role'] != 'Admin')
        // {
        //     return $this->view->redirect('admin');
        // }
    }


    function default($urlCategory, $i=0)
    {
        $url = $this->url.$urlCategory;

        $pages = $this->page->getDataPages($i, 'DESC');

        $Table = new Table();

        $Table->generateTable($pages);

        $Table->addStyle([0 => 'width:10%;',1 => 'width:20%;', 2 =>"width:30%;", 3 =>'width:20%;', 6 => 'min-width:90px;width:90px;justify-content:center;']);
        $Table->addLink(2);
        $Table->addAction($url);
        $Table->changeDataRow(6, [0, '-'], [1, '+']);

        $this->view->data['title']   = 'Page ';
        $this->view->data['Table']   = $Table;
        $this->view->data['Access']  = ($this->session->has('Access')) ? $this->session->get('Access') : false;
        $this->view->data['addIcon'] = "fa-regular fa-images fa-2xl";
        $this->view->data['addUrl']  = $url.'/add';

        $this->session->remove('Access');
        
        $countPages = $this->page->getCountInfoPages();

        if($countPages > PGN_ADMIN )
        {
            $len = round($countPages / PGN_ADMIN);
            $this->view->data['Pagination'] = array('url' => $url, 'active' => $i, 'len' => $len);
        }
    
        return $this->view->render('admin/index.html');
    }


    function addAction($urlCategory)
    {
        $Form = new Form();

        $Form->action = $this->url.$urlCategory.'/add';
        $Form->addSubmit('Сохранить', 'btn');
        $Form->addSelect('type', [['main','main'],['tech','tech'],['others','others']], '', 'Тип Страницы');
        $Form->addInput('title', '', 'text', 'Заголовок Страницы');
        $Form->addInput('url', '', 'text', 'Url Страницы');
        $Form->addInput('is_published','', 'checkbox', 'Опубликовано');
        $Form->addTextarea('description', '', 'Краткое описание Страницы');
        $Form->addTinymce('tinymce', '', 'Контент Страницы');


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
        
        if(empty($request['type']))
        {
            $error[] = ['type', 'Нужно выбрать тип страницы без этого никак!'];
        }


        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания Страницы, это очень важно!'];
        }

        if(empty($request['tinymce']))
        {
            $error[] = ['tinymce', 'Контент Страницы должен содержать хоть что-нибудь!'];
        }

        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect('/admin/pages/add');
        }
        
        if(isset($request['is_published']))
        { 
            $request['is_published'] = 1;
        }
       
        unset($request['csrf']);
        $request['content'] = $_POST['tinymce'];
        unset($request['tinymce']);
        $request['create_date'] = time();

        if($this->page->addPage($request))
        {
            $this->session->set('Access', "Запись прошла успешно, данные в Базе!");
            return $this->view->redirect('/admin/pages');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect('/admin/pages/add');

    }


    function editAction($urlCategory, $id)
    {
        $Page = $this->page->getPage($id);
       
        if($Page)
        {
            $Form = new Form(); 

            $Form->addSubmit('Сохранить', 'btn');
            $Form->action =  $this->url.$urlCategory.'/edit';
            $Form->addSelect('type', [['main','main'],['tech','tech'],['others','others']], '', 'Тип Страницы');
            $Form->addInput('id', $Page['id'], 'hidden');
            $Form->addInput('title', $Page['title'], 'text', 'Заголовок Страницы');
            $Form->addInput('url', $Page['url'], 'text', 'Url Страницы');
            $Form->addInput('is_published', $Page['is_published'], 'checkbox', 'Опубликовано');
            $Form->addTextarea('description', $Page['description'], 'Краткое описание');
            $Form->addTinymce('tinymce', $Page['content'], 'Контент Страницы');

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
        
        
        if(isset($request['is_published']))
        { 
            $request['is_published']   = 1;
        }else{
            $request['is_published']   = 0;
        }

        if(empty($request['type']))
        {
            $error[] = ['type', 'Нужно выбрать тип страницы без этого никак!'];
        }


        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания Страницы, это очень важно!'];
        }

        if(empty($request['tinymce']))
        {
            $error[] = ['tinymce', 'Контент Страницы должен содержать хоть что-нибудь!'];
        }
       
        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect("/admin/pages/edit/{$id}");
        }

        unset($request['id']);
        unset($request['csrf']);
        $request['content'] = $_POST['tinymce'];
        unset($request['tinymce']);
       

        if($this->page->editPage($id, $request))
        {
            $this->session->set('Access', "Обновление прошло замечательно, не переживайте)!");
            return $this->view->redirect('/admin/pages');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/pages/edit/{$id}");

    }



    function removeAction($urlCategory, $id)
    {
        $Page = $this->page->getPageForDelete($id);
       
        if($Page)
        {
            $Form = new Form(); 

            if($this->session->has('Error'))
            {
                $this->view->data['ErrorDelete'] = $this->session->get('Error');
            }
            $this->session->remove('Error');

            $this->view->data['deleteData'] = array('keys' => array_keys($Page), 'values' => array_values($Page));
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
        if($this->page->delPage($id))
        {
            $this->session->set('Access', "Вы удалили, данные из Базе ) !!");
            return $this->view->redirect('/admin/pages');
        }
        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/pages/delete/{$id}");
    }

}
