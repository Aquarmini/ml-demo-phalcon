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
            $num = rand(1000, 9999);
        }
        $builder->setPhrase($num);
        $builder->setIgnoreAllEffects(true);
        $image = $builder->build(100, 25);

        $file = ROOT_PATH . '/storage/cache/images/' . $num . '.png';
        $image->save($file);

        $editor = Grafika::createEditor();
        $image = GdImage::createFromFile($file);
        $editor->flatten($image);
        $lables = str_split($num);
        $samples = [];
        for ($y = 0; $y < $image->getHeight(); $y++) {
            for ($x = 0; $x < $image->getWidth(); $x++) {
                if ($x > 20 && $x < 80) {
                    $i = $x - 20;
                    $rgb = imagecolorat($image->getCore(), $x, $y);
                    $samples[intval($i / 15)][] = $rgb > 8000000 ? 1 : 0;
                }
            }
        }

        return [$samples, $lables];
    }
}
