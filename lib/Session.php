<?php


namespace lib;

use models\admin\UserModel;

class Session 
{
    protected $sessionName = 'user_cararac'; 
    protected $sessionLifetime = 7200; 

    public function __construct() 
    {
        session_name($this->sessionName);
        session_set_cookie_params($this->sessionLifetime);
        session_start();
    }

    static public function set($key, $value) 
    {
        $_SESSION[$key] = $value;
    }

    static public function get($key, $default = null) 
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }

    static public function has($key) 
    {
        return isset($_SESSION[$key]);
    }

    public function remove($key) 
    {
        if ($this->has($key)) 
        {
            unset($_SESSION[$key]);
        }
    }

    public function destroy() 
    {
        session_unset();
        session_destroy();
    }

    public function regenerate() 
    {
        session_regenerate_id(true);
    }

    public function authenticate($user_id) 
    {
        $this->set('user_id', $user_id);
    }

    // public function generateCsrfToken() 
    // {
    //     return bin2hex(random_bytes(32));
    // }

    // public function getUserCsrfToken($user) 
    // {
    //     return isset($user['user_token']) ? $user['user_token'] : null;
    // }

    // static public function validateCsrfTokenForUser($user, $token) 
    // {
    //     return hash_equals($_SESSION[$user]['user_token'], $token);
    // }

    static public function setCsrfToken() 
    {
        $token = bin2hex(random_bytes(32));
        self::set('csrf_token', $token);
    }

    static public function getCsrfToken() 
    {
        return self::get('csrf_token');
    }

    static public function validateCsrfToken($token) 
    {
        return hash_equals(self::get('csrf_token'), $token);
    }

    static public function setCookies($id, $hash1, $hash2) 
    {
        setcookie('user_id', $id, (time()+24*14*3600), '/', '.'.SITE_DOMAIN);
        setcookie('hash1', $hash1, (time()+24*14*3600), '/', '.'.SITE_DOMAIN);
        setcookie('hash2', $hash2, (time()+24*14*3600), '/', '.'.SITE_DOMAIN);
        return;
    }

    static public function checkCookies($id, $hash1, $hash2) 
    {
        $authRes = false;
        if (!empty($_COOKIE['user_id']))
        {
            if ($hash1 == $_COOKIE['hash1'] and $_COOKIE['hash2'] == $hash2)
            {
                $authRes = true;
            }else{
                setcookie('user_id', '', time()-1, '/', '.'.SITE_DOMAIN);
                setcookie('hash1', '', time()-1, '/', '.'.SITE_DOMAIN);
                setcookie('hash2', '', time()-1, '/', '.'.SITE_DOMAIN);
            }
        }
        return $authRes;
    }

    static public function deleteCookies() 
    {
        setcookie('user_id', '', time()-1, '/', '.'.SITE_DOMAIN);
        setcookie('hash1', '', time()-1, '/', '.'.SITE_DOMAIN);
        setcookie('hash2', '', time()-1, '/', '.'.SITE_DOMAIN);
        return;
    }
}
 
