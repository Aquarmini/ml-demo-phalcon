<?php
// +----------------------------------------------------------------------
// | Districts.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace App\Biz;

use App\Biz\Repository\Dstricts;
use App\Common\Clients\TencentMapClient;
use Xin\Traits\Common\InstanceTrait;

class Districts
{
    use InstanceTrait;

    /**
     * @desc   返回处理到哪个城市
     * @author limx
     * @return int
     */
    public function crawl($id = 0)
    {
        $res = Dstricts::getInstance()->findByLevelAndId(3, $id);
        /** @var \App\Models\Districts $item */
        foreach ($res as $item) {
            $children = $item->children;
            /** @var \App\Models\Districts $child */
            foreach ($children as $child) {
                $res = TencentMapClient::getInstance()->suggestion($item->area_name, $child->area_name);
                dd($res);
            }
        }
        return 1;
    }
}