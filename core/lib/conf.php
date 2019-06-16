<?php
namespace core\lib;

class conf
{
    public static $conf = array();

    public static function get($name, $file)
    {
        if (isset(self::$conf[$file])){
            return self::$conf[$file][$name];
        }else{
            $path = APP_PATH . '/core/config/' . $file . '.php';
            if(is_file($path)){
                $conf = include $path;
                if (isset($conf[$name])){
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                }else{
                    throw new \Exception('没有这个配置项', $name);
                }
            }else{
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    public static function all($file){
        if (isset(self::$conf[$file])){
            return self::$conf;
        }else{
            $path = APP_PATH . '/core/config/' . $file . '.php';
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            }else{
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}