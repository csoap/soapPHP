<?php
namespace core;

class base
{
    public static $classMap = array();
    public $assign;

    public static function run(){
        \core\lib\log::init();
        \core\lib\log::log($_SERVER);

        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlFile = API.'/ctrl/'.$ctrlClass.'Ctrl.php';
        $ctrlClass = '\\'.MODULE.'\ctrl\\'.$ctrlClass.'Ctrl';
        if(is_file($ctrlFile)){
            include $ctrlFile;
            $ctrl = new $ctrlClass();
            $ctrl->$action();
            \core\lib\log::log('ctrl: '. $route->ctrl.'    action: '. $action);

        }else{
            throw new \Exception('找不到控制器' . $ctrlClass);
        }
    }
    public static function load($class){
        //自动加载类库
        if(isset($classMap[$class])){
            return true;
        }else{
            $class = str_replace('\\', '/', $class);
            $file = APP_PATH . '/' . $class . '.php';
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = $class;
            }else{
                return false;
            }
        }
    }

    public function assign($name, $value){
        $this->assign[$name] = $value;
    }

    public function display($file){
        $file = API.'/views/'. $file;
        if (is_file($file)){

            $loader = new \Twig\Loader\FilesystemLoader(API . '/views');
            $twig = new \Twig\Environment($loader, [
                'cache' => APP_PATH.'/log/twig',
                'debug' => DEBUG
            ]);
            $template = $twig->load('index.html');
            $template->display($this->assign?$this->assign:"");


        }
    }
}