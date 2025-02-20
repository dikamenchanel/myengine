<?php


namespace lib;

class Validate
{

    static public function parseUrl($string)
    {
        // Удаляем все символы , . ) ? ! % № # @ : ; " ' * & $ \ | } { ] [ > < / + ^ = ~ `
        $cleaned_string = str_replace(' ', '-', $string);
        $cleaned_string = preg_replace('/[,.?!\s%#@$:;\'*&$\\|}{\]\[><\/+=~`]/u', '', $cleaned_string);
        $url = strtolower($cleaned_string);
        return $url;
    }

    static public function emptySting($string)
    {
        if (empty($string)) 
        {
            return false; 
        } 
        return true;
    }

    static public function validateEmail($email) 
    {
        $pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    
        if (!preg_match($pattern, $email)) 
        {
            return false; 
        } 
        return true;

    }

    static public function validatePassword($password) 
    {
        if (strlen($password) < 10) {
            return false; 
        }

        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        if (!preg_match('/[a-z]/', $password)) {
            return false; 
        }

        if (!preg_match('/[0-9]/', $password)) {
            return false; 
        }

        if (!preg_match('/[!@#$%^&*()-_=+{}:<>]/', $password)) {
            return false;
        }

        return true;

    }

}