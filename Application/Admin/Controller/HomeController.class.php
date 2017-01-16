<?php
namespace Admin\Controller;

class HomeController extends BaseController
{
    /**
     * 后台首页
     */

    public function index()
    {
//        echo "<pre>"; var_dump(session('yang'));exit;
        $this->display();
    }
}