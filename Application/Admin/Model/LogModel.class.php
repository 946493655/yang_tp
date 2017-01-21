<?php
namespace Admin\Model;

class LogModel extends BaseModel
{
    /**
     * 登录日志
     */

    protected $tableName = 'log';
    protected $fields = [
        'adminid','serial','ip','ipaddr','logintime','logouttime',
    ];

    public function getAdminName($adminid)
    {
        $adminModel = new AdminModel();
        $admin = $adminModel->where('id='.$adminid)->find();
        return $admin ? $admin['admin'] : '';
    }
}