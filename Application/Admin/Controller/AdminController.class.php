<?php
namespace Admin\Controller;

use Admin\Model\AdminModel;
use Admin\Model\LogModel;

class AdminController extends BaseController
{
    /**
     * 前台首页空控制器
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
//        echo 'admin';
        $assign = [
            'prefix_domain'=> $this->prefix_domain
        ];
        $this->assign($assign);
        $this->display();
    }

    public function dologin()
    {
        $uname = isset($_POST['uname'])?$_POST['uname']:'';
        $pwd = isset($_POST['pwd'])?$_POST['pwd']:'';
        //验证管理员、密码
        if (!$uname) {
            echo "<script>alert('用户名必填！');history.go(-1);</script>";exit;
        } elseif (mb_strlen($uname)<2 || mb_strlen($uname)>20) {
            echo "<script>alert('用户名在 2-20个字符之间！');history.go(-1);</script>";exit;
        }
        if (!$pwd) {
            echo "<script>alert('密码必填！');history.go(-1);</script>";exit;
        } elseif (mb_strlen($pwd)<2 || mb_strlen($pwd)>20) {
            echo "<script>alert('用户名在 2-20个字符之间！');history.go(-1);</script>";exit;
        }
        //D方法实例化模型类的时候通常是实例化某个具体的模型类，
        //如果你仅仅是对数据表进行基本的CURD操作的话，使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高
        $adminModel = M('Admin');
        $admin = $adminModel->where(['admin'=>$uname])->find();
//        echo "<pre>";var_dump($admin['admin']);exit;
        if ($admin['admin']!=$uname || $admin['pwd']!=$pwd) {
            echo "<script>alert('用户名或密码错误！');history.go(-1);</script>";exit;
        }
        //设置session
        $adminInfo = [
            'adminid'   =>  $admin['id'],
            'adminName' =>  $uname,
        ];
        session('yang',$adminInfo);
        //添加到日志
        $log = [
            'adminid'   =>  $admin['id'],
            'serial'    =>  date('YmdHis',time()).rand(0,10000),
            'ip'        =>  $this->getIp(),
            'ipaddr'    =>  $this->getCityByIp(),
            'loginTime'    =>  time(),
        ];
        $logModel = M('Log');
        $logModel->create($log);
        $this->success('登录成功！', $this->prefix_domain.'/home/index');
    }

    public function logout()
    {
//        $logModel = M('Log');
//        $logModel->where('serial',session('yang.serial'))->save(['logoutTime'=>time()]);
        session('');
        $this->success('退出成功！',$this->prefix_domain.'/admin/login');
    }
}