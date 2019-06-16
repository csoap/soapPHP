<?php
namespace core\lib;
use core\lib\conf;

class model extends \PDO {

    public function __construct()
    {
        $databases = conf::all('database');
        try{
            parent::__construct($databases['DSN'], $databases['USERNAME'], $databases['PASSWD']);
        }catch (\PDOException $e){
            dump($e);
        }
    }
}