<?php
define('APP_PATH', realpath('./'));
define('CORE', APP_PATH.'/core');
define('API', APP_PATH.'/api');
define('MODULE', 'api');
define('DEBUG', true);

include "vendor/autoload.php";

if(DEBUG){
    $whoops = new \Whoops\Run;
    $errTitle = '框架出错';
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle($errTitle);
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors', 'On');
}else{
    ini_set('display_errors', 'Off');
}
include CORE.'/common/function.php';
include CORE.'/base.php';

spl_autoload_register('\core\base::load');

\core\base::run();


