<?php
namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /**
     * 前台基础控制器
     */

    public function __construct()
    {
        parent::__construct();
        //访问admin，直接跳转到后台
        if ($_SERVER['REQUEST_URI']=='/admin') {
//            $this->success('','http://www.yang_tp.com/index.php?s=/admin/home/index',0);
            redirect('http://www.yang_tp.com/index.php?s=/admin/home/index',0,'');
        }
    }
}