<?php

namespace controllers\Auth;

use controllers\Controller;
use models\admin\UserModel;
use lib\Validate;


class RegistryController extends Controller
{
    private $Error;

    public function __construct()
    {
        parent::__construct();

        $this->user = new UserModel();
        
        if($this->session->has('user_'.session_id()))
        {
            return $this->view->redirect('admin');
        }
    }


    function registry()
    {
        if($this->session->has('Error'))
        {
            $this->Error = $this->session->get('Error');
        }

        $this->session->remove('Error');
        
        $this->session->setCsrfToken();
        $this->view->data['_token'] = $this->session->getCsrfToken();

        $this->view->data['title'] = "Registry User";
        $this->view->data['Error'] = $this->Error;

        return $this->view->render('service/registry.html');
    }
    
    function checkRegistry($request)
    {
        if(!Validate::emptySting($request['fname']) 
        && !Validate::emptySting($request['lname']) 
        && !Validate::emptySting($request['mail']) 
        && !Validate::emptySting($request['password']) 
        && !Validate::emptySting($request['password_repeat']) 
        ){
            $this->session->set('Error', 'Error Your fields is Empty');
            return $this->view->redirect('registry');
        }

        if(!Validate::validateEmail($request['mail'])){
            $this->session->set('Error', 'Error Your fields is email is wrong');
            return $this->view->redirect('registry');
        }

        if($request['password'] !== $request['password_repeat'])
        {
            $this->session->set('Error', 'Your password doesn\'t match');
            return $this->view->redirect('registry');
        }

        if(!Validate::validatePassword($request['password'])){
            $this->session->set('Error', 'Your password does not meet the criteria');
            return $this->view->redirect('registry');
        }

        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $algorithm = "sha256";
        $hash1 = hash($algorithm, $request['mail'].$_SERVER['REMOTE_ADDR']);
        $hash2 = hash($algorithm, $hash1.$_SERVER['REMOTE_ADDR']);

        
        if($this->user->checkUserEmail($request['mail']))
        {
            $this->session->set('Error', 'It is email already in registration!');
            return $this->view->redirect('login');
        }
        
        if($this->user->addUser($request['mail'], $request['fname'], $request['lname'], $_SERVER['REMOTE_ADDR'], $password, $hash1, $hash2))
        {
            return $this->view->redirect('login');
        }

        $this->session->set('Error', 'Something wrong, check your field!');
        return $this->view->redirect('registry');

    }
}
