<?php
namespace Admin\Model;

class AdminModel extends BaseModel
{
    /**
     * 管理员
     */

    protected $tableName = 'admin';
    protected $fields = [
        'admin','pwd','createTime','updateTime',
    ];
}