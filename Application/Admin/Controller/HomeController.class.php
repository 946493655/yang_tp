<?php
namespace Admin\Controller;

class HomeController extends BaseController
{
    /**
     * 后台首页
     */

    public function __construct()
    {
        parent::__construct();
        if (!session('yang')) { $this->success('未登录！',$this->prefix_domain.'/admin/login'); }
    }

    public function index()
    {
//        echo "<pre>"; var_dump(session('yang'));exit;
        $assign = [
            'prefix_domain' => $this->prefix_domain,
            'session'       =>  session('yang'),
        ];
        $this->assign($assign);
        $this->display();
    }
}