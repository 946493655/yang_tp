<?php
namespace Home\Controller;

class IndexController extends BaseController
{
    /**
     * 前台首页空控制器
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'success';
    }

    public function hello()
    {
        echo 'hello';
    }
}