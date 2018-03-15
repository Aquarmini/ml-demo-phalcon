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
use App\Models\DistrictTrain;
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
        $rid = 0;
        /** @var \App\Models\Districts $item */
        foreach ($res as $item) {
            $rid = $item->oid;
            $children = $item->children;
            /** @var \App\Models\Districts $child */
            foreach ($children as $child) {
                $res = TencentMapClient::getInstance()->suggestion($item->area_name, $child->area_name);
                if (!isset($res['data'])) {
                    dd($res);
                }
                foreach ($res['data'] as $v) {
                    $lat = $v['location']['lat'];
                    $lon = $v['location']['lng'];

                    try {
                        $train = new DistrictTrain();
                        $train->lat = $lat;
                        $train->lon = $lon;
                        $train->oid = $child->oid;
                        $train->save();

                    } catch (\Exception $ex) {

                    }
                }

                sleep(1);
            }
        }

        return $rid;
    }
}