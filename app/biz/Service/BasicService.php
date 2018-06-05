<?php
// +----------------------------------------------------------------------
// | BasicService.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\Service;

use App\Biz\KNN\KNearestNeighborsTraining;
use App\Biz\SVC\SupportVectorMachineTraining;
use Xin\Swoole\Rpc\Handler\HanderInterface;
use Xin\Swoole\Rpc\Handler\Handler;
use Xin\Traits\Common\InstanceTrait;

class BasicService extends Handler
{
    use InstanceTrait;

    public function version()
    {
        return di('config')->version;
    }

    /**
     * @desc   计算经纬度所在地区
     * @author limx
     */
    public function predict($lat, $lon)
    {
        return KNearestNeighborsTraining::getInstance()->predict([$lat, $lon]);
    }

    /**
     * @desc   计算图片验证码
     * @author limx
     * @param $samples
     * @return mixed
     */
    public function predictImageNumber($samples)
    {
        return SupportVectorMachineTraining::getInstance()->predict($samples);
    }
}
