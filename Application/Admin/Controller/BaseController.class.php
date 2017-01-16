<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /**
     * 后台基础控制器
     */

    protected $prefix_domain;

    public function __construct()
    {
        parent::__construct();
        $this->prefix_domain = '/index.php?s=/admin';
    }
}