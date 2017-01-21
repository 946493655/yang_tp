<?php
namespace Admin\Controller;

class LoginController extends BaseController
{
    /**
     * 后台登录
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
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
        } elseif (mb_strlen($pwd)<5 || mb_strlen($pwd)>20) {
            echo "<script>alert('密码在 5-20个字符之间！');history.go(-1);</script>";exit;
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
        $time = time();
        $adminInfo = [
            'adminid'   =>  $admin['id'],
            'adminName' =>  $uname,
            'logintime' =>  $time,
        ];
        session('yang',$adminInfo);
        //记录最后登录时间
        $adminModel->where('id',$admin['id'])->save(['lasttime'=>$time]);
        //添加到日志
        $serial = date('YmdHis',time()).rand(0,10000);
        $ip = $this->getIp();
        $logModel = M('Log');
        $log = [
            'adminid'   =>  $admin['id'],
            'serial'    =>  $serial,
            'ip'        =>  $ip,
            'ipaddr'    =>  $this->getCityByIp($ip),
            'loginTime'    =>  $time
        ];
//        echo "<pre>";var_dump($log);exit;
        $logModel->add($log);
        $this->success("登录成功！", PREFIXADMIN.'/home/index',0);
    }

    public function logout()
    {
        $logModel = M('Log');
        $logModel->where('serial',session('yang.serial'))->save(['logoutTime'=>time()]);
        session('');
        $this->success("退出成功！",PREFIXADMIN.'/login/login',0);
    }
}