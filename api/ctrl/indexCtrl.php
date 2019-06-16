<?php
namespace api\ctrl;
class indexCtrl extends \core\base
{
    public function index(){

        $temp =  \core\lib\conf::get('CTRL', 'route');
        $model = new \core\lib\model();
        $sql = "select * from test";
        $res = $model->query($sql);

        $this->assign('data', '222');
        $this->display('index.html');
    }
}