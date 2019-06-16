<?php
namespace core\lib;
use core\lib\conf;
class log
{
    static $class;

    public static function init(){
        $drive = conf::get('DRIVE', 'log');
        $class = '\core\lib\drive\log\\' . $drive;
        self::$class = new $class;
    }

    public static function log($name, $file = 'log'){
        self::$class->log($name, $file);
    }
}