<?php

namespace App\Tasks\Ml;

use App\Biz\Districts;
use App\Biz\Train;
use App\Tasks\Task;
use Phpml\Classification\KNearestNeighbors;
use Xin\Cli\Color;

class GeoTask extends Task
{
    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  通过机器学习确定经纬度所在省市区') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run ml:geo@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  main        菜单', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  crawl       爬取数据', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  train       训练', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function crawlAction()
    {
        $id = 0;
        while (true) {
            $id = Districts::getInstance()->crawl($id);
            if ($id == 0) {
                break;
            }

            echo Color::colorize('当前处理到 ID=' . $id, Color::FG_LIGHT_RED) . PHP_EOL;
        }
    }

    public function trainAction()
    {
        $classifier = Train::getInstance()->train();

        // $time = microtime(true);
        echo $classifier->predict([39.8970943726,116.2037658691]);
        // echo microtime(true) - $time;
    }

}

