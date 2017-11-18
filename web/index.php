<?php
ini_set('display_errors', 1);

define('WEBROOT',dirname(__FILE__));
define('ROOT',dirname(WEBROOT));
define('DOC_ROOT',dirname(ROOT).'/ljm/images/'); //fonction Image.php pour l'upload
define('DL_ROOT',dirname(ROOT).'/admin/web/downloads/'); //fonction Image.php pour l'upload
define('DS','/');
define('BASE_URL','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/');
define('URL_IMAGE_BOUTIQUE','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/images/');
define('BASE_LINK_MESSAGES','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/index.php/messages/');
define('URL_DOWNLOADS','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/downloads/');
define('BASE_LINK','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/index.php');
define('BASE_LINK_PROMO','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/index.php/promos/index');
define('BASE_LINK_MEDIA','http://' . $_SERVER['HTTP_HOST'] . '/admin/web/index.php/medias/index');
define('LOGIN_LINK','http://' . $_SERVER['HTTP_HOST'] . '/admin/');
define('NAME',"Les Jardiniers Modernes");
//define('PREFIX',"cockpit");
mb_internal_encoding('UTF-8');
setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
date_default_timezone_set('Europe/Paris');
require ROOT . '/app/App.php';
App::load();
new Core\Dispatcher();