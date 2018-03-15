<?php
// +----------------------------------------------------------------------
// | TencentGeoClient.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Common\Clients;

use Xin\Traits\Common\InstanceTrait;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class TencentMapClient
{
    use InstanceTrait;

    public function __construct()
    {
        $this->key = env('TENCENT_MAP_KEY');
        // $this->client =
        $this->client = new GuzzleClient([
            'base_uri' => 'http://apis.map.qq.com/ws/place/v1/',
            'timeout' => 5.0,
        ]);
    }

    public function suggestion($city, $keyword)
    {
        $api = 'suggestion/?region=' . $city . '&keyword=' . $keyword . '&key=' . $this->key;

        return $this->client->get($api);
    }
}