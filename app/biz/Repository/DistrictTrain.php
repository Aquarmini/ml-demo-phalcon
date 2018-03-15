<?php
// +----------------------------------------------------------------------
// | Train.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Repository;

use App\Models\DistrictTrain as DistrictTrainModel;
use Xin\Traits\Common\InstanceTrait;

class DistrictTrain
{
    use InstanceTrait;

    public function findById($id = 0, $limit = 100)
    {
        return DistrictTrainModel::find([
            'conditions' => 'id > ?0',
            'bind' => [$id],
            'limit' => $limit
        ]);
    }
}