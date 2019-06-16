<?php
define('APP_PATH', realpath('./'));
define('CORE', APP_PATH.'/core');
define('API', APP_PATH.'/api');
define('MODULE', 'api');
define('DEBUG', true);

if(DEBUG){
    ini_set('display_errors', 'On');
}else{
    ini_set('display_errors', 'Off');
}
include CORE.'/common/function.php';
include CORE.'/base.php';

spl_autoload_register('\core\base::load');

\core\base::run();


