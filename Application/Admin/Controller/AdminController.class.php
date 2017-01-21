<?php
namespace Admin\Controller;

use Admin\Model\AdminModel;
use Admin\Model\LogModel;

class AdminController extends BaseController
{
    /**
     * 后台管理员控制器
     */

    /**
     * 管理员列表
     */
    public function index()
    {
        $adminModel = M('Admin');
        $datas = $adminModel->order('createtime')->limit($this->limit)->select();
        $assign = [
            'datas' =>  $datas,
        ];
        $this->assign($assign);
        $this->display();
    }
}