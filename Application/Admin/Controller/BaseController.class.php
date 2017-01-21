<?php
namespace Admin\Controller;

use Think\Controller;

class BaseController extends Controller
{
    /**
     * 后台基础控制器
     */

    protected $adminid;
    protected $limit = 10;      //每页显示记录数

    public function __construct()
    {
        parent::__construct();
        define('PREFIXADMIN','http://www.yang_tp.com/index.php?s=/admin');
        if (session('yang')) { $this->adminid = session('yang.adminid'); }
    }

    /**
     * 获取登录ip
     */
    public function getIp()
    {
        return get_client_ip();
    }

    /**
     * 由ip获取所在的地区
     */
    public function getCityByIp($ip="")
    {
//        $Ip = new \Org\Net\IpLocation('UTFWry.dat');
//        $area = $Ip->getlocation('203.34.5.66');
        if (!$ip || mb_substr($ip,0,8)=='192.168.') {
            return '中国，浙江，杭州，滨江';
        }
        $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);
        if(empty($res)){ return false; }
        $jsonMatches = array();
        preg_match('#\{.+?\}#', $res, $jsonMatches);
        if(!isset($jsonMatches[0])){ return false; }
        $json = json_decode($jsonMatches[0], true);
        if(isset($json['ret']) && $json['ret'] == 1){
            $json['ip'] = $ip;
            unset($json['ret']);
        }else{
            return false;
        }
        return $json['country'].','.$json['province'].','.$json['city'];
    }

//    /**
//     * 由ip获取经纬度
//     */
//    public function getPointByIp()
//    {
//        if (empty($ip)) { return 'IP不能为空'; }
//        $key = 'Tj1ciyqmG0quiNgpr0nmAimUCCMB5qMk';      //自己申请的百度地图api的key
//        $content = file_get_contents("http://api.map.baidu.com/geocoder/v2/address=地址&output=json&key=".$key."&city=城市名");
//        $json = json_decode($content);
//        $lng=$json->{'content'}->{'location'}->{'lng'};//提取经度数据
//        $lat=$json->{'content'}->{'location'}->{'lat'};//提取纬度数据
//        return array(
//            'jingdu'    =>  $lng,
//            'weidu'     =>  $lat,
//        );
//    }

    /**
     * dd方法打印数据
     */
    public function dd($data)
    {
        echo "<pre>";var_dump($data);exit;
    }
}