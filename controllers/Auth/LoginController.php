<?php

namespace controllers\Auth;

use controllers\Controller;
use models\admin\UserModel;

use lib\Validate;


class LoginController extends Controller
{
    private $Error;

    function __construct()
    {
        parent::__construct();
        
        $this->user = new UserModel();

        if($this->session->has('user_'.session_id()))
        {
            return $this->view->redirect('admin');
        }
    }


    function login()
    {
        if($this->session->has('Error'))
        {
            $this->Error = $this->session->get('Error');
        }
       
        $this->session->remove('Error');

        $this->session->setCsrfToken();
        $this->view->data['_token'] = $this->session->getCsrfToken();
        
        $this->view->data['title'] = "Login User";
        $this->view->data['Error'] = $this->Error;
        
        return $this->view->render('service/login.html');
    }

    function checkLogin($request)
    {
        
        if(!Validate::emptySting($request['mail']) 
        || !Validate::emptySting($request['password']) 
        ){
            $this->session->set('Error', 'Your fields is Empty');
            return $this->view->redirect('login');
        }


        if(!$this->user->checkUserEmail($request['mail']))
        {
            $this->session->set('Error', 'it is email not registered!');
            return $this->view->redirect('login');
        }

        $result = $this->user->getUserMail($request['mail']);
        
       
        if($result)
        {
            if(!password_verify($request['password'], $result['user_password']))
            {   
                $this->session->set('Error', 'Password mismatch!');
                return $this->view->redirect('login');
            }

            $result['session_id'] = session_id();
            $this->session->set('user_'.session_id(), $result);
            return $this->view->redirect('admin');
        }

        $this->session->set('Error', 'Something wrong, check your field!');
        return $this->view->redirect('login');
    }

}
