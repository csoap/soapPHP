<?php
namespace api\model;

use core\lib\model;

class testModel extends model
{
    public $table = 'test';
    public function list(){
        $res = $this->select($this->table, '*');
        return $res;
    }
}