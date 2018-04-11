<?php
// +----------------------------------------------------------------------
// | 基础测试类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Units;

use App\Biz\SVC\Image;
use App\Common\Clients\Rpc\BasicClient;
use Tests\UnitTestCase;

/**
 * K临近算法
 * Class UnitTest
 */
class SupportVectorTest extends UnitTestCase
{
    public function testBaseCase()
    {
        list($samples, $labels) = Image::getInstance()->rand(8);
        $this->assertEquals($labels, BasicClient::getInstance()->predictImageNumber($samples));
    }
}
