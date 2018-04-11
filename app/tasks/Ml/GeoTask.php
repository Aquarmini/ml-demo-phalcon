<?php

namespace App\Tasks\Ml;

use App\Biz\Districts;
use App\Biz\KNearestNeighborsTraining;
use App\Tasks\Task;
use Phpml\Classification\KNearestNeighbors;
use Xin\Cli\Color;
use Xin\Phalcon\Cli\Traits\Input;

class GeoTask extends Task
{
    use Input;

    public function mainAction()
    {
        echo Color::head('Help:') . PHP_EOL;
        echo Color::colorize('  通过机器学习确定经纬度所在省市区') . PHP_EOL . PHP_EOL;

        echo Color::head('Usage:') . PHP_EOL;
        echo Color::colorize('  php run ml:geo@[action]', Color::FG_LIGHT_GREEN) . PHP_EOL . PHP_EOL;

        echo Color::head('Actions:') . PHP_EOL;
        echo Color::colorize('  main        菜单', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  crawl       添加训练数据', Color::FG_LIGHT_GREEN) . PHP_EOL;
        echo Color::colorize('  train       训练', Color::FG_LIGHT_GREEN) . PHP_EOL;
    }

    public function crawlAction()
    {
        $id = $this->argument('id', 0);
        while (true) {
            // $id = Districts::getInstance()->crawl($id);
            $id = Districts::getInstance()->init($id);
            if ($id == 0) {
                break;
            }

            echo Color::colorize('当前处理到 ID=' . $id, Color::FG_LIGHT_RED) . PHP_EOL;
        }
    }

    public function trainAction()
    {
        echo KNearestNeighborsTraining::getInstance()->predict([39.9223757639, 116.4221191406]);
    }

}

