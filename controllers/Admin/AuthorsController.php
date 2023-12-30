<?php

namespace controllers\Admin;

use controllers\Admin\AdminController;
use models\admin\AuthorModel;
use lib\Table;
use lib\Form;


class AuthorsController extends AdminController
{
    public $author;

    public function __construct()
    {
        parent::__construct();

        $this->author = new AuthorModel();

        // if($this->session->get('user_'.session_id())['role'] != 'Admin')
        // {
        //     return $this->view->redirect('admin');
        // }
    }


    function default($urlCategory, $i=0)
    {
        $url = $this->url.$urlCategory;

        $authors = $this->author->getDataAuthors($i, 'DESC');

        $Table = new Table();

        $Table->generateTable($authors);

        $Table->addStyle([0 => 'width:10%;',1 => 'width:10%;', 2 => 'width:10%;', 4 => 'display:none', 6 => 'width:15%;']);
        $Table->addAction($url);
        $Table->addAvatar(4, 'width:90px;');

        $this->view->data['title']   = 'Authors ';
        $this->view->data['Table']   = $Table;
        $this->view->data['Access']  = ($this->session->has('Access')) ? $this->session->get('Access') : false;
        $this->view->data['addIcon'] = "fa-solid fa-person-circle-plus fa-2xl";
        $this->view->data['addUrl']  = $url.'/add';

        $this->session->remove('Access');
        
        $countArticles = $this->author->getCountInfoAuthors();

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

        $Form->action = $this->url.$urlCategory.'/add';
        $Form->addSubmit('Сохранить', 'btn');
        $Form->addInput('url', '', 'text', 'Url Автора');
        $Form->addInput('name', '', 'text', 'Имя Автора');
        $Form->addInput('avatar', '', 'file');
        $Form->addTextarea('about_me', '', 'Расскажите об Авторе');


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
        

        if(empty($request['url']))
        {
            $error[] = ['url', 'Ваше поле Улр пустое так не должно быть!'];
        }else{  
           $request['url'] = $this->validate->parseUrl($request['url']);
        }
        
        if(empty($request['name']))
        {
            $error[] = ['name', 'Ваше поле Name пустое так не должно быть!'];
        }
        
        if(empty($request['avatar']['name']))
        {
            $error[] = ['avatar', 'Поле Аватара не может быть пустым!'];
        }else{
            if(!$this->image->checkMimeType($request['avatar']['tmp_name']))
            {
                $error[] = ['avatar', 'Это не картинка'];
            }
        }



        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect('/admin/authors/add');
        }
        
       
        $sourceImagePath = $request['avatar'];
        $request['avatar'] = 'author_tips_day_'.date('Y_m_d_h_i',time()).'.webp';
        unset($request['csrf']);
        
        if($this->author->addAuthor($request))
        {
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/authors/'.$request['avatar'], 250);
        
            $this->session->set('Access', "Запись прошла успешно, данные в Базе!");
            return $this->view->redirect('/admin/authors');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect('/admin/authors/add');

    }


    function editAction($urlCategory, $id)
    {
        $Author = $this->author->getAuthor($id);
       
        if($Author)
        {
            $Form = new Form(); 

            $Form->addSubmit('Сохранить', 'btn');
            $Form->action =  $this->url.$urlCategory.'/edit';
            $Form->addInput('id', $Author['id'], 'hidden');
            $Form->addInput('url', $Author['url'], 'text', 'Урл Автора');
            $Form->addInput('name', $Author['name'], 'text', 'Имя Автора');
            $Form->addInput('avatar', $Author['avatar'], 'file');
            $Form->addTextarea('about_me', $Author['about_me'], 'Об Авторе');

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
            
        if(empty($request['url']))
        {
            $error[] = ['url', 'Ваше поле Улр пустое так не должно быть!'];
        }else{  
           $request['url'] = $this->validate->parseUrl($request['url']);
        }

        if(empty($request['name']))
        {
            $error[] = ['name', 'Ваше поле Улр пустое так не должно быть!'];
        }
        

        if(empty($request['about_me']))
        {
            $error[] = ['about_me', 'Рсскажите что-нибудь об Авторе!'];
        }

       
        if(!empty($request['avatar']['name']))
        {

            if(!$this->image->checkMimeType($request['avatar']['tmp_name']))
            {
                $error[] = ['avatar', 'Это не картинка'];
            }

            $sourceImagePath = $request['avatar'];
            $request['avatar'] = 'author_tips_day_'.date('Y_m_d_h_i',time()).'.webp';
            $this->image->resizeAndConvertToWebP($sourceImagePath['tmp_name'], DIR_INDEX.'img/authors/'.$request['avatar'], 330);
        }else{
             unset($request['avatar']);
        }

        if(!empty($error))
        {
            $this->session->set('Error', $error);
            return $this->view->redirect("/admin/authors/edit/{$id}");
        }

       
        unset($request['id']);
        unset($request['csrf']);
       

        if($this->author->editAuthor($id, $request))
        {
            $this->session->set('Access', "Обновление прошло замечательно, не переживайте)!");
            return $this->view->redirect('/admin/authors');
        }

        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/authors/edit/{$id}");

    }



    function removeAction($urlCategory, $id)
    {
        $Author = $this->author->getAuthorForDelete($id);
       
        if($Author)
        {
            $Form = new Form(); 

            if($this->session->has('Error'))
            {
                $this->view->data['ErrorDelete'] = $this->session->get('Error');
            }
            $this->session->remove('Error');

            $this->view->data['deleteData'] = array('keys' => array_keys($Author), 'values' => array_values($Author));
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
        if($this->author->delAuthor($id))
        {
            $this->session->set('Access', "Вы удалили, данные из Базе ) !!");
            return $this->view->redirect('/admin/authors');
        }
        $this->session->set('Error', "Что-то пошло не так и запись в Базу данных закончилось с ошибкой! Обратитесь к Программисту 0_o ) !");
        return $this->view->redirect("/admin/authors/delete/{$id}");
    }

}
