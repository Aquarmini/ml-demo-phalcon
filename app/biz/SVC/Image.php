<?php
// +----------------------------------------------------------------------
// | Image.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz\SVC;

use Grafika\Grafika;
use Grafika\Gd\Image as GdImage;
use Gregwar\Captcha\CaptchaBuilder;
use Xin\Support\File;
use Xin\Traits\Common\InstanceTrait;

class Image
{
    use InstanceTrait;

    public function __construct()
    {
        $dir = ROOT_PATH . '/storage/cache/images/';
        File::getInstance()->makeDirectory($dir, 0777, true, true);
    }

    public function rand($num = null)
    {
        $builder = new CaptchaBuilder();
        if (!isset($num)) {
            $num = rand(0, 9);
        }
        $builder->setPhrase($num);
        $builder->setIgnoreAllEffects(true);
        $image = $builder->build(25, 25);

        $file = ROOT_PATH . '/storage/cache/images/' . $num . '.png';
        $image->save($file);

        $editor = Grafika::createEditor();
        $image = GdImage::createFromFile($file);
        $editor->flatten($image);
        $sample = [];
        for ($y = 0; $y < $image->getHeight(); $y++) {
            for ($x = 0; $x < $image->getWidth(); $x++) {
                $rgb = imagecolorat($image->getCore(), $x, $y);
                $sample[] = $rgb > 8000000 ? 1 : 0;
            }
        }

        return [$sample, $num];
    }
}
