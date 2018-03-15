<?php
// +----------------------------------------------------------------------
// | PoiDIstricts.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Repository;

use Xin\Traits\Common\InstanceTrait;
use App\Models\Districts as DistrictsModel;

class Dstricts
{
    use InstanceTrait;

    public function findByLevelAndId($level = 3, $id = 0, $limit = 10)
    {
        return DistrictsModel::find([
            'conditions' => 'level = ?0 AND oid > ?1',
            'bind' => [$level, $id],
            'limit' => $limit
        ]);
    }
}