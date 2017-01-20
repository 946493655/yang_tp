<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /**
     * 后台基础控制器
     */

    protected $prefix_domain = 'http://www.yang_tp.com/index.php?s=/admin';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取登录ip
     */
    public function getIp()
    {
//        if (getenv("HTTP_CLIENT_IP")) {
//            $ip = getenv("HTTP_CLIENT_IP");
//        } else if (getenv("HTTP_X_FORWARDED_FOR")) {
//            $ip = getenv("HTTP_X_FORWARDED_FOR");
//        } else if (getenv("REMOTE_ADDR")) {
//            $ip = getenv("REMOTE_ADDR");
//        } else {
//            $ip = "";
//        }
//        return $ip;
        return get_client_ip();
    }

    /**
     * 由ip获取所在的地区
     */
    public function getCityByIp()
    {
        // 实例化类 参数表示IP地址库文件
        $Ip = new \Org\Net\IpLocation('UTFWry.dat');
        // 获取某个IP地址所在的位置
        return $Ip->getlocation($this->getIp());
    }
}