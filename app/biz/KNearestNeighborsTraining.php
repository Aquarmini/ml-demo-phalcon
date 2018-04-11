<?php
// +----------------------------------------------------------------------
// | Train.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

namespace App\Biz;

use App\Biz\Repository\DistrictTrain;
use Phpml\Classification\KNearestNeighbors;
use Xin\Cli\Color;
use Xin\Traits\Common\InstanceTrait;

class KNearestNeighborsTraining
{
    use InstanceTrait;

    /** @var KNearestNeighbors */
    public $classifier;

    public function __construct()
    {
        $classifier = new KNearestNeighbors();
        $id = 0;
        while (true) {
            $samples = DistrictTrain::getInstance()->findById($id);
            if (count($samples) === 0) {
                break;
            }

            $trans = [];
            $result = [];

            /** @var \App\Models\DistrictTrain $item */
            foreach ($samples as $item) {
                $trans[] = [$item->lat, $item->lon];
                $result[] = $item->oid;
                $id = $item->id;
            }

            $classifier->train($trans, $result);
        }

        $this->classifier = $classifier;
    }

    public function __call($name, $arguments)
    {
        return $this->classifier->$name(...$arguments);
    }
}