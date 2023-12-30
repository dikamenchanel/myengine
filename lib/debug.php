<?php

function d($string, $v=1, $die=0)
{
    if($v)
    {
        echo "<pre>";
        var_dump($string);
        echo "<pre>";
    }else{
        echo "<pre>";
        print_r($string);
        echo "<pre>";
    }
    if($die){die("Все приехали!");}
}
