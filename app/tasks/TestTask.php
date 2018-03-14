<?php

namespace App\Tasks;

class TestTask extends Task
{

    public function mainAction()
    {
        $so = scws_new();
        $so->set_charset('utf8');
        // 这里没有调用 set_dict 和 set_rule 系统会自动试调用 ini 中指定路径下的词典和规则文件
        $so->send_text("我是一个中国人,我会C++语言,我也有很多T恤衣服");
        $result = [];
        while ($tmp = $so->get_result()) {
            $result[] = implode('', array_column($tmp, 'word'));
        }
        $so->close();

        dd($result);
    }

}

