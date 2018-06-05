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
 * 支持向量机
 * Class UnitTest
 */
class SupportVectorTest extends UnitTestCase
{
    public function testBaseCase()
    {
        $this->assertTrue(true);
        // $this->assertEquals(1829, BasicClient::getInstance()->predictSVM(36.161827, 120.497833));
        // $this->assertEquals(3142, BasicClient::getInstance()->predictSVM(39.9223757639, 116.4221191406));
        // $this->assertEquals(3141, BasicClient::getInstance()->predictSVM(39.9181628466, 116.3726806641));
    }
}
