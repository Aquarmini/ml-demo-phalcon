<?php
// +----------------------------------------------------------------------
// | SupportVectorTraining.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\SVC;

use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
use Xin\Traits\Common\InstanceTrait;

class ImageSVM
{
    use InstanceTrait;

    /** @var SVC */
    public $classifier;

    public function __construct()
    {
        $classifier = new SVC(Kernel::LINEAR, $cost = 1000);
        for ($i = 0; $i < 500; $i++) {
            list($sample, $lable) = Image::getInstance()->rand();
            $classifier->train([$sample], [$lable]);
        }

        $this->classifier = $classifier;
    }

    public function __call($name, $arguments)
    {
        return $this->classifier->$name(...$arguments);
    }
}