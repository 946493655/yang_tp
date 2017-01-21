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
        if (!$this->adminid) { redirect(PREFIXADMIN.'/login/login',0,'未登录！'); }
    }

    public function index()
    {
        $this->display();
    }
}