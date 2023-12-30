<?php

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');


define('BASE_URL', 'http://tips-day.com/'); 
define('SITE_URL', 'tips-day.com/');
define('SITE_DOMAIN', 'tips-day.com');


// MVC_Directories.conf
define('DIR_INDEX', '../tipsday/');
define('DIR_CONTROLLERS', '../controllers/');
define('DIR_TEMPLATES', '../templates/');
define('DIR_MODELS', '../models/');
define('DIR_LIBS', '../lib/');


// MYSQL
define("MYSQL_BASE", "tips_day");
define("MYSQL_HOST", "localhost");
define("MYSQL_USER", "tips_day_usr");
define("MYSQL_PASS", "TIPS80957452908_day");
define('MYSQL_CHARSET', 'utf8');
define("MYSQL_PORT", 3306);

// REDIS
define("REDIS_HOST", "localhost");
define("REDIS_PORT", 6379);
define("REDIS_TTL", 60);



// USER config
define("TN_USERS", "users");
define("TN_USER_ROLES", "user_role");

// MAIL
define('ADMINISTRATION_MAIL', 'webmaster@cararac.com');

// Paginator conf
define('PGN_ADMIN', 50);
