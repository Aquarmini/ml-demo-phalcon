<?php
// +----------------------------------------------------------------------
// | 基础测试类 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Tests\Units;

use App\Common\Clients\Rpc\BasicClient;
use Tests\UnitTestCase;
use Phpml\Classification\KNearestNeighbors;

/**
 * K临近算法
 * Class UnitTest
 */
class KNearestNeighborsTest extends UnitTestCase
{
    public function testBaseCase()
    {
        $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
        $labels = ['a', 'a', 'a', 'b', 'b', 'b'];

        $classifier = new KNearestNeighbors();
        $classifier->train($samples, $labels);

        $this->assertEquals('b', $classifier->predict([3, 2]));
    }

    public function testGeoCase()
    {
        $this->assertEquals(1829, BasicClient::getInstance()->predict(36.161827, 120.497833));
        $this->assertEquals(3142, BasicClient::getInstance()->predict(39.9223757639, 116.4221191406));
        $this->assertEquals(3141, BasicClient::getInstance()->predict(39.9181628466, 116.3726806641));
    }
}
