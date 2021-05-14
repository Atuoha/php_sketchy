<?php


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'C:' . DS .  'xampp' . DS . 'htdocs' . DS . 'Sketches');

defined('INCLUDE_PATH')? null : define('INCLUDE_PATH', SITE_ROOT . DS . 'Admin');

require_once("conn.php");
require_once("database.php");
require_once("functions.php");
require_once("db_object.php");
require_once("user.php");
require_once("session.php");
require_once("photo.php");
require_once("category.php");
require_once("comments.php");
require_once("pagination.php");
require_once("contacts.php");




?>