<?php

namespace controllers\Admin;

use controllers\Admin\AdminController;
use models\admin\ArticleModel;
use lib\Table;
use lib\Form;


class ArticlesController extends AdminController
{
    public $article;

    public function __construct()
    {
        parent::__construct();

        $this->article = new ArticleModel();

        // if($this->session->get('user_'.session_id())['role'] != 'Admin')
        // {
        //     return $this->view->redirect('admin');
        // }
    }


    function default($urlCategory, $i=0)
    {
        $url = $this->url.$urlCategory;

        $articles   = $this->article->getDataArticles($i, 'DESC');

        $Table = new Table();

        $Table->generateTable($articles);

        $Table->addStyle([0 => 'width:10%;',1 => 'width:15%;', 4 => 'width:15%;justify-content:center;',5=>"display:none;"]);
        $Table->addLink(5);
        $Table->addAction($url);
        $Table->changeDataRow(4, [0, '-'], [1, '+']);

        $this->view->data['title']   = 'Article ';
        $this->view->data['Table']   = $Table;
        $this->view->data['Access']  = ($this->session->has('Access')) ? $this->session->get('Access') : false;
        $this->view->data['addIcon'] = "fa-solid fa-file-circle-plus fa-2xl";
        $this->view->data['addUrl']  = $url.'/add';

        $this->session->remove('Access');
        
        $countArticles = $this->article->getCountInfoArticles();

        if($countArticles > PGN_ADMIN )
        {
            $len = round($countArticles / PGN_ADMIN);
            $this->view->data['Pagination'] = array('url' => $url, 'active' => $i, 'len' => $len);
        }
    
        return $this->view->render('admin/index.html');
    }


    function addAction($urlCategory)
    {
        $Form = new Form();

        $authors    = $this->article->getAuthorsForSelect();
        $categories = $this->article->getCategoriesForSelect();
       // d($authors,0,1);
       
        $Form->action = $this->url.$urlCategory.'/add';
        $Form->addSubmit('Сохранить', 'btn');
        $Form->addSelect('author_id', $authors, 'Автор статьи');
        $Form->addSelect('category_id', $categories, 'Категория статьи');
        $Form->addInput('title', '', 'text', 'Заголовок статьи');
        $Form->addInput('url', '', 'text', 'Url статьи');
        $Form->addInput('is_magnet', '', 'checkbox', 'В прелинковку');
        $Form->addInput('is_published','', 'checkbox', 'Опубликовано');
        $Form->addInput('is_postponed','', 'checkbox', 'Отложено');
        $Form->addInput('avatar', '', 'file');
        $Form->addTextarea('description', '', 'Краткое описание');
        $Form->addTinymce('tinymce', '', 'Контент Статьи');


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
        
       if(isset($request['is_postponed']))
       { 
            $request['is_postponed'] = 1;

            if(empty($request['postponed_date']))
            {
                $error[] = ['is_postponed', 'Нужно чтобы поля даты и время не были пустыми!'];
            }

            if(empty($request['postponed_time']))
            {
                $error[] = ['is_postponed', 'Нужно чтобы поля даты и время не были пустыми!'];
            }

            $request['timestamp'] = strtotime($request['postponed_date'].' '.$request['postponed_time']);
        }

        if(empty($request['avatar']['name']))
        {
            $error[] = ['avatar', 'Поле Аватара не может быть пустым!'];
        }else{
            d($_FILES);
            if(!$this->image->checkMimeType($request['avatar']['tmp_name']))
            {
                $error[] = ['avatar', 'Это не картинка'];
            }
        }

        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания статьи, это очень важно!'];
        }

        if(empty($request['tinymce']))
        {
            $error[] = ['tinymce', 'Контент статьи должен содержать хоть что-нибудь!'];
        }

        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect('/admin/articles/add');
        }
        
        if(isset($request['is_magnet']))
        { 
            $request['is_magnet'] = 1;
        }
        if(isset($request['is_published']))
        { 
            $request['is_published'] = 1;
        }
       
        $sourceImagePath = $request['avatar'];
        $request['avatar'] = 'tips_day_small_'.date('Y_m_d_h_i',time()).'.webp';
        unset($request['csrf']);
        $request['content'] = $_POST['tinymce'];
        unset($request['tinymce']);
        $request['create_date'] = time();
    

        if($this->article->addArticle($request))
        {
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/blog/small/'.$request['avatar'], 330);
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/blog/'.$request['avatar'], 750);
        
            $this->session->set('Access', "Запись прошла успешно, данные в Базе!");
            return $this->view->redirect('/admin/articles');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect('/admin/articles/add');

    }


    function editAction($urlCategory, $id)
    {
        $Article = $this->article->getArticle($id);
       
        if($Article)
        {

            $authors    = $this->article->getAuthorsForSelect();
            $categories = $this->article->getCategoriesForSelect();

            $Form = new Form(); 

            $Article['update_date'] = (!empty($Article['update_date'])) ? date('Y-m-d', $Article['update_date']): '';

            $Form->addSubmit('Сохранить', 'btn');
            $Form->action =  $this->url.$urlCategory.'/edit';
            $Form->addSelect('author_id', $authors, 'Автор статьи', $Article['author_id']);
            $Form->addSelect('category_id', $categories, 'Категория статьи', $Article['category_id']);
            $Form->addInput('id', $Article['id'], 'hidden');
            $Form->addInput('title', $Article['title'], 'text', 'Заголовок статьи');
            $Form->addInput('url', $Article['url'], 'text', 'Url статьи');
            $Form->addInput('is_magnet', $Article['is_magnet'], 'checkbox', 'В прелинковку');
            $Form->addInput('is_published', $Article['is_published'], 'checkbox', 'Опубликовано');
            $Form->addInput('is_postponed', $Article['is_postponed'], 'checkbox', 'Отложено');
            $Form->addInput('update_date', $Article['update_date'], 'date', 'Было Обновленно');
            $Form->addInput('avatar', $Article['avatar'], 'file');
            $Form->addTextarea('description', $Article['description'], 'Краткое описание');
            $Form->addTinymce('tinymce', $Article['content'], 'Контент Статьи');

            if($this->session->has('Error'))
            {
                $Form->formError($this->session->get('Error'));
            }
            $this->session->remove('Error');
       
            $this->view->data['Form']  = $Form;
            $this->view->data['dataPostponed'] = array($Article['postponed_date'], $Article['postponed_time']);
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
        
        if(isset($request['is_magnet']))
        { 
            $request['is_magnet'] = 1;
        }else{
            $request['is_magnet'] = 0;
        }
        
        if(isset($request['is_published']))
        { 
            $request['is_published']   = 1;
        }else{
            $request['is_published']   = 0;
        }

        if(isset($request['is_postponed']))
        { 
            $request['is_postponed'] = 1;

            if(empty($request['postponed_date']))
            {
                $error[] = ['is_postponed', 'Нужно чтобы поля даты и время не были пустыми!'];
            }

            if(empty($request['postponed_time']))
            {
                $error[] = ['is_postponed', 'Нужно чтобы поля даты и время не были пустыми!'];
            }

            $request['timestamp'] = strtotime($request['postponed_date'].' '.$request['postponed_time']);
        }else{
            $request['is_postponed'] = 0;        
        }

        if(!empty($request['update_date']))
        {   
            $request['update_date'] = strtotime($request['update_date']);
        }else{
             $request['update_date'] = NULL;
        }

        if(empty($request['description']))
        {
            $error[] = ['description', 'Добавьте описания статьи, это очень важно!'];
        }

        if(empty($request['tinymce']))
        {
            $error[] = ['tinymce', 'Контент статьи должен содержать хоть что-нибудь!'];
        }
       
        if(!empty($request['avatar']['name']))
        {

            if(!$this->image->checkMimeType($request['avatar']['tmp_name']))
            {
                $error[] = ['avatar', 'Это не картинка'];
            }

            $sourceImagePath = $request['avatar'];
            $request['avatar'] = 'tips_day_small_'.date('Y_m_d_h_i',time()).'.webp';
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/blog/small/'.$request['avatar'], 330);
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/blog/'.$request['avatar'], 750);
        }else{
             unset($request['avatar']);
        }

        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect("/admin/articles/edit/{$id}");
        }

        unset($request['id']);
        unset($request['csrf']);
        $request['content'] = $_POST['tinymce'];
        unset($request['tinymce']);
       

        if($this->article->editArticle($id, $request))
        {
            $this->session->set('Access', "Обновление прошло замечательно, не переживайте)!");
            return $this->view->redirect('/admin/articles');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/articles/edit/{$id}");

    }



    function removeAction($urlCategory, $id)
    {
        $Article = $this->article->getArticleForDelete($id);
       
        if($Article)
        {
            $Form = new Form(); 

            if($this->session->has('Error'))
            {
                $this->view->data['ErrorDelete'] = $this->session->get('Error');
            }
            $this->session->remove('Error');

            $this->view->data['deleteData'] = array('keys' => array_keys($Article), 'values' => array_values($Article));
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
        if($this->article->delArticle($id))
        {
            $this->session->set('Access', "Вы удалили, данные из Базе ) !!");
            return $this->view->redirect('/admin/articles');
        }
        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/articles/delete/{$id}");
    }

}
