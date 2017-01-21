<?php
namespace Admin\Controller;

use Admin\Model\LogModel;

class LogController extends BaseController
{
    /**
     * 管理员日志
     */

    public function __construct()
    {
        parent::__construct();
        if (!$this->adminid) { redirect($this->prefix_domain.'/admin/login',0,'未登录！'); }
    }

    public function index()
    {
//        $logModel = M('Log');
        $logModel = new LogModel();
        if (session('yang.adminName')=='jiuge') {
            $datas = $logModel->order('logintime')->limit($this->limit)->select();
        } else {
            $condition['adminid'] = $this->adminid;
            $datas = $logModel->where($condition)->find();
        }
        $assign = [
            'datas'     =>  $datas,
            'logModel'  =>  $logModel,
        ];
//        $this->dd($assign);
        $this->assign($assign);
        $this->display();
    }
}