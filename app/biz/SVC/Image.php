<?php
// +----------------------------------------------------------------------
// | Image.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\SVC;

use Gregwar\Captcha\CaptchaBuilder;
use Xin\Traits\Common\InstanceTrait;

class Image
{
    use InstanceTrait;

    public function rand()
    {
        $builder = new CaptchaBuilder();
        $num = rand(1000, 9999);
        $builder->setPhrase($num);
        $image = $builder->build();

        $file = ROOT_PATH . '/storage/cache/images/' . $num . '.png';
        $image->save($file);

        return [$num, $file];
    }
}
