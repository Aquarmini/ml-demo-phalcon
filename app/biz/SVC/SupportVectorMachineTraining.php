<?php
// +----------------------------------------------------------------------
// | SupportVectorTraining.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\SVC;

use App\Biz\Repository\DistrictTrain;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Xin\Traits\Common\InstanceTrait;

class SupportVectorMachineTraining
{
    use InstanceTrait;

    /** @var SVC */
    public $classifier;

    public function __construct()
    {
        $classifier = new SVC(Kernel::LINEAR, $cost = 1000);
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