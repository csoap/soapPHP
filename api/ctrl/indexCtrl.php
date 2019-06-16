<?php
namespace api\ctrl;
use core\lib\model;

class indexCtrl extends \core\base
{
    public function index(){

//        $model = new \api\model\testModel();
//        $res = $model->list();
//        dump($res);
        $data = 'hello';
        $this->assign('data', $data);
        $this->display('index.html');
    }
}