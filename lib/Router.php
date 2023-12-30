<?php

namespace lib;

use lib\Session;
use lib\View;

class Router 
{
    private $routes    = [];
    private $pattern   = '/^[a-zA-Z0-9\/-]*$/';
    private $maxLength = 1000;
    private $view;
    private $getParams;

    function __construct()
    {
        $this->view = new View();
    }

    private function addRoute($method, $url, $controller, $action, $packages) 
    {
        $pattern = '#^' . preg_replace_callback('/\{([\w\d-]{1,20})\}/', function ($matches) {
            return '(?<' . $matches[1] . '>[^/]+)';
        }, $url) . '$#';

        $this->routes[] = [
            'method' => $method,
            'pattern' => $pattern,
            'controller' => $controller,
            'action' => $action,
            'packages' => $packages
        ];
    }

    public function get($url, $controller, $action, $packages='Default') 
    {
        $this->addRoute('GET', $url, $controller, $action, $packages);
    }

    public function post($url, $controller, $action, $packages='Default') 
    {
        $this->addRoute('POST', $url, $controller, $action, $packages);
    }

    public function delSlash()
    {
        $urlWithoutTrailingSlash = trim($_SERVER['REQUEST_URI'], '/');
        header("Location: $urlWithoutTrailingSlash");
        exit();
    }

    public function parserUrlGet()
    {
        $urlWithoutTrailingSlash = trim($_SERVER['REQUEST_URI'], '/');
        header("Location: $urlWithoutTrailingSlash");
        exit();
    }

    public function run() 
    {
        if (substr($_SERVER['REQUEST_URI'], -1) === '/' && $_SERVER['REQUEST_URI'] !== '/') 
        {
            $this->delSlash();
        }

        
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
      
        if(preg_match($this->pattern, $url, $matches))
        {
            foreach ($this->routes as $route) 
            {

                if ($route['method'] === $method && preg_match($route['pattern'], $url, $matches)) 
                {
                    if($route['packages'] == 'Admin')
                    {
                        $urlParts = explode('/', $url);
                        if(count($urlParts) > 2)
                        {
                            $route['controller'] = ucfirst($urlParts[2]) . $route['controller'];
                        }
                    }

                    $fileController =  DIR_CONTROLLERS.$route['packages'].'/'.$route['controller'].'.php';

                    if( file_exists($fileController))
                    {

                        $ClassController = 'controllers\\' . $route['packages'] . '\\' . $route['controller'];

                        if (class_exists($ClassController)) 
                        {
                            
                            $controller = new $ClassController();
                            
                            if (method_exists($controller, $route['action'])) 
                            {
                                $action = $route['action'];
        
                                //Подставляем переменные из URL в параметры метода
                                $params = [];
                                foreach ($matches as $key => $value) 
                                {
                                    if (is_string($key)) 
                                    {
                                        $params[$key] = $value;
                                    }
                                }
                                

                                if($method === 'POST')
                                {
                                    // if(!Session::validateCsrfToken($_POST['csrf']))
                                    // {
                                    //     echo "<b style='color:red;'>Error</b>: The request was not verified. Сheck if you are sending the token ";
                                    //     return;
                                    // }
                                    
                                    $body_request = $this->sanitizePostData($_POST);

                                    if(!empty($_FILES))
                                    {
                                        $body_request = array_merge($body_request, $_FILES);
                                    }
                                    
                                    call_user_func_array([$controller, $action], [$body_request]);
                                    return;
                                }

                                call_user_func_array([$controller, $action], $params);
                                return;
        
                            } else {
                                echo "<b style='color:red;'>Error</b>: Controller '{$route['controller']}' have not method '{$route['action']}' ";
                                return;
                            }
                        } else {
                            echo "<b style='color:red;'>Error</b>: Not exist class: {$route['controller']} ";
                            return;
                        }
                    } else {
                        echo "<b style='color:red;'>Error</b>: Not exists file : ".DIR_CONTROLLERS." {$route['controller']}.php in directory 'controllers' ";
                        return;
                    }
                }
            }
        }

        return $this->view->error();
    }

    /**
     * Проверяет и фильтрует данные, переданные POST-запросом.
     *
     * @param array $data Данные POST-запроса
     * @return array Очищенные и проверенные данные
     */
    private function sanitizePostData($data) 
    {
        $sanitizedData = [];

        foreach ($data as $key => $value) 
        {
            $value = $this->limitStringLength($this->sanitizeXss($value), $this->maxLength);
            if (gettype($value) === 'integer') 
            {
                $sanitizedData[$key] = filter_var($value, FILTER_VALIDATE_INT);
            } 
            elseif (gettype($value) === 'string') 
            {
                $sanitizedData[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            } 
        }

        return $sanitizedData;
    }

    private function sanitizeXss($input) 
    {
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    private function limitStringLength($string, $maxLength) 
    {
        return substr($string, 0, $maxLength);
    }
}

