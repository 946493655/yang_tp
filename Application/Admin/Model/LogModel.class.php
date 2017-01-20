<?php
namespace Admin\Model;

class LogModel extends BaseModel
{
    /**
     * 登录日志
     */

    protected $tableName = 'log';
    protected $fields = [
        'adminid','serial','ip','ipaddr','loginTime','logoutTime',
    ];
}